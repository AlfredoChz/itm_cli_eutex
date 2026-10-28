<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::withCount('products')->orderBy('order')->get();
        
        $query = Product::with('category');

        if ($request->filled('categoria')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->categoria);
            });
        }

        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function ($sq) use ($q) {
                $sq->where('name', 'like', "%{$q}%")
                   ->orWhere('short_description', 'like', "%{$q}%")
                   ->orWhere('description', 'like', "%{$q}%")
                   ->orWhere('sku', 'like', "%{$q}%");
            });
        }

        // Sorting
        $sort = $request->get('sort', 'destacados');
        if ($sort === 'nombre_asc') {
            $query->orderBy('name', 'asc');
        } elseif ($sort === 'nombre_desc') {
            $query->orderBy('name', 'desc');
        } else {
            $query->orderBy('is_featured', 'desc')->orderBy('created_at', 'desc');
        }

        $products = $query->paginate(9)->withQueryString();
        $selectedCategory = $request->filled('categoria') 
            ? Category::where('slug', $request->categoria)->first() 
            : null;

        return view('products.index', compact('products', 'categories', 'selectedCategory'));
    }

    public function byCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $categories = Category::withCount('products')->orderBy('order')->get();
        $products = Product::where('category_id', $category->id)->paginate(9);

        return view('products.index', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $category,
        ]);
    }

    public function show($slug)
    {
        $product = Product::with('category')->where('slug', $slug)->firstOrFail();
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(3)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }

    public function search(Request $request)
    {
        $q = $request->get('q', '');
        if (strlen($q) < 2) {
            return response()->json([]);
        }

        $products = Product::with('category')
            ->where('name', 'like', "%{$q}%")
            ->orWhere('short_description', 'like', "%{$q}%")
            ->orWhere('sku', 'like', "%{$q}%")
            ->take(8)
            ->get(['id', 'category_id', 'name', 'slug', 'sku', 'badge', 'image', 'short_description']);

        return response()->json($products);
    }
}
