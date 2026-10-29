@extends('admin.layouts.app')

@section('title', 'Nueva Categoría')
@section('header_title', 'Crear Nueva Línea o Categoría')
@section('header_subtitle', 'Agrega un nuevo sector de prendas al catálogo')

@section('header_action')
    <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 border border-slate-300 transition-colors">
        &larr; Volver
    </a>
@endsection

@section('content')
<div class="max-w-2xl mx-auto">

    <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs space-y-4">
            <!-- Nombre -->
            <div>
                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                    Nombre de la Categoría <span class="text-rose-500">*</span>
                </label>
                <input type="text" 
                       name="name" 
                       id="name" 
                       value="{{ old('name') }}" 
                       required 
                       placeholder="Ej: Calzado de Seguridad & Botas Industriales" 
                       class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none @error('name') border-rose-500 @enderror">
                @error('name') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Slug y Orden -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="slug" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                        Slug URL (Opcional)
                    </label>
                    <input type="text" 
                           name="slug" 
                           id="slug" 
                           value="{{ old('slug') }}" 
                           placeholder="calzado-seguridad" 
                           class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-xs font-mono focus:ring-2 focus:ring-orange-500 focus:outline-none">
                </div>

                <div>
                    <label for="order" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                        Orden de Visualización
                    </label>
                    <input type="number" 
                           name="order" 
                           id="order" 
                           value="{{ old('order', 1) }}" 
                           class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none">
                </div>
            </div>

            <!-- Descripción -->
            <div>
                <label for="description" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                    Descripción
                </label>
                <textarea name="description" 
                          id="description" 
                          rows="3" 
                          placeholder="Descripción breve de los productos que abarca esta categoría..." 
                          class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none">{{ old('description') }}</textarea>
            </div>

            <!-- Imagen -->
            <div x-data="{ preview: null }">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                    Imagen Representativa (Opcional)
                </label>
                <input type="file" 
                       name="image_file" 
                       accept="image/*"
                       @change="const file = $event.target.files[0]; if(file) { preview = URL.createObjectURL(file); }"
                       class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100 cursor-pointer">
                
                <template x-if="preview">
                    <div class="mt-3">
                        <img :src="preview" alt="Previa" class="h-24 rounded-lg border border-slate-200">
                    </div>
                </template>
            </div>
        </div>

        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('admin.categories.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 font-bold text-xs transition-colors">
                Cancelar
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-orange-600 hover:bg-orange-500 text-white font-bold text-xs shadow-lg shadow-orange-600/30 transition-all">
                Crear Categoría
            </button>
        </div>
    </form>

</div>
@endsection
