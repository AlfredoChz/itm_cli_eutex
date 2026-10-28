@extends('layouts.app')

@section('title', $product->name . ' | EUTEX Uniformes Industriales')
@section('meta_description', $product->short_description)

@section('content')

<!-- BREADCRUMBS -->
<div class="bg-slate-100 border-b border-slate-200 py-3.5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-xs text-slate-500 space-x-2">
            <a href="{{ route('home') }}" class="hover:text-amber-600">Inicio</a>
            <span>/</span>
            <a href="{{ route('products.index') }}" class="hover:text-amber-600">Productos</a>
            <span>/</span>
            <a href="{{ route('products.category', $product->category->slug) }}" class="hover:text-amber-600">{{ $product->category->name }}</a>
            <span>/</span>
            <span class="text-slate-800 font-semibold truncate">{{ $product->name }}</span>
        </nav>
    </div>
</div>

<!-- DETALLE DEL PRODUCTO -->
<div class="py-12 bg-white" 
     x-data="{ 
        activeImage: '{{ asset($product->image) }}',
        selectedColor: '{{ !empty($product->colors) ? $product->colors[0] : '' }}',
        selectedSize: '{{ !empty($product->sizes) ? $product->sizes[0] : '' }}',
        quantity: 24,
        activeTab: 'descripcion',
        getWhatsAppUrl() {
            let msg = '¡Hola EUTEX! Deseo cotizar el siguiente producto:\n';
            msg += '• *Producto:* {{ $product->name }}\n';
            msg += '• *SKU:* {{ $product->sku }}\n';
            if (this.selectedColor) msg += '• *Color:* ' + this.selectedColor + '\n';
            if (this.selectedSize) msg += '• *Talla:* ' + this.selectedSize + '\n';
            msg += '• *Cantidad estimada:* ' + this.quantity + ' unidades\n';
            msg += 'Por favor envíenme lista de precios y tiempos de entrega.';
            return 'https://wa.me/51920783202?text=' + encodeURIComponent(msg);
        }
     }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- COLUMNA GALERÍA DE IMÁGENES -->
            <div class="lg:col-span-6 space-y-4">
                
                <!-- Imagen Principal -->
                <div class="relative rounded-3xl overflow-hidden border border-slate-200 bg-slate-50 shadow-md h-96 sm:h-[480px]">
                    <img :src="activeImage" 
                         alt="{{ $product->name }}" 
                         class="w-full h-full object-contain p-4 transition-all duration-300">
                    
                    @if($product->badge)
                        <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-xs font-extrabold bg-gradient-to-r from-amber-400 to-amber-500 text-slate-950 shadow-md">
                            {{ $product->badge }}
                        </span>
                    @endif
                </div>

                <!-- Miniaturas de Galería -->
                @if(!empty($product->gallery) && count($product->gallery) > 1)
                    <div class="flex items-center gap-3 overflow-x-auto pb-2">
                        @foreach($product->gallery as $img)
                            <button @click="activeImage = '{{ asset($img) }}'" 
                                    :class="activeImage === '{{ asset($img) }}' ? 'border-amber-500 ring-2 ring-amber-200' : 'border-slate-200'"
                                    class="w-20 h-20 rounded-xl overflow-hidden border-2 bg-slate-50 p-1 shrink-0 focus:outline-none transition-all">
                                <img src="{{ asset($img) }}" class="w-full h-full object-cover rounded-lg">
                            </button>
                        @endforeach
                    </div>
                @endif

                <!-- Card de Garantía Textil -->
                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex items-center justify-between text-xs text-slate-600">
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        <span>Confección garantizada contra defectos</span>
                    </span>
                    <span class="font-bold text-slate-800">Hecho en Gamarra, Perú</span>
                </div>

            </div>

            <!-- COLUMNA INFORMACIÓN Y SELECTORES -->
            <div class="lg:col-span-6 space-y-6">
                
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-xs font-bold uppercase tracking-wider text-amber-600 bg-amber-50 px-2.5 py-0.5 rounded-full border border-amber-200">
                            {{ $product->category->name }}
                        </span>
                        <span class="text-xs font-mono text-slate-400">SKU: {{ $product->sku }}</span>
                    </div>

                    <h1 class="font-heading font-black text-2xl sm:text-3xl text-slate-900 leading-tight">
                        {{ $product->name }}
                    </h1>
                </div>

                <p class="text-slate-600 text-sm leading-relaxed">
                    {{ $product->short_description }}
                </p>

                <!-- Selector de Colores -->
                @if(!empty($product->colors))
                    <div class="pt-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Color Seleccionado: <span class="text-amber-600" x-text="selectedColor"></span>
                        </label>
                        <div class="flex flex-wrap gap-2">
                            @foreach($product->colors as $col)
                                <button type="button" 
                                        @click="selectedColor = '{{ $col }}'"
                                        :class="selectedColor === '{{ $col }}' ? 'bg-eutex-navy text-white border-eutex-navy shadow-md font-bold' : 'bg-slate-50 text-slate-700 border-slate-200 hover:bg-slate-100'"
                                        class="px-3.5 py-1.5 rounded-xl border text-xs transition-all">
                                    {{ $col }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Selector de Tallas -->
                @if(!empty($product->sizes))
                    <div class="pt-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Talla Disponible: <span class="text-amber-600" x-text="selectedSize"></span>
                        </label>
                        <div class="flex flex-wrap gap-2">
                            @foreach($product->sizes as $sz)
                                <button type="button" 
                                        @click="selectedSize = '{{ $sz }}'"
                                        :class="selectedSize === '{{ $sz }}' ? 'bg-amber-400 text-slate-950 border-amber-400 font-extrabold shadow-sm' : 'bg-slate-50 text-slate-700 border-slate-200 hover:bg-slate-100'"
                                        class="px-3.5 py-1.5 rounded-xl border text-xs min-w-10 text-center transition-all">
                                    {{ $sz }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Cantidad Estimada -->
                <div class="pt-2 flex items-center gap-4">
                    <label class="text-xs font-bold uppercase tracking-wider text-slate-700">Cantidad requerida:</label>
                    <div class="flex items-center border border-slate-300 rounded-xl overflow-hidden bg-white shadow-sm">
                        <button type="button" @click="if(quantity > 1) quantity--" class="px-3 py-1.5 bg-slate-100 text-slate-700 hover:bg-slate-200 font-bold">-</button>
                        <input type="number" x-model="quantity" min="1" class="w-16 py-1.5 text-center text-xs font-bold outline-none border-none">
                        <button type="button" @click="quantity++" class="px-3 py-1.5 bg-slate-100 text-slate-700 hover:bg-slate-200 font-bold">+</button>
                    </div>
                    <span class="text-xs text-slate-400">(Venta por mayor y menor)</span>
                </div>

                <!-- Botones de Acción -->
                <div class="pt-4 space-y-3">
                    <!-- Botón WhatsApp Dinámico -->
                    <a :href="getWhatsAppUrl()" target="_blank"
                       class="w-full py-4 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-heading font-black text-sm shadow-lg shadow-emerald-600/20 flex items-center justify-center gap-2 transition-all">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        <span>Cotizar de Inmediato por WhatsApp</span>
                    </a>

                    <!-- Botón Modal Cotización Formal -->
                    <button type="button"
                            @click="$store.quoteCart.open({{ $product }})"
                            class="w-full py-3.5 rounded-xl bg-eutex-navy hover:bg-eutex-navy-light text-white font-heading font-bold text-sm shadow transition-all flex items-center justify-center gap-2">
                        <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        <span>Solicitar Cotización Formal por Correo</span>
                    </button>
                </div>

                <!-- Callout de Despacho -->
                <div class="pt-4 border-t border-slate-100 grid grid-cols-2 gap-4 text-xs text-slate-500">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>Entrega rápida según volumen</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                        <span>Factura o Boleta Electrónica</span>
                    </div>
                </div>

            </div>

        </div>

        <!-- PESTAÑAS TÉCNICAS (DESCRIPCIÓN, FICHA TÉCNICA, CUIDADOS) -->
        <div class="mt-16 pt-10 border-t border-slate-200">
            
            <div class="flex border-b border-slate-200 space-x-8">
                <button @click="activeTab = 'descripcion'" 
                        :class="activeTab === 'descripcion' ? 'border-amber-500 text-eutex-navy font-black' : 'border-transparent text-slate-500 hover:text-slate-800'"
                        class="pb-4 font-heading text-sm sm:text-base border-b-2 transition-all">
                    Descripción Completa
                </button>
                <button @click="activeTab = 'ficha'" 
                        :class="activeTab === 'ficha' ? 'border-amber-500 text-eutex-navy font-black' : 'border-transparent text-slate-500 hover:text-slate-800'"
                        class="pb-4 font-heading text-sm sm:text-base border-b-2 transition-all">
                    Ficha Técnica & Normativa
                </button>
            </div>

            <!-- Tab 1: Descripción -->
            <div x-show="activeTab === 'descripcion'" class="py-8 space-y-6">
                <div class="prose max-w-none text-slate-700 text-sm sm:text-base leading-relaxed">
                    <p>{{ $product->description }}</p>
                </div>

                @if(!empty($product->features))
                    <div class="mt-6">
                        <h4 class="font-heading font-bold text-base text-slate-900 mb-3">Características Destacadas</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            @foreach($product->features as $feat)
                                <div class="flex items-start gap-2.5 p-3 rounded-xl bg-slate-50 border border-slate-200/80 text-xs sm:text-sm text-slate-700">
                                    <svg class="w-4 h-4 text-emerald-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span>{{ $feat }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Tab 2: Ficha Técnica -->
            <div x-show="activeTab === 'ficha'" class="py-8">
                @if(!empty($product->specs))
                    <div class="overflow-hidden rounded-2xl border border-slate-200 shadow-sm">
                        <table class="w-full text-left text-xs sm:text-sm">
                            <thead class="bg-eutex-navy text-white text-xs uppercase font-heading">
                                <tr>
                                    <th class="p-3.5">Parámetro Técnico</th>
                                    <th class="p-3.5">Especificación EUTEX</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200">
                                @foreach($product->specs as $param => $val)
                                    <tr class="hover:bg-slate-50">
                                        <td class="p-3.5 font-bold text-slate-900 w-1/3 bg-slate-50/50">{{ $param }}</td>
                                        <td class="p-3.5 text-slate-700">{{ $val }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-sm text-slate-500">Consulte la ficha técnica completa a través de nuestros canales de atención.</p>
                @endif
            </div>

        </div>

        <!-- PRODUCTOS RELACIONADOS -->
        @if($relatedProducts->count() > 0)
            <div class="mt-16 pt-10 border-t border-slate-200">
                <h3 class="font-heading font-black text-xl text-slate-900 mb-8">
                    Prendas Complementarias de la Misma Línea
                </h3>
                
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    @foreach($relatedProducts as $rel)
                        <div class="bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-lg transition-all group flex flex-col justify-between">
                            <div>
                                <div class="h-48 overflow-hidden bg-slate-100">
                                    <img src="{{ asset($rel->image) }}" alt="{{ $rel->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform">
                                </div>
                                <div class="p-4">
                                    <h4 class="font-heading font-bold text-sm text-slate-900 group-hover:text-amber-600 truncate mb-1">
                                        <a href="{{ route('products.show', $rel->slug) }}">{{ $rel->name }}</a>
                                    </h4>
                                    <p class="text-xs text-slate-500 line-clamp-2">{{ $rel->short_description }}</p>
                                </div>
                            </div>
                            <div class="p-4 pt-0">
                                <a href="{{ route('products.show', $rel->slug) }}" class="text-xs font-bold text-eutex-navy hover:text-amber-600 flex items-center gap-1">
                                    Ver producto &rarr;
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>

@endsection
