<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;

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

    protected function tearDown(): void
    {
        foreach (glob(public_path('images/products/*-360-*.jpg')) as $file) {
            @unlink($file);
        }
        foreach (glob(public_path('images/products/*-modificado-*.jpg')) as $file) {
            @unlink($file);
        }

        parent::tearDown();
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

    public function test_admin_can_create_product_with_multiple_images(): void
    {
        $user = User::where('email', 'admin@eutex.com')->first();
        $this->actingAs($user);

        $cat = Category::first();

        $mainFile = UploadedFile::fake()->image('polo_portada.jpg', 600, 600);
        $galleryFile1 = UploadedFile::fake()->image('polo_costura.jpg', 600, 600);
        $galleryFile2 = UploadedFile::fake()->image('polo_cuello.jpg', 600, 600);

        $response = $this->post(route('admin.products.store'), [
            'category_id' => $cat->id,
            'name' => 'Chaleco Reflectivo Pro 360',
            'sku' => 'EUT-CHA-360',
            'image_file' => $mainFile,
            'gallery_files' => [$galleryFile1, $galleryFile2],
            'short_description' => 'Chaleco con cintas reflectivas 3M',
        ]);

        $response->assertRedirect(route('admin.products.index'));

        $product = Product::where('sku', 'EUT-CHA-360')->first();
        $this->assertNotNull($product);
        $this->assertNotNull($product->image);
        $this->assertIsArray($product->gallery);
        $this->assertCount(3, $product->gallery); // main cover + 2 gallery files
    }

    public function test_admin_can_update_product_gallery_and_set_cover(): void
    {
        $user = User::where('email', 'admin@eutex.com')->first();
        $this->actingAs($user);

        $cat = Category::first();
        $product = Product::create([
            'category_id' => $cat->id,
            'name' => 'Mameluco Drill Confección',
            'slug' => 'mameluco-drill-confeccion',
            'sku' => 'EUT-MAM-001',
            'image' => 'images/products/mameluco1.png',
            'gallery' => ['images/products/mameluco1.png', 'images/products/mameluco2.png', 'images/products/mameluco3.png'],
            'is_active' => true,
        ]);

        // Change cover to mameluco2.png, remove mameluco3.png, and add a new photo
        $newGalleryFile = UploadedFile::fake()->image('mameluco_extra.jpg', 600, 600);

        $response = $this->put(route('admin.products.update', $product), [
            'category_id' => $cat->id,
            'name' => 'Mameluco Drill Confección Modificado',
            'main_image_path' => 'images/products/mameluco2.png',
            'existing_gallery' => ['images/products/mameluco1.png', 'images/products/mameluco2.png'],
            'gallery_files' => [$newGalleryFile],
        ]);

        $response->assertRedirect(route('admin.products.index'));

        $product->refresh();
        $this->assertEquals('images/products/mameluco2.png', $product->image);
        $this->assertIsArray($product->gallery);
        $this->assertCount(3, $product->gallery); // mameluco1, mameluco2 + newly uploaded file
        $this->assertNotContains('images/products/mameluco3.png', $product->gallery);
    }
}
