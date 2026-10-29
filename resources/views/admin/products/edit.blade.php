@extends('admin.layouts.app')

@section('title', 'Editar: ' . $product->name)
@section('header_title', 'Editar Prenda')
@section('header_subtitle', 'Modifica la información, fotos o especificaciones de ' . $product->name)

@section('header_action')
    <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 border border-slate-300 transition-colors">
        &larr; Volver
    </a>
@endsection

@section('content')
<div class="max-w-4xl mx-auto pb-12"
     x-data="{
        name: '{{ old('name', $product->name) }}',
        badge: '{{ old('badge', $product->badge) }}',
        selectedColors: {{ json_encode(old('colors') ? array_map('trim', explode(',', old('colors'))) : (is_array($product->colors) ? $product->colors : [])) }},
        presetColors: ['Azul Marino', 'Naranja Neón', 'Amarillo Neón', 'Negro', 'Blanco', 'Azul Rey', 'Verde Oliva', 'Gris Jaspe', 'Rojo', 'Caqui'],
        toggleColor(color) {
            if (this.selectedColors.includes(color)) {
                this.selectedColors = this.selectedColors.filter(c => c !== color);
            } else {
                this.selectedColors.push(color);
            }
        },
        selectedSizes: {{ json_encode(old('sizes') ? array_map('trim', explode(',', old('sizes'))) : (is_array($product->sizes) ? $product->sizes : [])) }},
        presetSizes: ['S', 'M', 'L', 'XL', 'XXL', '28', '30', '32', '34', '36', '38'],
        toggleSize(size) {
            if (this.selectedSizes.includes(size)) {
                this.selectedSizes = this.selectedSizes.filter(s => s !== size);
            } else {
                this.selectedSizes.push(size);
            }
        },
        presetBadges: ['Más Vendido', 'Norma ANSI 107', 'Denim 14 oz', '100% Algodón', 'Alta Visibilidad', 'Triple Costura'],
        previewImage: '{{ $product->image ? asset($product->image) : '' }}'
     }">

    <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data" class="space-y-4 sm:space-y-6">
        @csrf
        @method('PUT')

        <!-- Campo oculto para colores y tallas combinados -->
        <input type="hidden" name="colors" :value="selectedColors.join(', ')">
        <input type="hidden" name="sizes" :value="selectedSizes.join(', ')">

        <!-- BLOQUE 1: FOTOGRAFÍA PRINCIPAL -->
        <div class="bg-white p-4 sm:p-6 rounded-2xl sm:rounded-3xl border border-slate-200/90 shadow-xs space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div>
                    <h3 class="text-sm font-bold uppercase tracking-wider text-slate-900">1. Fotografía de la Prenda</h3>
                    <p class="text-xs text-slate-500">Puedes cambiar la foto subiendo una nueva o mantener la actual</p>
                </div>
                <span class="text-[11px] font-bold text-orange-600 bg-orange-50 px-2.5 py-1 rounded-lg">Foto</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-center">
                <!-- Dropzone táctil -->
                <label class="flex flex-col items-center justify-center p-6 border-2 border-dashed border-slate-300 hover:border-orange-500 rounded-2xl cursor-pointer bg-slate-50/70 hover:bg-orange-50/20 transition-all text-center">
                    <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center mb-2 shadow-xs">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <span class="text-xs font-bold text-slate-900 block">Tocar para cambiar fotografía</span>
                    <span class="text-[11px] text-slate-400 mt-0.5">Deja vacío para conservar la foto actual</span>
                    <input type="file" 
                           name="image_file" 
                           accept="image/*"
                           @change="const file = $event.target.files[0]; if(file) { previewImage = URL.createObjectURL(file); }" 
                           class="hidden">
                </label>

                <!-- Vista Previa -->
                <div class="flex items-center justify-center p-3 bg-slate-50 rounded-2xl border border-slate-200 min-h-[140px]">
                    <template x-if="previewImage">
                        <div class="relative group">
                            <img :src="previewImage" alt="Vista previa" class="h-32 object-contain rounded-xl shadow-xs">
                        </div>
                    </template>
                    <template x-if="!previewImage">
                        <div class="text-center text-slate-400 py-4">
                            <span class="text-xs">Sin fotografía asignada</span>
                        </div>
                    </template>
                </div>
            </div>

            <div>
                <label for="image_url" class="block text-[11px] font-bold uppercase tracking-wider text-slate-500 mb-1">
                    Ruta / URL actual de la imagen
                </label>
                <input type="text" 
                       name="image_url" 
                       id="image_url" 
                       value="{{ old('image_url', $product->image) }}" 
                       class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-300 text-xs font-mono focus:ring-2 focus:ring-orange-500 focus:outline-none">
            </div>
        </div>

        <!-- BLOQUE 2: INFORMACIÓN GENERAL -->
        <div class="bg-white p-4 sm:p-6 rounded-2xl sm:rounded-3xl border border-slate-200/90 shadow-xs space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div>
                    <h3 class="text-sm font-bold uppercase tracking-wider text-slate-900">2. Información de la Prenda</h3>
                    <p class="text-xs text-slate-500">Nombre, categoría, SKU y distintivo</p>
                </div>
                <span class="text-[11px] font-bold text-orange-600 bg-orange-50 px-2.5 py-1 rounded-lg">Datos</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Nombre -->
                <div class="sm:col-span-2">
                    <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                        Nombre del Producto <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" 
                           name="name" 
                           id="name" 
                           x-model="name"
                           value="{{ old('name', $product->name) }}" 
                           required 
                           class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none @error('name') border-rose-500 @enderror">
                    @error('name') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Slug -->
                <div>
                    <label for="slug" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                        Slug URL (Identificador)
                    </label>
                    <input type="text" 
                           name="slug" 
                           id="slug" 
                           value="{{ old('slug', $product->slug) }}" 
                           class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-xs font-mono focus:ring-2 focus:ring-orange-500 focus:outline-none">
                </div>

                <!-- Categoría -->
                <div>
                    <label for="category_id" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                        Categoría / Línea <span class="text-rose-500">*</span>
                    </label>
                    <select name="category_id" 
                            id="category_id" 
                            required 
                            class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- SKU -->
                <div>
                    <label for="sku" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                        Código SKU
                    </label>
                    <input type="text" 
                           name="sku" 
                           id="sku" 
                           value="{{ old('sku', $product->sku) }}" 
                           class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm font-mono focus:ring-2 focus:ring-orange-500 focus:outline-none">
                </div>

                <!-- Badge con sugerencias -->
                <div class="sm:col-span-2 space-y-1.5">
                    <label for="badge" class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                        Etiqueta / Badge Promocional
                    </label>
                    <input type="text" 
                           name="badge" 
                           id="badge" 
                           x-model="badge"
                           value="{{ old('badge', $product->badge) }}" 
                           placeholder="Ej: Más Vendido • 10 Colores" 
                           class="w-full px-3.5 py-2 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none">

                    <div class="flex flex-wrap items-center gap-1.5 pt-1">
                        <span class="text-[10px] text-slate-400 font-bold uppercase mr-1">Sugerencias:</span>
                        <template x-for="b in presetBadges" :key="b">
                            <button type="button" 
                                    @click="badge = b" 
                                    class="text-[11px] px-2.5 py-1 rounded-lg border border-slate-200 bg-slate-50 hover:bg-orange-50 hover:border-orange-300 text-slate-700 transition-colors">
                                + <span x-text="b"></span>
                            </button>
                        </template>
                    </div>
                </div>

                <!-- Destacado en Portada -->
                <div class="sm:col-span-2 p-3.5 rounded-2xl bg-orange-50/60 border border-orange-200/80">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" 
                               name="is_featured" 
                               value="1" 
                               {{ old('is_featured', $product->is_featured) ? 'checked' : '' }} 
                               class="w-5 h-5 rounded-lg text-orange-600 focus:ring-orange-500 border-slate-300">
                        <div>
                            <span class="text-xs font-bold text-slate-900 block">Mostrar como Producto Destacado en Portada</span>
                            <span class="text-[11px] text-slate-600">Aparece en la cuadrícula de productos recomendados de la home</span>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Resumen corto -->
            <div>
                <label for="short_description" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                    Descripción Corta
                </label>
                <textarea name="short_description" 
                          id="short_description" 
                          rows="2" 
                          class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none">{{ old('short_description', $product->short_description) }}</textarea>
            </div>

            <!-- Descripción Detallada -->
            <div>
                <label for="description" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                    Especificaciones Técnicas & Ficha Completa
                </label>
                <textarea name="description" 
                          id="description" 
                          rows="4" 
                          class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none">{{ old('description', $product->description) }}</textarea>
            </div>
        </div>

        <!-- BLOQUE 3: VARIANTES INTERACTIVAS -->
        <div class="bg-white p-4 sm:p-6 rounded-2xl sm:rounded-3xl border border-slate-200/90 shadow-xs space-y-5">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div>
                    <h3 class="text-sm font-bold uppercase tracking-wider text-slate-900">3. Colores & Tallas</h3>
                    <p class="text-xs text-slate-500">Toca para activar o desactivar variantes disponibles</p>
                </div>
                <span class="text-[11px] font-bold text-orange-600 bg-orange-50 px-2.5 py-1 rounded-lg">Variantes</span>
            </div>

            <!-- SELECTOR DE COLORES -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                    Colores Disponibles:
                </label>
                <div class="flex flex-wrap gap-2">
                    <template x-for="color in presetColors" :key="color">
                        <button type="button" 
                                @click="toggleColor(color)" 
                                :class="selectedColors.includes(color) ? 'bg-slate-900 text-white border-slate-900 shadow-xs' : 'bg-slate-50 text-slate-700 border-slate-200 hover:bg-slate-100'"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold border transition-all active:scale-95">
                            <span class="w-2.5 h-2.5 rounded-full" 
                                  :class="{
                                      'bg-blue-900': color === 'Azul Marino',
                                      'bg-orange-500': color === 'Naranja Neón',
                                      'bg-yellow-400': color === 'Amarillo Neón',
                                      'bg-black': color === 'Negro',
                                      'bg-white border border-slate-300': color === 'Blanco',
                                      'bg-blue-600': color === 'Azul Rey',
                                      'bg-emerald-800': color === 'Verde Oliva',
                                      'bg-slate-500': color === 'Gris Jaspe',
                                      'bg-red-600': color === 'Rojo',
                                      'bg-amber-200': color === 'Caqui'
                                  }"></span>
                            <span x-text="color"></span>
                            <span x-show="selectedColors.includes(color)" class="text-orange-400 font-black">✓</span>
                        </button>
                    </template>
                </div>
                <p class="text-[11px] text-slate-500 mt-2">
                    Activos: <strong class="text-slate-900" x-text="selectedColors.length ? selectedColors.join(', ') : 'Ninguno'"></strong>
                </p>
            </div>

            <!-- SELECTOR DE TALLAS -->
            <div class="pt-3 border-t border-slate-100">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                    Tallas Disponibles:
                </label>
                <div class="flex flex-wrap gap-2">
                    <template x-for="size in presetSizes" :key="size">
                        <button type="button" 
                                @click="toggleSize(size)" 
                                :class="selectedSizes.includes(size) ? 'bg-orange-600 text-white border-orange-600 shadow-xs' : 'bg-slate-50 text-slate-700 border-slate-200 hover:bg-slate-100'"
                                class="w-10 h-10 rounded-xl text-xs font-bold border flex items-center justify-center transition-all active:scale-95">
                            <span x-text="size"></span>
                        </button>
                    </template>
                </div>
                <p class="text-[11px] text-slate-500 mt-2">
                    Tallas activas: <strong class="text-slate-900" x-text="selectedSizes.length ? selectedSizes.join(', ') : 'Ninguna'"></strong>
                </p>
            </div>

            <!-- Viñetas de Características -->
            <div class="pt-3 border-t border-slate-100">
                <label for="features" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                    Viñetas / Puntos Clave (Una línea por característica)
                </label>
                <textarea name="features" 
                          id="features" 
                          rows="3" 
                          class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-xs sm:text-sm font-mono focus:ring-2 focus:ring-orange-500 focus:outline-none">{{ old('features', is_array($product->features) ? implode("\n", $product->features) : '') }}</textarea>
            </div>
        </div>

        <!-- BOTONES DE ACCIÓN -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-3 pt-2">
            <a href="{{ route('products.show', $product->slug) }}" target="_blank" class="text-xs font-bold text-orange-600 hover:underline">
                &rarr; Ver cómo se muestra en la web pública
            </a>

            <div class="flex items-center gap-2.5 w-full sm:w-auto">
                <a href="{{ route('admin.products.index') }}" class="flex-1 sm:flex-initial text-center px-5 py-3 rounded-2xl border border-slate-300 text-slate-700 hover:bg-slate-100 font-bold text-xs transition-colors">
                    Cancelar
                </a>
                <button type="submit" class="flex-1 sm:flex-initial px-8 py-3 rounded-2xl bg-orange-600 hover:bg-orange-500 text-white font-bold text-xs sm:text-sm shadow-xl shadow-orange-600/30 transition-all active:scale-95">
                    Guardar Cambios
                </button>
            </div>
        </div>
    </form>

</div>
@endsection
