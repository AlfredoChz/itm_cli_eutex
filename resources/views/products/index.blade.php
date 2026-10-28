@extends('layouts.app')

@section('title', ($selectedCategory ? $selectedCategory->name . ' | ' : '') . 'Catálogo de Uniformes Industriales | EUTEX Gamarra')
@section('meta_description', 'Explore el catálogo completo de uniformes de trabajo de EUTEX: polos manga larga en 10 colores, chalecos reflectivos ANSI, jeans 14 oz y mamelucos. Fabricación en Gamarra.')

@section('content')

<!-- HEADER DE CATÁLOGO -->
<div class="bg-eutex-navy text-white py-12 border-b border-white/10 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Breadcrumbs -->
        <nav class="flex text-xs text-slate-300 mb-3 space-x-2">
            <a href="{{ route('home') }}" class="hover:text-amber-400">Inicio</a>
            <span>/</span>
            <a href="{{ route('products.index') }}" class="hover:text-amber-400">Productos</a>
            @if($selectedCategory)
                <span>/</span>
                <span class="text-amber-400 font-semibold">{{ $selectedCategory->name }}</span>
            @endif
        </nav>

        <h1 class="font-heading font-black text-2xl sm:text-4xl text-white">
            {{ $selectedCategory ? $selectedCategory->name : 'Catálogo General de Uniformes Industriales' }}
        </h1>
        
        <p class="text-slate-300 text-sm mt-2 max-w-2xl leading-relaxed">
            {{ $selectedCategory ? $selectedCategory->description : 'Prendas de alta durabilidad y protección para empresas mineras, constructoras y plantas industriales. Venta por mayor y menor con bordado corporativo.' }}
        </p>
    </div>
</div>

