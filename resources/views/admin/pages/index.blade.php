@extends('admin.layouts.app')

@section('title', 'Gestión de Páginas & Contenido')
@section('header_title', 'Páginas & Contenido Web')
@section('header_subtitle', 'Personaliza banners, datos de contacto, textos de Nosotros y Servicios en tiempo real')

@section('content')
<div class="space-y-6" 
     x-data="{ 
        tab: '{{ $activeTab }}',
        dropdownOpen: false,
        sections: {
            banners: {
                title: 'Banners de Inicio',
                subtitle: 'Slider horizontal principal en la portada de la web',
                badge: '{{ count($banners) }} activos'
            },
            contacto: {
                title: 'Contacto & WhatsApp',
                subtitle: 'Teléfonos, WhatsApp directo, correo y horario de atención',
                badge: null
            },
            nosotros: {
                title: 'Página Nosotros',
                subtitle: 'Historia de marca, propósito, misión, visión y estadísticas',
                badge: null
            },
            servicios: {
                title: 'Página Servicios',
                subtitle: 'Capacidades de confección textil, corte industrial y bordado',
                badge: '{{ count($servicios) }} activos'
            },
            redes: {
                title: 'Redes & Pie de Página',
                subtitle: 'Redes sociales, texto legal de marca y enlaces del footer',
                badge: null
            }
        },
        selectTab(key) {
            this.tab = key;
            this.dropdownOpen = false;
            if (window.history && window.history.replaceState) {
                const url = new URL(window.location);
                url.searchParams.set('tab', key);
                window.history.replaceState({}, '', url);
            }
        }
     }">

    <!-- ======================================================== -->
    <!-- SELECTOR DESPLEGABLE DE SECCIÓN (DROPDOWN MODERNO) -->
    <!-- ======================================================== -->
    <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs p-4 sm:p-5">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            
            <!-- Etiqueta informativa -->
            <div>
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-orange-500 animate-pulse"></span>
                    <span class="text-xs font-black uppercase tracking-wider text-slate-800">Sección de la Página a Editar</span>
                </div>
                <p class="text-xs text-slate-500 mt-0.5">Selecciona en el menú desplegable la página o bloque que deseas modificar</p>
            </div>

            <!-- Menú Desplegable con Alpine.js -->
            <div class="relative w-full md:w-96" @click.outside="dropdownOpen = false">
                <!-- Botón Gatillo del Desplegable -->
                <button type="button" 
                        @click="dropdownOpen = !dropdownOpen"
                        class="w-full flex items-center justify-between gap-3 px-4 py-3 bg-slate-50 hover:bg-slate-100/90 border-2 border-slate-200 hover:border-orange-500 rounded-xl transition-all duration-200 text-left shadow-xs focus:outline-none focus:ring-2 focus:ring-orange-500/20 group">
                    <div class="flex items-center gap-3 min-w-0">
                        <!-- Icono según sección activa -->
                        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-orange-500 to-amber-600 text-white flex items-center justify-center shrink-0 shadow-sm shadow-orange-500/20">
                            <template x-if="tab === 'banners'">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </template>
                            <template x-if="tab === 'contacto'">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </template>
                            <template x-if="tab === 'nosotros'">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            </template>
                            <template x-if="tab === 'servicios'">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            </template>
                            <template x-if="tab === 'redes'">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                            </template>
                        </div>
                        <div class="min-w-0">
                            <span class="block text-xs font-bold text-slate-900 truncate" x-text="sections[tab]?.title || 'Seleccionar'"></span>
                            <span class="block text-[11px] text-slate-500 truncate" x-text="sections[tab]?.subtitle || ''"></span>
                        </div>
                    </div>
                    <!-- Flecha indicadora -->
                    <div class="flex items-center gap-1.5 shrink-0">
                        <span class="text-[10px] uppercase font-bold text-orange-600 bg-orange-100 px-2 py-0.5 rounded-md hidden sm:inline-block">Desplegar</span>
                        <svg class="w-5 h-5 text-slate-400 group-hover:text-orange-600 transition-transform duration-200" :class="dropdownOpen ? 'rotate-180 text-orange-600' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </button>

                <!-- Menú Desplegable Flotante -->
                <div x-show="dropdownOpen" 
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 -translate-y-1 scale-98"
                     x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                     x-transition:leave-end="opacity-0 -translate-y-1 scale-98"
                     class="absolute right-0 left-0 mt-2 z-50 bg-white rounded-2xl border border-slate-200 shadow-xl overflow-hidden py-1 divide-y divide-slate-100"
                     style="display: none;">
                    
                    <!-- 1. Banners de Inicio -->
                    <button type="button" 
                            @click="selectTab('banners')"
                            :class="tab === 'banners' ? 'bg-orange-50/80 text-orange-950 font-bold' : 'text-slate-700 hover:bg-slate-50'"
                            class="w-full flex items-center justify-between gap-3 px-3.5 py-3 text-left transition-colors">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center shrink-0" :class="tab === 'banners' ? 'bg-orange-600 text-white shadow-xs' : 'bg-slate-100 text-slate-600'">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            <div class="min-w-0">
                                <span class="text-xs font-bold block text-slate-900">Banners de Inicio</span>
                                <span class="text-[11px] text-slate-500 block truncate">Slider horizontal de la página principal</span>
                            </div>
                        </div>
                        <span class="text-[10px] px-2 py-0.5 rounded-full font-bold shrink-0" :class="tab === 'banners' ? 'bg-orange-600 text-white' : 'bg-slate-100 text-slate-600'">
                            {{ count($banners) }} activos
                        </span>
                    </button>

                    <!-- 2. Contacto & WhatsApp -->
                    <button type="button" 
                            @click="selectTab('contacto')"
                            :class="tab === 'contacto' ? 'bg-orange-50/80 text-orange-950 font-bold' : 'text-slate-700 hover:bg-slate-50'"
                            class="w-full flex items-center justify-between gap-3 px-3.5 py-3 text-left transition-colors">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center shrink-0" :class="tab === 'contacto' ? 'bg-orange-600 text-white shadow-xs' : 'bg-slate-100 text-slate-600'">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div class="min-w-0">
                                <span class="text-xs font-bold block text-slate-900">Contacto & WhatsApp</span>
                                <span class="text-[11px] text-slate-500 block truncate">Teléfonos, WhatsApp de ventas y dirección</span>
                            </div>
                        </div>
                        <template x-if="tab === 'contacto'">
                            <span class="text-orange-600 font-bold text-xs">✓ Activo</span>
                        </template>
                    </button>

                    <!-- 3. Página Nosotros -->
                    <button type="button" 
                            @click="selectTab('nosotros')"
                            :class="tab === 'nosotros' ? 'bg-orange-50/80 text-orange-950 font-bold' : 'text-slate-700 hover:bg-slate-50'"
                            class="w-full flex items-center justify-between gap-3 px-3.5 py-3 text-left transition-colors">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center shrink-0" :class="tab === 'nosotros' ? 'bg-orange-600 text-white shadow-xs' : 'bg-slate-100 text-slate-600'">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            </div>
                            <div class="min-w-0">
                                <span class="text-xs font-bold block text-slate-900">Página Nosotros</span>
                                <span class="text-[11px] text-slate-500 block truncate">Historia, propósito, misión y métricas</span>
                            </div>
                        </div>
                        <template x-if="tab === 'nosotros'">
                            <span class="text-orange-600 font-bold text-xs">✓ Activo</span>
                        </template>
                    </button>

                    <!-- 4. Página Servicios -->
                    <button type="button" 
                            @click="selectTab('servicios')"
                            :class="tab === 'servicios' ? 'bg-orange-50/80 text-orange-950 font-bold' : 'text-slate-700 hover:bg-slate-50'"
                            class="w-full flex items-center justify-between gap-3 px-3.5 py-3 text-left transition-colors">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center shrink-0" :class="tab === 'servicios' ? 'bg-orange-600 text-white shadow-xs' : 'bg-slate-100 text-slate-600'">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            </div>
                            <div class="min-w-0">
                                <span class="text-xs font-bold block text-slate-900">Página Servicios</span>
                                <span class="text-[11px] text-slate-500 block truncate">Capacidades de confección y bordado</span>
                            </div>
                        </div>
                        <span class="text-[10px] px-2 py-0.5 rounded-full font-bold shrink-0" :class="tab === 'servicios' ? 'bg-orange-600 text-white' : 'bg-slate-100 text-slate-600'">
                            {{ count($servicios) }} activos
                        </span>
                    </button>

                    <!-- 5. Redes & Pie de Página -->
                    <button type="button" 
                            @click="selectTab('redes')"
                            :class="tab === 'redes' ? 'bg-orange-50/80 text-orange-950 font-bold' : 'text-slate-700 hover:bg-slate-50'"
                            class="w-full flex items-center justify-between gap-3 px-3.5 py-3 text-left transition-colors">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center shrink-0" :class="tab === 'redes' ? 'bg-orange-600 text-white shadow-xs' : 'bg-slate-100 text-slate-600'">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                            </div>
                            <div class="min-w-0">
                                <span class="text-xs font-bold block text-slate-900">Redes & Pie de Página</span>
                                <span class="text-[11px] text-slate-500 block truncate">Redes sociales, copy legal y footer</span>
                            </div>
                        </div>
                        <template x-if="tab === 'redes'">
                            <span class="text-orange-600 font-bold text-xs">✓ Activo</span>
                        </template>
                    </button>

                </div>
            </div>

        </div>
    </div>

    <!-- ======================================================== -->
    <!-- 1. PESTAÑA: BANNERS DE INICIO (HERO SLIDER HORIZONTAL) -->
    <!-- ======================================================== -->
    <div x-show="tab === 'banners'" class="space-y-6" style="display: none;">
        
        <!-- Tarjeta informativa -->
        <div class="bg-gradient-to-r from-orange-500/10 via-amber-500/10 to-transparent p-4 sm:p-5 rounded-2xl border border-orange-200 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 rounded-xl bg-orange-600 text-white flex items-center justify-center shrink-0 shadow-md shadow-orange-500/30 font-bold">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-slate-900 text-sm sm:text-base">Banner Horizontal Principal de la Web</h3>
                    <p class="text-xs text-slate-600 mt-0.5">El banner se muestra a todo el ancho debajo del menú en la página de inicio. Se recomienda resolución horizontal (ej. 1920x600 o 1600x550 px).</p>
                </div>
            </div>
            <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl text-xs font-bold text-orange-700 bg-orange-100 hover:bg-orange-200 transition-colors shrink-0">
                <span>Ver en la Web</span>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
        </div>

        <!-- LISTA DE BANNERS ACTIVOS (MODIFICABLES) -->
        <form method="POST" action="{{ route('admin.pages.update', 'banners') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <input type="hidden" name="action" value="save_all">

            <div class="space-y-4">
                @forelse($banners as $index => $banner)
                    <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs p-4 sm:p-6 space-y-4">
                        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                            <div class="flex items-center gap-2">
                                <span class="w-6 h-6 rounded-lg bg-orange-100 text-orange-700 font-bold text-xs flex items-center justify-center">
                                    #{{ $index + 1 }}
                                </span>
                                <h4 class="font-bold text-slate-900 text-sm">Slide / Banner {{ $index + 1 }}</h4>
                            </div>

                            <div class="flex items-center gap-3">
                                <label class="inline-flex items-center gap-2 cursor-pointer text-xs font-semibold text-slate-700">
                                    <input type="checkbox" 
                                           name="banners[{{ $index }}][is_active]" 
                                           value="1" 
                                           {{ !empty($banner['is_active']) ? 'checked' : '' }}
                                           class="w-4 h-4 text-orange-600 rounded border-slate-300 focus:ring-orange-500">
                                    <span>Activo en Web</span>
                                </label>

                                <button type="button" 
                                        onclick="if(confirm('¿Seguro que deseas eliminar el Banner #{{ $index + 1 }}?')) { document.getElementById('delete_banner_form_{{ $index }}').submit(); }"
                                        class="inline-flex items-center gap-1 px-2.5 py-1 rounded-xl text-rose-600 hover:text-white bg-rose-50 hover:bg-rose-600 border border-rose-200 transition-all font-bold text-xs cursor-pointer shadow-xs active:scale-95"
                                        title="Eliminar este banner">
                                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    <span>Borrar</span>
                                </button>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 items-start">
                            <!-- Vista previa y carga de imagen horizontal -->
                            <div class="lg:col-span-5 space-y-2">
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600">
                                    Imagen Horizontal del Banner
                                </label>
                                
                                <div class="relative w-full aspect-[16/7] rounded-xl overflow-hidden bg-slate-900 border border-slate-200 group">
                                    <img src="{{ asset($banner['image'] ?? 'images/eutex/banner_principal.png') }}" 
                                         alt="Banner {{ $index + 1 }}" 
                                         class="w-full h-full object-cover">
                                    
                                    <div class="absolute inset-0 bg-slate-950/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center p-3 text-center">
                                        <p class="text-[11px] text-white font-mono break-all">{{ $banner['image'] ?? '' }}</p>
                                    </div>
                                </div>

                                <input type="hidden" name="banners[{{ $index }}][image]" value="{{ $banner['image'] ?? '' }}">

                                <div class="space-y-1.5 pt-1">
                                    <label class="block text-[11px] font-bold text-slate-500">Reemplazar imagen (desde PC/Celular):</label>
                                    <input type="file" 
                                           name="banner_file_{{ $index }}" 
                                           accept="image/*" 
                                           class="w-full text-xs text-slate-600 file:mr-2 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100">
                                </div>
                            </div>

                            <!-- Campos de Texto del Banner -->
                            <div class="lg:col-span-7 space-y-3">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Título Principal:</label>
                                    <input type="text" 
                                           name="banners[{{ $index }}][title]" 
                                           value="{{ $banner['title'] ?? '' }}" 
                                           class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-300 text-xs sm:text-sm font-bold focus:ring-2 focus:ring-orange-500 focus:outline-none">
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Subtítulo o Frase Descriptiva:</label>
                                    <textarea name="banners[{{ $index }}][subtitle]" 
                                              rows="2" 
                                              class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-300 text-xs focus:ring-2 focus:ring-orange-500 focus:outline-none">{{ $banner['subtitle'] ?? '' }}</textarea>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Enlace / Destino (WhatsApp o URL):</label>
                                        <input type="text" 
                                               name="banners[{{ $index }}][link]" 
                                               value="{{ $banner['link'] ?? '' }}" 
                                               placeholder="https://wa.me/51920783202..."
                                               class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-300 text-xs font-mono focus:ring-2 focus:ring-orange-500 focus:outline-none">
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 mb-1">Texto del Botón:</label>
                                        <input type="text" 
                                               name="banners[{{ $index }}][link_text]" 
                                               value="{{ $banner['link_text'] ?? 'Cotizar al WhatsApp' }}" 
                                               class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-300 text-xs focus:ring-2 focus:ring-orange-500 focus:outline-none">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Etiqueta Superior (Badge):</label>
                                    <input type="text" 
                                           name="banners[{{ $index }}][badge]" 
                                           value="{{ $banner['badge'] ?? 'Fabricación Directa' }}" 
                                           class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-300 text-xs focus:ring-2 focus:ring-orange-500 focus:outline-none">
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-white p-8 rounded-2xl border border-slate-200 text-center text-slate-500">
                        No hay banners configurados. Agrega uno usando el formulario inferior.
                    </div>
                @endforelse
            </div>

            <!-- Campo oculto para índice a borrar -->
            <input type="hidden" name="banner_index" id="banner_delete_idx" value="-1">

            @if(count($banners) > 0)
                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-orange-600 hover:bg-orange-500 text-white font-bold text-xs sm:text-sm shadow-md shadow-orange-600/30 transition-all active:scale-95">
                        Guardar Todos los Cambios en Banners
                    </button>
                </div>
            @endif
        </form>

        <!-- FORMULARIOS INDEPENDIENTES PARA BORRAR CADA BANNER -->
        @foreach($banners as $index => $banner)
            <form id="delete_banner_form_{{ $index }}" 
                  method="POST" 
                  action="{{ route('admin.pages.update', 'banners') }}" 
                  class="hidden">
                @csrf
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="banner_index" value="{{ $index }}">
            </form>
        @endforeach

        <!-- FORMULARIO: AGREGAR NUEVO BANNER -->
        <div class="bg-white rounded-2xl border-2 border-dashed border-orange-300 p-5 sm:p-6 space-y-4">
            <div class="flex items-center gap-2">
                <div class="w-7 h-7 rounded-lg bg-orange-600 text-white flex items-center justify-center font-bold text-sm">+</div>
                <h4 class="font-bold text-slate-900 text-sm sm:text-base">Agregar Nuevo Slide al Banner</h4>
            </div>

            <form method="POST" action="{{ route('admin.pages.update', 'banners') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <input type="hidden" name="action" value="add">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Subir Imagen Horizontal (Recomendado 1920x600 px): <span class="text-rose-500">*</span></label>
                        <input type="file" 
                               name="new_banner_image" 
                               accept="image/*" 
                               class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100">
                        <p class="text-[11px] text-slate-400 mt-1">O escribe una ruta interna o URL abajo si ya la tienes:</p>
                        <input type="text" 
                               name="new_banner_url" 
                               placeholder="/images/eutex/banner_principal.png" 
                               class="w-full mt-1 px-3 py-2 rounded-xl bg-slate-50 border border-slate-300 text-xs font-mono focus:ring-2 focus:ring-orange-500 focus:outline-none">
                    </div>

                    <div class="space-y-3">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Título del Banner: <span class="text-rose-500">*</span></label>
                            <input type="text" 
                                   name="new_banner_title" 
                                   required 
                                   placeholder="Ej: Confección de Polos y Chalecos para Minería" 
                                   class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-300 text-xs sm:text-sm font-semibold focus:ring-2 focus:ring-orange-500 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Subtítulo:</label>
                            <input type="text" 
                                   name="new_banner_subtitle" 
                                   placeholder="Ej: Telas certificadas, cintas reflectivas 3M y bordados directos." 
                                   class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-300 text-xs focus:ring-2 focus:ring-orange-500 focus:outline-none">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Enlace / Destino:</label>
                        <input type="text" 
                               name="new_banner_link" 
                               placeholder="https://wa.me/51920783202..." 
                               class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-300 text-xs font-mono focus:ring-2 focus:ring-orange-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Texto del Botón:</label>
                        <input type="text" 
                               name="new_banner_link_text" 
                               value="Cotizar al WhatsApp" 
                               class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-300 text-xs focus:ring-2 focus:ring-orange-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Badge Superior:</label>
                        <input type="text" 
                               name="new_banner_badge" 
                               value="Gamarra • Lima - Perú" 
                               class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-300 text-xs focus:ring-2 focus:ring-orange-500 focus:outline-none">
                    </div>
                </div>

                <div class="pt-2 flex justify-end">
                    <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs sm:text-sm shadow-md transition-all active:scale-95">
                        <svg class="w-4 h-4 text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                        <span>Subir y Agregar al Slider</span>
                    </button>
                </div>
            </form>
        </div>

    </div>

    <!-- ======================================================== -->
    <!-- 2. PESTAÑA: CONTACTO & WHATSAPP CENTRAL -->
    <!-- ======================================================== -->
    <div x-show="tab === 'contacto'" class="space-y-6" style="display: none;">
        <form method="POST" action="{{ route('admin.pages.update', 'contacto') }}" class="space-y-6">
            @csrf

            <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs p-5 sm:p-6 space-y-5">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div>
                        <h3 class="font-bold text-slate-900 text-base">Datos de Contacto Central de EUTEX</h3>
                        <p class="text-xs text-slate-500 mt-0.5">Estos datos se reflejan automáticamente en el encabezado, pie de página, botones de WhatsApp y página de contacto.</p>
                    </div>
                    <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <!-- Teléfono visible -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                            Teléfono de Atención / Central <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" 
                               name="phone" 
                               value="{{ old('phone', $contact['phone']) }}" 
                               required 
                               class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm font-semibold focus:ring-2 focus:ring-orange-500 focus:outline-none">
                    </div>

                    <!-- WhatsApp (Solo dígitos) -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                            Número WhatsApp para Cotizaciones (Solo dígitos) <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-xs font-bold text-slate-400 font-mono">+51</span>
                            <input type="text" 
                                   name="whatsapp" 
                                   value="{{ old('whatsapp', $contact['whatsapp']) }}" 
                                   required 
                                   placeholder="920783202"
                                   class="w-full pl-11 pr-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm font-mono font-bold text-emerald-700 focus:ring-2 focus:ring-orange-500 focus:outline-none">
                        </div>
                    </div>
                </div>

                <!-- Mensaje predeterminado de WhatsApp -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                        Mensaje Predeterminado de WhatsApp al hacer clic en Cotizar <span class="text-rose-500">*</span>
                    </label>
                    <textarea name="whatsapp_text" 
                              rows="2" 
                              required 
                              class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-xs sm:text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none">{{ old('whatsapp_text', $contact['whatsapp_text']) }}</textarea>
                    <p class="text-[11px] text-slate-400 mt-1">Este mensaje se autocompleta cuando un cliente presiona "Cotizar al WhatsApp" en cualquier producto o banner.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <!-- Correo de Ventas -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                            Correo Electrónico de Ventas <span class="text-rose-500">*</span>
                        </label>
                        <input type="email" 
                               name="email" 
                               value="{{ old('email', $contact['email']) }}" 
                               required 
                               class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm font-semibold focus:ring-2 focus:ring-orange-500 focus:outline-none">
                    </div>

                    <!-- Horario de atención -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                            Horario de Atención en Taller / Tienda <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" 
                               name="schedule" 
                               value="{{ old('schedule', $contact['schedule']) }}" 
                               required 
                               placeholder="Lunes a Sábado: 8:00 AM - 7:00 PM"
                               class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none">
                    </div>
                </div>

                <!-- Dirección física -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                        Dirección Física (Gamarra, Lima) <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" 
                           name="address" 
                           value="{{ old('address', $contact['address']) }}" 
                           required 
                           class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none">
                </div>

                <!-- Google Maps URL -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                        Enlace de Ubicación en Google Maps:
                    </label>
                    <input type="text" 
                           name="maps_url" 
                           value="{{ old('maps_url', $contact['maps_url']) }}" 
                           class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-xs font-mono focus:ring-2 focus:ring-orange-500 focus:outline-none">
                </div>

                <div class="pt-3 border-t border-slate-100 flex justify-end">
                    <button type="submit" class="px-7 py-2.5 rounded-xl bg-orange-600 hover:bg-orange-500 text-white font-bold text-xs sm:text-sm shadow-md shadow-orange-600/30 transition-all active:scale-95">
                        Actualizar Contacto & WhatsApp
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- ======================================================== -->
    <!-- 3. PESTAÑA: PÁGINA "NOSOTROS" & HISTORIA -->
    <!-- ======================================================== -->
    <div x-show="tab === 'nosotros'" class="space-y-6" style="display: none;">
        <form method="POST" action="{{ route('admin.pages.update', 'nosotros') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs p-5 sm:p-6 space-y-5">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div>
                        <h3 class="font-bold text-slate-900 text-base">Contenido de la Página "Nosotros"</h3>
                        <p class="text-xs text-slate-500 mt-0.5">Modifica la historia de la empresa, misión, visión y métricas de trayectoria.</p>
                    </div>
                    <a href="{{ route('nosotros') }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 border border-slate-300">
                        <span>Ver Página</span>
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                </div>

                <!-- Título Principal -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                        Título de la Sección <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" 
                           name="title" 
                           value="{{ old('title', $nosotros['title']) }}" 
                           required 
                           class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm font-bold focus:ring-2 focus:ring-orange-500 focus:outline-none">
                </div>

                <!-- Historia / Trayectoria -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                        Historia & Quiénes Somos <span class="text-rose-500">*</span>
                    </label>
                    <textarea name="story" 
                              rows="4" 
                              required 
                              class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-xs sm:text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none">{{ old('story', $nosotros['story']) }}</textarea>
                </div>

                <!-- Misión y Visión -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                            Misión Empresarial <span class="text-rose-500">*</span>
                        </label>
                        <textarea name="mission" 
                                  rows="3" 
                                  required 
                                  class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-xs sm:text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none">{{ old('mission', $nosotros['mission']) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                            Visión Empresarial <span class="text-rose-500">*</span>
                        </label>
                        <textarea name="vision" 
                                  rows="3" 
                                  required 
                                  class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-xs sm:text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none">{{ old('vision', $nosotros['vision']) }}</textarea>
                    </div>
                </div>

                <!-- Estadísticas y Números -->
                <div class="pt-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                        Estadísticas de Impacto (Contadores Destacados)
                    </label>

                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                            <span class="text-[10px] uppercase font-bold text-slate-400">Años Experiencia</span>
                            <input type="text" 
                                   name="years" 
                                   value="{{ old('years', $nosotros['years']) }}" 
                                   required 
                                   class="w-full mt-1 px-2.5 py-1.5 rounded-lg bg-white border border-slate-300 text-sm font-black text-slate-900 focus:ring-2 focus:ring-orange-500 focus:outline-none">
                        </div>

                        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                            <span class="text-[10px] uppercase font-bold text-slate-400">Prendas / Pedidos</span>
                            <input type="text" 
                                   name="completed" 
                                   value="{{ old('completed', $nosotros['completed']) }}" 
                                   required 
                                   class="w-full mt-1 px-2.5 py-1.5 rounded-lg bg-white border border-slate-300 text-sm font-black text-slate-900 focus:ring-2 focus:ring-orange-500 focus:outline-none">
                        </div>

                        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                            <span class="text-[10px] uppercase font-bold text-slate-400">Empresas Clientes</span>
                            <input type="text" 
                                   name="clients" 
                                   value="{{ old('clients', $nosotros['clients']) }}" 
                                   required 
                                   class="w-full mt-1 px-2.5 py-1.5 rounded-lg bg-white border border-slate-300 text-sm font-black text-slate-900 focus:ring-2 focus:ring-orange-500 focus:outline-none">
                        </div>

                        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                            <span class="text-[10px] uppercase font-bold text-slate-400">Satisfacción</span>
                            <input type="text" 
                                   name="satisfaction" 
                                   value="{{ old('satisfaction', $nosotros['satisfaction']) }}" 
                                   required 
                                   class="w-full mt-1 px-2.5 py-1.5 rounded-lg bg-white border border-slate-300 text-sm font-black text-slate-900 focus:ring-2 focus:ring-orange-500 focus:outline-none">
                        </div>
                    </div>
                </div>

                <!-- Imagen Representativa -->
                <div class="pt-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                        Foto / Imagen Destacada de Nosotros:
                    </label>

                    <div class="flex flex-col sm:flex-row items-center gap-4">
                        <div class="w-32 h-24 rounded-xl overflow-hidden bg-slate-100 border border-slate-200 shrink-0">
                            <img src="{{ asset($nosotros['image']) }}" alt="Nosotros" class="w-full h-full object-cover">
                        </div>

                        <div class="flex-1 w-full space-y-2">
                            <input type="file" 
                                   name="image_file" 
                                   accept="image/*" 
                                   class="w-full text-xs text-slate-600 file:mr-3 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100">
                            <input type="text" 
                                   name="image_url" 
                                   value="{{ old('image_url', $nosotros['image']) }}" 
                                   class="w-full px-3 py-1.5 rounded-xl bg-slate-50 border border-slate-300 text-xs font-mono">
                        </div>
                    </div>
                </div>

                <div class="pt-3 border-t border-slate-100 flex justify-end">
                    <button type="submit" class="px-7 py-2.5 rounded-xl bg-orange-600 hover:bg-orange-500 text-white font-bold text-xs sm:text-sm shadow-md shadow-orange-600/30 transition-all active:scale-95">
                        Actualizar Página Nosotros
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- ======================================================== -->
    <!-- 4. PESTAÑA: PÁGINA "SERVICIOS" -->
    <!-- ======================================================== -->
    <div x-show="tab === 'servicios'" class="space-y-6" style="display: none;">
        <form method="POST" action="{{ route('admin.pages.update', 'servicios') }}" class="space-y-6">
            @csrf

            <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs p-5 sm:p-6 space-y-5">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div>
                        <h3 class="font-bold text-slate-900 text-base">Servicios y Capacidades Industriales</h3>
                        <p class="text-xs text-slate-500 mt-0.5">Personaliza los 4 pilares de servicios que se muestran en /servicios.</p>
                    </div>
                    <a href="{{ route('servicios') }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 border border-slate-300">
                        <span>Ver Página</span>
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($servicios as $idx => $s)
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-black uppercase text-orange-600">Servicio #{{ $idx + 1 }}</span>
                                <input type="text" 
                                       name="servicios[{{ $idx }}][badge]" 
                                       value="{{ $s['badge'] ?? '' }}" 
                                       placeholder="Badge (Ej: Precios de Taller)" 
                                       class="px-2.5 py-1 rounded-lg bg-white border border-slate-300 text-[11px] font-bold text-slate-700 w-36">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Título del Servicio:</label>
                                <input type="text" 
                                       name="servicios[{{ $idx }}][title]" 
                                       value="{{ $s['title'] ?? '' }}" 
                                       required 
                                       class="w-full px-3 py-2 rounded-xl bg-white border border-slate-300 text-xs sm:text-sm font-bold focus:ring-2 focus:ring-orange-500 focus:outline-none">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Descripción:</label>
                                <textarea name="servicios[{{ $idx }}][description]" 
                                          rows="3" 
                                          class="w-full px-3 py-2 rounded-xl bg-white border border-slate-300 text-xs focus:ring-2 focus:ring-orange-500 focus:outline-none">{{ $s['description'] ?? '' }}</textarea>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Puntos Clave / Beneficios (Una por línea):</label>
                                <textarea name="servicios[{{ $idx }}][features_text]" 
                                          rows="3" 
                                          class="w-full px-3 py-2 rounded-xl bg-white border border-slate-300 text-xs font-mono focus:ring-2 focus:ring-orange-500 focus:outline-none">{{ implode("\n", $s['features'] ?? []) }}</textarea>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="pt-3 border-t border-slate-100 flex justify-end">
                    <button type="submit" class="px-7 py-2.5 rounded-xl bg-orange-600 hover:bg-orange-500 text-white font-bold text-xs sm:text-sm shadow-md shadow-orange-600/30 transition-all active:scale-95">
                        Actualizar Servicios
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- ======================================================== -->
    <!-- 5. PESTAÑA: REDES SOCIALES & PIE DE PÁGINA -->
    <!-- ======================================================== -->
    <div x-show="tab === 'redes'" class="space-y-6" style="display: none;">
        <form method="POST" action="{{ route('admin.pages.update', 'redes') }}" class="space-y-6">
            @csrf

            <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs p-5 sm:p-6 space-y-5">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div>
                        <h3 class="font-bold text-slate-900 text-base">Redes Sociales & Descripción de Footer</h3>
                        <p class="text-xs text-slate-500 mt-0.5">Actualiza los enlaces de perfiles corporativos y la biografía del pie de página.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Facebook URL:</label>
                        <input type="text" 
                               name="facebook" 
                               value="{{ old('facebook', $redes['facebook']) }}" 
                               placeholder="https://facebook.com/..." 
                               class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-xs font-mono focus:ring-2 focus:ring-orange-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Instagram URL:</label>
                        <input type="text" 
                               name="instagram" 
                               value="{{ old('instagram', $redes['instagram']) }}" 
                               placeholder="https://instagram.com/..." 
                               class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-xs font-mono focus:ring-2 focus:ring-orange-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">TikTok URL:</label>
                        <input type="text" 
                               name="tiktok" 
                               value="{{ old('tiktok', $redes['tiktok']) }}" 
                               placeholder="https://tiktok.com/@..." 
                               class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-xs font-mono focus:ring-2 focus:ring-orange-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">LinkedIn URL:</label>
                        <input type="text" 
                               name="linkedin" 
                               value="{{ old('linkedin', $redes['linkedin']) }}" 
                               placeholder="https://linkedin.com/company/..." 
                               class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-xs font-mono focus:ring-2 focus:ring-orange-500 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                        Biografía Corta / Resumen en el Pie de Página (Footer): <span class="text-rose-500">*</span>
                    </label>
                    <textarea name="footer_bio" 
                              rows="3" 
                              required 
                              class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-xs sm:text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none">{{ old('footer_bio', $redes['footer_bio']) }}</textarea>
                </div>

                <div class="pt-3 border-t border-slate-100 flex justify-end">
                    <button type="submit" class="px-7 py-2.5 rounded-xl bg-orange-600 hover:bg-orange-500 text-white font-bold text-xs sm:text-sm shadow-md shadow-orange-600/30 transition-all active:scale-95">
                        Actualizar Redes & Footer
                    </button>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
