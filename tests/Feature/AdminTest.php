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
        $dashRes->assertSee('Dashboard Principal');

        $prodRes = $this->get('/admin/productos');
        $prodRes->assertStatus(200);
        $prodRes->assertSee('Catálogo de Productos Industriales');

        $catRes = $this->get('/admin/categorias');
        $catRes->assertStatus(200);

        $quoteRes = $this->get('/admin/cotizaciones');
        $quoteRes->assertStatus(200);

        $msgRes = $this->get('/admin/mensajes');
        $msgRes->assertStatus(200);
    }
}
