<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category')->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('featured')) {
            $query->where('is_featured', $request->boolean('featured'));
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::orderBy('name')->get();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:products,slug'],
            'sku' => ['nullable', 'string', 'max:50'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'description' => ['nullable', 'string'],
            'badge' => ['nullable', 'string', 'max:100'],
            'is_featured' => ['nullable', 'boolean'],
            'image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'image_url' => ['nullable', 'string'],
            'colors' => ['nullable', 'string'],
            'sizes' => ['nullable', 'string'],
            'features' => ['nullable', 'string'],
        ]);

        $slug = $validated['slug'] ? Str::slug($validated['slug']) : Str::slug($validated['name']);
        
        // Ensure slug uniqueness
        $originalSlug = $slug;
        $counter = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }

        $imagePath = $validated['image_url'] ?? null;
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $fileName = $slug . '-' . time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images/products');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $file->move($destinationPath, $fileName);
            $imagePath = '/images/products/' . $fileName;
        }

        $colors = $this->parseList($request->input('colors'));
        $sizes = $this->parseList($request->input('sizes'));
        $features = $this->parseLines($request->input('features'));

        Product::create([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'slug' => $slug,
            'sku' => $validated['sku'] ?? 'EUT-' . strtoupper(Str::random(5)),
            'short_description' => $validated['short_description'],
            'description' => $validated['description'],
            'badge' => $validated['badge'],
            'is_featured' => $request->boolean('is_featured'),
            'image' => $imagePath,
            'gallery' => $imagePath ? [$imagePath] : null,
            'colors' => $colors,
            'sizes' => $sizes,
            'features' => $features,
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Producto "' . $validated['name'] . '" creado exitosamente.');
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('products', 'slug')->ignore($product->id)],
            'sku' => ['nullable', 'string', 'max:50'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'description' => ['nullable', 'string'],
            'badge' => ['nullable', 'string', 'max:100'],
            'is_featured' => ['nullable', 'boolean'],
            'image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'image_url' => ['nullable', 'string'],
            'colors' => ['nullable', 'string'],
            'sizes' => ['nullable', 'string'],
            'features' => ['nullable', 'string'],
        ]);

        $slug = $validated['slug'] ? Str::slug($validated['slug']) : Str::slug($validated['name']);
        
        $imagePath = $product->image;
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $fileName = $slug . '-' . time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images/products');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $file->move($destinationPath, $fileName);
            $imagePath = '/images/products/' . $fileName;
        } elseif (!empty($validated['image_url'])) {
            $imagePath = $validated['image_url'];
        }

        $colors = $this->parseList($request->input('colors'));
        $sizes = $this->parseList($request->input('sizes'));
        $features = $this->parseLines($request->input('features'));

        $product->update([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'slug' => $slug,
            'sku' => $validated['sku'] ?? $product->sku,
            'short_description' => $validated['short_description'],
            'description' => $validated['description'],
            'badge' => $validated['badge'],
            'is_featured' => $request->boolean('is_featured'),
            'image' => $imagePath,
            'colors' => $colors,
            'sizes' => $sizes,
            'features' => $features,
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Producto "' . $product->name . '" actualizado exitosamente.');
    }

    public function toggleFeatured(Product $product)
    {
        $product->is_featured = !$product->is_featured;
        $product->save();

        return back()->with('success', 'Estado destacado actualizado para "' . $product->name . '".');
    }

    public function destroy(Product $product)
    {
        $name = $product->name;
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'El producto "' . $name . '" ha sido eliminado.');
    }

    private function parseList(?string $input): ?array
    {
        if (!$input) return null;
        $items = array_map('trim', explode(',', $input));
        return array_values(array_filter($items));
    }

    private function parseLines(?string $input): ?array
    {
        if (!$input) return null;
        $lines = preg_split('/\r\n|\r|\n/', $input);
        $items = array_map('trim', $lines);
        return array_values(array_filter($items));
    }
}
