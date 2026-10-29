@extends('admin.layouts.app')

@section('title', 'Productos Industriales')
@section('header_title', 'Catálogo de Productos')
@section('header_subtitle', 'Crea, edita y organiza las prendas y uniformes de EUTEX')

@section('header_action')
    <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl text-xs font-bold text-white bg-orange-600 hover:bg-orange-500 shadow-md shadow-orange-600/30 transition-all active:scale-95">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
        </svg>
        <span class="hidden sm:inline">Nuevo Producto</span>
        <span class="sm:hidden">Nuevo</span>
    </a>
@endsection

@section('content')
<div class="space-y-4 sm:space-y-6">

    <!-- FILTROS Y BÚSQUEDA RÁPIDA -->
    <div class="bg-white p-3.5 sm:p-5 rounded-2xl sm:rounded-3xl border border-slate-200/90 shadow-xs" x-data="{ filtersOpen: false }">
        <!-- Barra de búsqueda principal siempre visible -->
        <form method="GET" action="{{ route('admin.products.index') }}" class="space-y-3">
            <div class="flex items-center gap-2">
                <div class="relative flex-1">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}" 
                           placeholder="Buscar por nombre, SKU o descripción..." 
                           class="w-full pl-10 pr-4 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-xs sm:text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none">
                </div>

                <button type="submit" class="px-4 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs rounded-xl transition-colors shrink-0">
                    Buscar
                </button>

                <!-- Toggle filtros avanzados en móvil -->
                <button type="button" 
                        @click="filtersOpen = !filtersOpen" 
                        class="sm:hidden p-2.5 rounded-xl border border-slate-300 bg-slate-50 text-slate-600 hover:bg-slate-100"
                        title="Filtros avanzados">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                </button>
            </div>

            <!-- Filtros desplegables (siempre visibles en desktop, desplegables en móvil) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 pt-2" :class="filtersOpen ? 'block' : 'hidden sm:grid'">
                <!-- Categoría -->
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-500 mb-1">Categoría</label>
                    <select name="category_id" onchange="this.form.submit()" class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-300 text-xs focus:ring-2 focus:ring-orange-500 focus:outline-none">
                        <option value="">Todas las categorías ({{ $categories->count() }})</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Destacados -->
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-500 mb-1">Visibilidad</label>
                    <select name="featured" onchange="this.form.submit()" class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-300 text-xs focus:ring-2 focus:ring-orange-500 focus:outline-none">
                        <option value="">Todos los productos</option>
                        <option value="1" {{ request('featured') === '1' ? 'selected' : '' }}>Solo Destacados en Portada</option>
                    </select>
                </div>

                <!-- Limpiar -->
                <div class="flex items-end">
                    @if(request()->hasAny(['search', 'category_id', 'featured']))
                        <a href="{{ route('admin.products.index') }}" class="w-full text-center px-3 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs rounded-xl transition-colors">
                            Limpiar Filtros
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>

    <!-- CONTENEDOR DE PRODUCTOS -->
    <div class="bg-white rounded-2xl sm:rounded-3xl border border-slate-200/90 shadow-xs overflow-hidden">
        @if($products->count() > 0)

            <!-- ======================================================== -->
            <!-- VISTA MÓVIL (TARJETAS GRANDES PARA CELULARES) -->
            <!-- ======================================================== -->
            <div class="block md:hidden divide-y divide-slate-100">
                @foreach($products as $product)
                    <div class="p-4 space-y-3 hover:bg-slate-50/60 transition-colors">
                        <div class="flex items-start gap-3">
                            <!-- Foto del Producto -->
                            <div class="w-20 h-20 rounded-2xl bg-slate-100 border border-slate-200 overflow-hidden shrink-0 flex items-center justify-center">
                                @if($product->image)
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-8 h-8 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                @endif
                            </div>

                            <!-- Información Principal -->
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between gap-1 mb-1">
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-orange-600 bg-orange-50 px-2 py-0.5 rounded-md truncate max-w-[150px]">
                                        {{ $product->category->name ?? 'General' }}
                                    </span>

                                    <!-- Botón rápido de destacar -->
                                    <form method="POST" action="{{ route('admin.products.toggle-featured', $product) }}">
                                        @csrf
                                        <button type="submit" 
                                                title="{{ $product->is_featured ? 'Quitar de destacados' : 'Marcar como destacado' }}" 
                                                class="p-1 rounded-lg {{ $product->is_featured ? 'text-amber-500 bg-amber-50' : 'text-slate-300 bg-slate-100' }}">
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>

                                <h4 class="font-bold text-slate-900 text-sm leading-snug">{{ $product->name }}</h4>
                                <p class="text-[11px] font-mono text-slate-500 mt-0.5">SKU: {{ $product->sku ?? 'N/A' }}</p>

                                @if($product->badge)
                                    <span class="inline-block mt-1 text-[10px] font-semibold text-slate-600 bg-slate-100 px-2 py-0.5 rounded">
                                        {{ $product->badge }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Variantes info -->
                        <div class="flex items-center justify-between text-xs text-slate-600 bg-slate-50 p-2 rounded-xl">
                            <span>
                                <strong class="text-slate-800">{{ is_array($product->colors) ? count($product->colors) : 0 }}</strong> colores
                                •
                                <strong class="text-slate-800">{{ is_array($product->sizes) ? count($product->sizes) : 0 }}</strong> tallas
                            </span>
                            <a href="{{ route('products.show', $product->slug) }}" target="_blank" class="text-orange-600 font-bold hover:underline">
                                Ver en web &rarr;
                            </a>
                        </div>

                        <!-- Botones de Acción Móvil Grandes -->
                        <div class="flex items-center gap-2 pt-1">
                            <a href="{{ route('admin.products.edit', $product) }}" 
                               class="flex-1 inline-flex items-center justify-center gap-1.5 py-2 px-3 rounded-xl bg-slate-900 text-white font-bold text-xs hover:bg-slate-800 transition-colors">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                <span>Editar</span>
                            </a>

                            <form method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('¿Seguro que deseas eliminar este producto?');" class="shrink-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 rounded-xl bg-rose-50 text-rose-600 hover:bg-rose-100 transition-colors" title="Eliminar">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- ======================================================== -->
            <!-- VISTA ESCRITORIO (TABLA DETALLADA) -->
            <!-- ======================================================== -->
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 text-slate-500 font-bold uppercase tracking-wider border-b border-slate-100">
                        <tr>
                            <th class="py-3.5 px-4">Producto</th>
                            <th class="py-3.5 px-4">Categoría</th>
                            <th class="py-3.5 px-4">SKU / Distintivo</th>
                            <th class="py-3.5 px-4">Colores / Tallas</th>
                            <th class="py-3.5 px-4 text-center">Destacado</th>
                            <th class="py-3.5 px-4 text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($products as $product)
                            <tr class="hover:bg-slate-50/70 transition-colors">
                                <!-- Imagen y Nombre -->
                                <td class="py-3.5 px-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 rounded-xl bg-slate-100 border border-slate-200 overflow-hidden shrink-0 flex items-center justify-center">
                                            @if($product->image)
                                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                            @else
                                                <svg class="w-6 h-6 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="font-bold text-slate-900 text-sm leading-snug">{{ $product->name }}</p>
                                            <p class="text-[11px] text-slate-500 line-clamp-1 mt-0.5">{{ $product->short_description }}</p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Categoría -->
                                <td class="py-3.5 px-4">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-[11px] font-medium bg-slate-100 text-slate-800">
                                        {{ $product->category->name ?? 'Sin categoría' }}
                                    </span>
                                </td>

                                <!-- SKU / Badge -->
                                <td class="py-3.5 px-4">
                                    <p class="font-mono text-slate-700 font-bold">{{ $product->sku ?? '-' }}</p>
                                    @if($product->badge)
                                        <span class="inline-block mt-0.5 text-[10px] font-semibold text-orange-600 bg-orange-50 px-2 py-0.5 rounded">
                                            {{ $product->badge }}
                                        </span>
                                    @endif
                                </td>

                                <!-- Colores y Tallas -->
                                <td class="py-3.5 px-4">
                                    <p class="text-slate-600">
                                        <span class="font-bold text-slate-800">{{ is_array($product->colors) ? count($product->colors) : 0 }}</span> colores
                                        •
                                        <span class="font-bold text-slate-800">{{ is_array($product->sizes) ? count($product->sizes) : 0 }}</span> tallas
                                    </p>
                                </td>

                                <!-- Destacado Toggle -->
                                <td class="py-3.5 px-4 text-center">
                                    <form method="POST" action="{{ route('admin.products.toggle-featured', $product) }}">
                                        @csrf
                                        <button type="submit" 
                                                title="{{ $product->is_featured ? 'Quitar de destacados' : 'Marcar como destacado' }}" 
                                                class="p-1.5 rounded-lg transition-colors {{ $product->is_featured ? 'text-amber-500 bg-amber-50 hover:bg-amber-100' : 'text-slate-300 hover:text-amber-400 bg-slate-50' }}">
                                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </td>

                                <!-- Acciones -->
                                <td class="py-3.5 px-4 text-right">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <!-- Ver en catálogo público -->
                                        <a href="{{ route('products.show', $product->slug) }}" 
                                           target="_blank" 
                                           title="Ver en la web pública"
                                           class="p-2 rounded-xl text-slate-500 hover:text-slate-900 hover:bg-slate-100 transition-colors">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                            </svg>
                                        </a>

                                        <!-- Editar -->
                                        <a href="{{ route('admin.products.edit', $product) }}" 
                                           title="Editar Producto"
                                           class="p-2 rounded-xl text-blue-600 hover:bg-blue-50 transition-colors">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        <!-- Eliminar -->
                                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('¿Seguro que deseas eliminar este producto?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    title="Eliminar Producto"
                                                    class="p-2 rounded-xl text-rose-600 hover:bg-rose-50 transition-colors">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <div class="p-4 border-t border-slate-100 bg-slate-50/50">
                {{ $products->links() }}
            </div>
        @else
            <div class="p-12 text-center text-slate-400">
                <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 text-slate-400 flex items-center justify-center mb-3">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <h4 class="text-base font-bold text-slate-800">No se encontraron productos</h4>
                <p class="text-xs text-slate-500 mt-1">Prueba cambiando los filtros o añade un nuevo producto al catálogo.</p>
                <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-1.5 mt-4 px-4 py-2.5 bg-orange-600 hover:bg-orange-500 text-white font-bold text-xs rounded-xl shadow-md transition-all">
                    + Crear Producto Ahora
                </a>
            </div>
        @endif
    </div>

</div>
@endsection
