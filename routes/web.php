<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;

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
Route::get('/politicas-privacidad', [PageController::class, 'politicas'])->name('politicas');
Route::get('/terminos-condiciones', [PageController::class, 'terminos'])->name('terminos');
