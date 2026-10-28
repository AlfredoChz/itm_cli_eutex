<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->orderBy('order')->get();
        $featuredProducts = Product::with('category')->where('is_featured', true)->take(6)->get();
        $allProducts = Product::with('category')->take(9)->get();
        $latestPosts = BlogPost::orderBy('published_at', 'desc')->take(3)->get();

        $stats = [
            ['value' => '+10', 'label' => 'Años de Experiencia Textil'],
            ['value' => '+50,000', 'label' => 'Prendas Confeccionadas'],
            ['value' => '+500', 'label' => 'Empresas Clientes en Perú'],
            ['value' => '100%', 'label' => 'Calidad & Normas Certificadas'],
        ];

        return view('home', compact('categories', 'featuredProducts', 'allProducts', 'latestPosts', 'stats'));
    }
}
