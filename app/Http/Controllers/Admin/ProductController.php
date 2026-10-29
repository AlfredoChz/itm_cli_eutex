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
            'image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
            'image_url' => ['nullable', 'string'],
            'gallery_files' => ['nullable', 'array'],
            'gallery_files.*' => ['image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
            'gallery_urls' => ['nullable', 'string'],
            'colors' => ['nullable', 'string'],
            'sizes' => ['nullable', 'string'],
            'features' => ['nullable', 'string'],
        ]);

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);
        
        // Ensure slug uniqueness
        $originalSlug = $slug;
        $counter = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }

        $destinationPath = public_path('images/products');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // 1. Foto Principal
        $imagePath = $validated['image_url'] ?? null;
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $fileName = $slug . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $imagePath = '/images/products/' . $fileName;
        }

        // 2. Fotos de Galería Adicionales
        $gallery = [];
        if ($imagePath) {
            $gallery[] = $imagePath;
        }

        if ($request->hasFile('gallery_files')) {
            foreach ($request->file('gallery_files') as $idx => $gFile) {
                $gName = $slug . '-gal-' . time() . '-' . $idx . '.' . $gFile->getClientOriginalExtension();
                $gFile->move($destinationPath, $gName);
                $gallery[] = '/images/products/' . $gName;
            }
        }

        if (!empty($validated['gallery_urls'])) {
            $urls = array_filter(array_map('trim', explode("\n", $validated['gallery_urls'])));
            foreach ($urls as $u) {
                if (!empty($u) && !in_array($u, $gallery)) {
                    $gallery[] = $u;
                }
            }
        }

        $gallery = array_values(array_unique(array_filter($gallery)));
        if (!$imagePath && !empty($gallery)) {
            $imagePath = $gallery[0];
        }

        $colors = $this->parseList($request->input('colors'));
        $sizes = $this->parseList($request->input('sizes'));
        $features = $this->parseLines($request->input('features'));

        Product::create([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'slug' => $slug,
            'sku' => $validated['sku'] ?? 'EUT-' . strtoupper(Str::random(5)),
            'short_description' => $validated['short_description'] ?? null,
            'description' => $validated['description'] ?? null,
            'badge' => $validated['badge'] ?? null,
            'is_featured' => $request->boolean('is_featured'),
            'image' => $imagePath,
            'gallery' => !empty($gallery) ? $gallery : ($imagePath ? [$imagePath] : null),
            'colors' => $colors,
            'sizes' => $sizes,
            'features' => $features,
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Producto "' . $validated['name'] . '" creado exitosamente con sus imágenes.');
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
            'image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
            'image_url' => ['nullable', 'string'],
            'main_image_path' => ['nullable', 'string'],
            'gallery_files' => ['nullable', 'array'],
            'gallery_files.*' => ['image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
            'existing_gallery' => ['nullable', 'array'],
            'gallery_urls' => ['nullable', 'string'],
            'colors' => ['nullable', 'string'],
            'sizes' => ['nullable', 'string'],
            'features' => ['nullable', 'string'],
        ]);

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);

        $destinationPath = public_path('images/products');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // 1. Imagen Principal
        $imagePath = $product->image;
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $fileName = $slug . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $imagePath = '/images/products/' . $fileName;
        } elseif (!empty($validated['main_image_path'])) {
            $imagePath = $validated['main_image_path'];
        } elseif (!empty($validated['image_url'])) {
            $imagePath = $validated['image_url'];
        }

        // 2. Galería de Fotos (Conserva las fotos existentes que no se hayan eliminado)
        $gallery = [];
        if ($request->filled('existing_gallery_json')) {
            $gallery = json_decode($request->input('existing_gallery_json'), true) ?: [];
        } elseif ($request->has('existing_gallery')) {
            $gallery = (array)$request->input('existing_gallery', []);
        }

        // Si se envió la gestión de galería y el usuario quitó la foto principal
        if ($request->has('existing_gallery_present') || $request->filled('existing_gallery_json')) {
            if ($imagePath && !in_array($imagePath, $gallery)) {
                if (!empty($gallery)) {
                    $imagePath = $gallery[0];
                } elseif (!$request->hasFile('image_file') && empty($validated['image_url']) && empty($validated['main_image_path'])) {
                    $imagePath = null;
                }
            }
        } elseif ($imagePath && !in_array($imagePath, $gallery)) {
            array_unshift($gallery, $imagePath);
        }

        // Subir fotos adicionales nuevas
        if ($request->hasFile('gallery_files')) {
            foreach ($request->file('gallery_files') as $idx => $gFile) {
                $gName = $slug . '-gal-' . time() . '-' . $idx . '.' . $gFile->getClientOriginalExtension();
                $gFile->move($destinationPath, $gName);
                $gallery[] = '/images/products/' . $gName;
            }
        }

        // Añadir URLs adicionales si se especificaron
        if (!empty($validated['gallery_urls'])) {
            $urls = array_filter(array_map('trim', explode("\n", $validated['gallery_urls'])));
            foreach ($urls as $u) {
                if (!empty($u) && !in_array($u, $gallery)) {
                    $gallery[] = $u;
                }
            }
        }

        $gallery = array_values(array_unique(array_filter($gallery)));

        if (!$imagePath && !empty($gallery)) {
            $imagePath = $gallery[0];
        }

        $colors = $this->parseList($request->input('colors'));
        $sizes = $this->parseList($request->input('sizes'));
        $features = $this->parseLines($request->input('features'));

        $product->update([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'slug' => $slug,
            'sku' => $validated['sku'] ?? $product->sku,
            'short_description' => $validated['short_description'] ?? null,
            'description' => $validated['description'] ?? null,
            'badge' => $validated['badge'] ?? null,
            'is_featured' => $request->boolean('is_featured'),
            'image' => $imagePath,
            'gallery' => !empty($gallery) ? $gallery : null,
            'colors' => $colors,
            'sizes' => $sizes,
            'features' => $features,
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Producto "' . $product->name . '" y sus fotos actualizados exitosamente.');
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
