<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;

// Admin Controllers
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\QuoteController as AdminQuoteController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;
use App\Http\Controllers\Admin\PageSettingController as AdminPageSettingController;

// -------------------------------------------------------------
// PUBLIC WEBSITE ROUTES (EUTEX CATÁLOGO & CORPORATIVO)
// -------------------------------------------------------------

// Landing & General Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/nosotros', [PageController::class, 'nosotros'])->name('nosotros');
Route::get('/servicios', [PageController::class, 'servicios'])->name('servicios');

// Products & Catalog
Route::get('/productos', [ProductController::class, 'index'])->name('products.index');
Route::get('/productos/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/categoria/{slug}', [ProductController::class, 'byCategory'])->name('products.category');

// Instant Search API
Route::get('/api/buscar-productos', [ProductController::class, 'search'])->name('api.search');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Contact
Route::get('/contactanos', [ContactController::class, 'index'])->name('contact');
Route::post('/contactanos', [ContactController::class, 'store'])->name('contact.store');

// Quotation
Route::post('/cotizacion', [QuoteController::class, 'store'])->name('quote.store');

// Legal & Compliance
Route::get('/libro-de-reclamaciones', [PageController::class, 'libroReclamaciones'])->name('libro-reclamaciones');
Route::post('/libro-de-reclamaciones', [PageController::class, 'storeLibroReclamaciones'])->name('libro-reclamaciones.store');

// -------------------------------------------------------------
// ADMIN PANEL ROUTES (EUTEX CONTROL CENTER)
// -------------------------------------------------------------

// Admin Authentication
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('login.post');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('logout');

// Admin Protected Routes (Require Authentication)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Products Management
    Route::resource('productos', AdminProductController::class)
        ->parameters(['productos' => 'product'])
        ->names('products');
    Route::post('productos/{product}/destacar', [AdminProductController::class, 'toggleFeatured'])->name('products.toggle-featured');

    // Categories Management
    Route::resource('categorias', AdminCategoryController::class)
        ->parameters(['categorias' => 'category'])
        ->names('categories');

    // Quotes Management
    Route::get('cotizaciones', [AdminQuoteController::class, 'index'])->name('quotes.index');
    Route::get('cotizaciones/{quote}', [AdminQuoteController::class, 'show'])->name('quotes.show');
    Route::patch('cotizaciones/{quote}/estado', [AdminQuoteController::class, 'updateStatus'])->name('quotes.status');
    Route::delete('cotizaciones/{quote}', [AdminQuoteController::class, 'destroy'])->name('quotes.destroy');

    // Messages Management
    Route::get('mensajes', [AdminMessageController::class, 'index'])->name('messages.index');
    Route::get('mensajes/{message}', [AdminMessageController::class, 'show'])->name('messages.show');
    Route::delete('mensajes/{message}', [AdminMessageController::class, 'destroy'])->name('messages.destroy');

    // Site Content & Pages Management
    Route::get('paginas', [AdminPageSettingController::class, 'index'])->name('pages.index');
    Route::post('paginas/{section}', [AdminPageSettingController::class, 'update'])->name('pages.update');
});
