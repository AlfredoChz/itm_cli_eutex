@extends('admin.layouts.app')

@section('title', 'Nuevo Producto')
@section('header_title', 'Crear Nuevo Producto')
@section('header_subtitle', 'Agrega una nueva prenda o artículo industrial al catálogo EUTEX')

@section('header_action')
    <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 border border-slate-300 transition-colors">
        &larr; Volver a la lista
    </a>
@endsection

@section('content')
<div class="max-w-4xl mx-auto">

    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- INFORMACIÓN GENERAL -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs space-y-4">
            <h3 class="text-sm font-bold uppercase tracking-wider text-slate-900 border-b border-slate-100 pb-3">Información General</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Nombre del Producto -->
                <div class="sm:col-span-2">
                    <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                        Nombre del Producto <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" 
                           name="name" 
                           id="name" 
                           value="{{ old('name') }}" 
                           required 
                           placeholder="Ej: Polo Manga Larga Industrial Cuello Redondo" 
                           class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none @error('name') border-rose-500 @enderror">
                    @error('name') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
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
                        <option value="">Selecciona una categoría...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- SKU -->
                <div>
                    <label for="sku" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                        Código SKU (Opcional)
                    </label>
                    <input type="text" 
                           name="sku" 
                           id="sku" 
                           value="{{ old('sku') }}" 
                           placeholder="Ej: EUT-POL-101" 
                           class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm font-mono focus:ring-2 focus:ring-orange-500 focus:outline-none">
                </div>

                <!-- Badge / Distintivo -->
                <div>
                    <label for="badge" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                        Etiqueta / Badge Promocional
                    </label>
                    <input type="text" 
                           name="badge" 
                           id="badge" 
                           value="{{ old('badge') }}" 
                           placeholder="Ej: Más Vendido • 10 Colores / Norma ANSI 107" 
                           class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none">
                </div>

                <!-- Destacado en Portada -->
                <div class="flex items-center pt-6">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" 
                               name="is_featured" 
                               value="1" 
                               {{ old('is_featured') ? 'checked' : '' }} 
                               class="w-4 h-4 rounded text-orange-600 focus:ring-orange-500 border-slate-300">
                        <div>
                            <span class="text-xs font-bold text-slate-900 block">Destacar en Página Principal</span>
                            <span class="text-[11px] text-slate-500">Se mostrará en la sección de productos destacados de la home</span>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Resumen corto -->
            <div>
                <label for="short_description" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                    Descripción Corta (Para tarjetas del catálogo)
                </label>
                <textarea name="short_description" 
                          id="short_description" 
                          rows="2" 
                          placeholder="Breve resumen de 1 a 2 líneas para mostrar en el catálogo y tarjeta..." 
                          class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none">{{ old('short_description') }}</textarea>
            </div>

            <!-- Descripción Detallada -->
            <div>
                <label for="description" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                    Descripción Completa & Especificaciones Técnicas
                </label>
                <textarea name="description" 
                          id="description" 
                          rows="5" 
                          placeholder="Detalles sobre telas, gramaje, normas de seguridad y usos recomendados..." 
                          class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none">{{ old('description') }}</textarea>
            </div>
        </div>

        <!-- FOTOGRAFÍA DEL PRODUCTO -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs space-y-4" x-data="{ preview: null }">
            <h3 class="text-sm font-bold uppercase tracking-wider text-slate-900 border-b border-slate-100 pb-3">Fotografía Principal</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-center">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                        Subir Imagen desde el dispositivo
                    </label>
                    <input type="file" 
                           name="image_file" 
                           accept="image/*"
                           @change="const file = $event.target.files[0]; if(file) { preview = URL.createObjectURL(file); }"
                           class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100 cursor-pointer">
                    <p class="text-[11px] text-slate-400 mt-1">Formatos admitidos: JPG, PNG, WEBP (Máx. 4MB)</p>
                </div>

                <div class="flex items-center justify-center p-3 bg-slate-50 rounded-xl border border-dashed border-slate-300 min-h-[140px]">
                    <template x-if="preview">
                        <img :src="preview" alt="Vista previa" class="h-32 object-contain rounded-lg">
                    </template>
                    <template x-if="!preview">
                        <div class="text-center text-slate-400">
                            <svg class="w-8 h-8 mx-auto mb-1 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="text-xs">Sin imagen seleccionada</span>
                        </div>
                    </template>
                </div>
            </div>

            <div>
                <label for="image_url" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                    O ingresa una ruta / URL de imagen existente
                </label>
                <input type="text" 
                       name="image_url" 
                       id="image_url" 
                       value="{{ old('image_url') }}" 
                       placeholder="/images/products/polo-pique-ejecutivo.jpg" 
                       class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-xs font-mono focus:ring-2 focus:ring-orange-500 focus:outline-none">
            </div>
        </div>

        <!-- VARIANTES Y CARACTERÍSTICAS -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs space-y-4">
            <h3 class="text-sm font-bold uppercase tracking-wider text-slate-900 border-b border-slate-100 pb-3">Variantes & Puntos Clave</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Colores disponibles -->
                <div>
                    <label for="colors" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                        Colores Disponibles (Separados por coma)
                    </label>
                    <input type="text" 
                           name="colors" 
                           id="colors" 
                           value="{{ old('colors') }}" 
                           placeholder="Azul Marino, Naranja, Blanco, Negro, Gris" 
                           class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none">
                    <p class="text-[11px] text-slate-400 mt-1">Ej: Blanco, Azul Marino, Negro, Naranja Neón</p>
                </div>

                <!-- Tallas disponibles -->
                <div>
                    <label for="sizes" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                        Tallas Disponibles (Separadas por coma)
                    </label>
                    <input type="text" 
                           name="sizes" 
                           id="sizes" 
                           value="{{ old('sizes') }}" 
                           placeholder="S, M, L, XL, XXL o 28, 30, 32, 34" 
                           class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none">
                    <p class="text-[11px] text-slate-400 mt-1">Ej: S, M, L, XL, XXL o tallas numéricas 28, 30, 32</p>
                </div>
            </div>

            <!-- Viñetas de Características -->
            <div>
                <label for="features" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                    Características Destacadas (Una por línea)
                </label>
                <textarea name="features" 
                          id="features" 
                          rows="4" 
                          placeholder="Tela 100% Algodón Reactivo 20/1&#10;Cintas reflectivas de alta visibilidad de 2 pulgadas&#10;Costuras reforzadas con remalle de seguridad" 
                          class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm font-mono focus:ring-2 focus:ring-orange-500 focus:outline-none">{{ old('features') }}</textarea>
                <p class="text-[11px] text-slate-400 mt-1">Escribe cada viñeta en una línea separada</p>
            </div>
        </div>

        <!-- BOTONES DE ACCIÓN -->
        <div class="flex items-center justify-end gap-3 pt-4">
            <a href="{{ route('admin.products.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 font-bold text-xs transition-colors">
                Cancelar
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-orange-600 hover:bg-orange-500 text-white font-bold text-xs shadow-lg shadow-orange-600/30 transition-all">
                Guardar Producto
            </button>
        </div>
    </form>

</div>
@endsection
