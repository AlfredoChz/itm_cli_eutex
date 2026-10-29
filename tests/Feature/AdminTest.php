<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        User::create([
            'name' => 'Administrador EUTEX',
            'email' => 'admin@eutex.com',
            'password' => Hash::make('admin1234'),
        ]);

        $cat = Category::create([
            'name' => 'Polos Industriales',
            'slug' => 'polos-industriales',
            'description' => 'Polos de trabajo',
            'order' => 1,
        ]);

        Product::create([
            'category_id' => $cat->id,
            'name' => 'Polo Manga Larga',
            'slug' => 'polo-manga-larga',
            'sku' => 'EUT-001',
            'short_description' => 'Polo de trabajo',
            'is_featured' => true,
        ]);
    }

    public function test_guest_is_redirected_to_admin_login(): void
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/admin/login');
    }

    public function test_login_page_loads_successfully(): void
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
        $response->assertSee('Panel de Administración');
        $response->assertSee('admin@eutex.com');
    }

    public function test_admin_can_login_with_valid_credentials(): void
    {
        $response = $this->post('/admin/login', [
            'email' => 'admin@eutex.com',
            'password' => 'admin1234',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticated();
    }

    public function test_admin_can_access_dashboard_and_products(): void
    {
        $user = User::where('email', 'admin@eutex.com')->first();
        $this->actingAs($user);

        $dashRes = $this->get('/admin');
        $dashRes->assertStatus(200);
        $dashRes->assertSee('Dashboard');

        $prodRes = $this->get('/admin/productos');
        $prodRes->assertStatus(200);
        $prodRes->assertSee('Catálogo de Productos');

        $catRes = $this->get('/admin/categorias');
        $catRes->assertStatus(200);

        $quoteRes = $this->get('/admin/cotizaciones');
        $quoteRes->assertStatus(200);

        $msgRes = $this->get('/admin/mensajes');
        $msgRes->assertStatus(200);
    }

    public function test_admin_can_edit_and_update_category(): void
    {
        $user = User::where('email', 'admin@eutex.com')->first();
        $this->actingAs($user);

        $cat = Category::first();
        $this->assertNotNull($cat);

        // Test GET edit page (where UrlGenerationException occurred before)
        $editRes = $this->get(route('admin.categories.edit', $cat));
        $editRes->assertStatus(200);
        $editRes->assertSee('Editar Categoría');
        $editRes->assertSee($cat->name);

        // Test PUT update
        $updateRes = $this->put(route('admin.categories.update', $cat), [
            'name' => 'Polos Industriales Premium',
            'order' => 2,
        ]);

        $updateRes->assertRedirect(route('admin.categories.index'));
        $this->assertDatabaseHas('categories', [
            'id' => $cat->id,
            'name' => 'Polos Industriales Premium',
        ]);
    }

    public function test_admin_can_edit_and_update_product(): void
    {
        $user = User::where('email', 'admin@eutex.com')->first();
        $this->actingAs($user);

        $prod = Product::first();
        $this->assertNotNull($prod);

        // Test GET edit page
        $editRes = $this->get(route('admin.products.edit', $prod));
        $editRes->assertStatus(200);
        $editRes->assertSee('Editar Prenda');
        $editRes->assertSee($prod->name);

        // Test PUT update
        $updateRes = $this->put(route('admin.products.update', $prod), [
            'category_id' => $prod->category_id,
            'name' => 'Polo Manga Larga Pesado',
            'short_description' => 'Descripción actualizada',
        ]);

        $updateRes->assertRedirect(route('admin.products.index'));
        $this->assertDatabaseHas('products', [
            'id' => $prod->id,
            'name' => 'Polo Manga Larga Pesado',
        ]);
    }

    public function test_admin_can_view_and_update_page_settings(): void
    {
        $user = User::where('email', 'admin@eutex.com')->first();
        $this->actingAs($user);

        // Test GET /admin/paginas
        $res = $this->get(route('admin.pages.index'));
        $res->assertStatus(200);
        $res->assertSee('Páginas & Contenido Web');
        $res->assertSee('Banners de Inicio');

        // Test POST /admin/paginas/contacto
        $postRes = $this->post(route('admin.pages.update', 'contacto'), [
            'phone' => '999 888 777',
            'whatsapp' => '999888777',
            'whatsapp_text' => 'Nuevo mensaje de prueba WhatsApp',
            'email' => 'ventas_nuevas@eutex.com',
            'address' => 'Av. Gamarra 1234, Lima',
            'schedule' => 'Lunes a Viernes: 9am a 6pm',
        ]);

        $postRes->assertRedirect(route('admin.pages.index', ['tab' => 'contacto']));
        $this->assertEquals('999 888 777', setting('contact_phone'));
        $this->assertEquals('999888777', setting('contact_whatsapp'));
        $this->assertEquals('ventas_nuevas@eutex.com', setting('contact_email'));
    }
}