<!-- CONTENIDO PRINCIPAL DEL CATÁLOGO -->
<div class="py-12 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            
            <!-- SIDEBAR DE FILTROS -->
            <aside class="space-y-6">
                
                <!-- Buscador rápido -->
                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
                    <h3 class="font-heading font-bold text-sm text-slate-900 mb-3 flex items-center gap-2">
                        <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <span>Buscar en Catálogo</span>
                    </h3>
                    <form action="{{ route('products.index') }}" method="GET">
                        @if(request('categoria'))
                            <input type="hidden" name="categoria" value="{{ request('categoria') }}">
                        @endif
                        <div class="relative">
                            <input type="text" name="q" value="{{ request('q') }}" placeholder="Polo, chaleco, jean..." 
                                   class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs focus:border-amber-500 focus:ring-1 focus:ring-amber-500 outline-none">
                            <button type="submit" class="absolute right-2.5 top-2.5 text-slate-400 hover:text-slate-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Lista de Categorías -->
                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
                    <h3 class="font-heading font-bold text-sm text-slate-900 mb-3 flex items-center justify-between">
                        <span>Categorías</span>
                        <a href="{{ route('products.index') }}" class="text-[11px] font-semibold text-amber-600 hover:underline">Ver todas</a>
                    </h3>

                    <ul class="space-y-1.5 text-xs">
                        <li>
                            <a href="{{ route('products.index') }}" 
                               class="flex items-center justify-between p-2 rounded-xl transition-colors {{ !request('categoria') && !isset($selectedCategory) ? 'bg-amber-50 text-amber-900 font-bold' : 'text-slate-600 hover:bg-slate-50' }}">
                                <span>Todas las Prendas</span>
                                <span class="px-2 py-0.5 rounded-full text-[10px] bg-slate-100 font-medium">{{ \App\Models\Product::count() }}</span>
                            </a>
                        </li>
                        @foreach($categories as $cat)
                            <li>
                                <a href="{{ route('products.category', $cat->slug) }}" 
                                   class="flex items-center justify-between p-2 rounded-xl transition-colors {{ (isset($selectedCategory) && $selectedCategory->id === $cat->id) || request('categoria') === $cat->slug ? 'bg-amber-50 text-amber-900 font-bold' : 'text-slate-600 hover:bg-slate-50' }}">
                                    <span class="truncate pr-2">{{ $cat->name }}</span>
                                    <span class="px-2 py-0.5 rounded-full text-[10px] bg-slate-100 font-medium shrink-0">{{ $cat->products_count }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Tarjeta de Asesoría de Ventas -->
                <div class="p-6 rounded-2xl bg-gradient-to-br from-eutex-navy to-eutex-navy-dark text-white shadow-md text-center space-y-3">
                    <div class="w-10 h-10 rounded-full bg-amber-400 text-slate-950 flex items-center justify-center font-bold mx-auto">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    </div>
                    <h4 class="font-heading font-bold text-sm text-white">¿Necesita Confección Especial?</h4>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        Desarrollamos uniformes con los colores y especificaciones técnicas que su empresa requiera.
                    </p>
                    <a href="https://wa.me/51920783202?text={{ urlencode('Hola EUTEX, deseo asesoría para un pedido de confección especial.') }}" 
                       target="_blank"
                       class="inline-block w-full py-2.5 rounded-xl bg-amber-400 hover:bg-amber-300 text-slate-950 text-xs font-bold transition-all shadow">
                        Hablar con Asesor Técnico
                    </a>
                </div>

            </aside>

            <!-- GRID PRINCIPAL DE PRODUCTOS -->
            <main class="lg:col-span-3 space-y-6">
                
                <!-- Barra superior de conteo y ordenamiento -->
                <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-4 text-xs">
                    <span class="text-slate-600 font-medium">
                        Mostrando <strong>{{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }}</strong> de <strong>{{ $products->total() }}</strong> productos
                    </span>

                    <form action="{{ url()->current() }}" method="GET" class="flex items-center gap-2">
                        @if(request('q'))
                            <input type="hidden" name="q" value="{{ request('q') }}">
                        @endif
                        @if(request('categoria'))
                            <input type="hidden" name="categoria" value="{{ request('categoria') }}">
                        @endif
                        <label class="text-slate-500 font-medium shrink-0">Ordenar por:</label>
                        <select name="sort" onchange="this.form.submit()" class="px-3 py-1.5 rounded-lg border border-slate-300 bg-white text-xs outline-none">
                            <option value="destacados" {{ request('sort') == 'destacados' ? 'selected' : '' }}>Destacados</option>
                            <option value="nombre_asc" {{ request('sort') == 'nombre_asc' ? 'selected' : '' }}>Nombre: A - Z</option>
                            <option value="nombre_desc" {{ request('sort') == 'nombre_desc' ? 'selected' : '' }}>Nombre: Z - A</option>
                        </select>
                    </form>
                </div>

                <!-- Grid de Tarjetas -->
                @if($products->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($products as $product)
                            <div class="bg-white rounded-2xl overflow-hidden border border-slate-200/90 shadow-sm hover:shadow-xl hover:border-amber-400 transition-all flex flex-col justify-between group product-card">
                                
                                <div>
                                    <div class="relative h-56 overflow-hidden bg-slate-100">
                                        <img src="{{ asset($product->image) }}" 
                                             alt="{{ $product->name }}" 
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                        
                                        @if($product->badge)
                                            <span class="absolute top-3 left-3 px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-gradient-to-r from-amber-400 to-amber-500 text-slate-950 shadow">
                                                {{ $product->badge }}
                                            </span>
                                        @endif

                                        <span class="absolute bottom-2.5 right-2.5 px-2 py-0.5 rounded text-[10px] font-semibold bg-slate-900/80 text-white backdrop-blur-sm">
                                            {{ $product->sku }}
                                        </span>
                                    </div>

                                    <div class="p-5">
                                        <span class="text-[10px] font-bold text-amber-600 uppercase tracking-wider block mb-1">
                                            {{ $product->category->name }}
                                        </span>

                                        <h3 class="font-heading font-extrabold text-base text-slate-900 group-hover:text-eutex-navy transition-colors mb-2 leading-snug">
                                            <a href="{{ route('products.show', $product->slug) }}">
                                                {{ $product->name }}
                                            </a>
                                        </h3>

                                        <p class="text-xs text-slate-500 line-clamp-2 mb-3 leading-relaxed">
                                            {{ $product->short_description }}
                                        </p>

                                        @if(!empty($product->colors))
                                            <div class="flex items-center gap-1 text-[11px] text-slate-500 mb-2">
                                                <span class="font-semibold">Colores:</span>
                                                <span class="truncate">{{ implode(', ', array_slice($product->colors, 0, 3)) }}...</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="p-5 pt-0 border-t border-slate-100 flex items-center gap-2">
                                    <a href="https://wa.me/51920783202?text={{ urlencode('Hola EUTEX, deseo cotizar: ' . $product->name) }}" 
                                       target="_blank"
                                       class="flex-1 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold flex items-center justify-center gap-1.5 shadow transition-colors">
                                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                        <span>Cotizar</span>
                                    </a>

                                    <a href="{{ route('products.show', $product->slug) }}"
                                       class="px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-bold transition-colors">
                                        Ficha
                                    </a>
                                </div>

                            </div>
                        @endforeach
                    </div>

                    <!-- Paginación -->
                    <div class="pt-6">
                        {{ $products->links() }}
                    </div>
                @else
                    <div class="bg-white p-12 rounded-2xl border border-slate-200 text-center space-y-4">
                        <div class="w-16 h-16 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mx-auto">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <h3 class="font-heading font-bold text-lg text-slate-800">No encontramos productos con esos criterios</h3>
                        <p class="text-xs text-slate-500 max-w-sm mx-auto">
                            Intente restablecer los filtros de búsqueda o consulte a través de WhatsApp por el modelo específico.
                        </p>
                        <a href="{{ route('products.index') }}" class="inline-block px-5 py-2.5 rounded-xl bg-eutex-navy text-white text-xs font-bold">
                            Ver todo el catálogo
                        </a>
                    </div>
                @endif

            </main>

        </div>

    </div>
</div>

@endsection
