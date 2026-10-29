@php
    $currentRoute = request()->route() ? request()->route()->getName() : '';
    $pendingQuotes = \App\Models\QuoteRequest::where('status', 'pending')->count();
    $unreadMessages = \App\Models\ContactMessage::where('is_read', false)->count();
    $totalProducts = \App\Models\Product::count();
    $totalCategories = \App\Models\Category::count();
@endphp

<div class="space-y-6">

    <!-- ========================================== -->
    <!-- GRUPO 1: PRINCIPAL -->
    <!-- ========================================== -->
    <div>
        <div x-show="!sidebarCollapsed" x-transition.opacity.duration.200ms class="px-3 mb-2 flex items-center justify-between">
            <span class="text-[10px] font-black uppercase tracking-widest text-slate-500">Principal</span>
        </div>

        <div class="space-y-1">
            <!-- DASHBOARD -->
            <a href="{{ route('admin.dashboard') }}" 
               :class="sidebarCollapsed ? 'justify-center px-2' : 'px-3 justify-between'"
               class="group relative flex items-center gap-3 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-orange-600 to-amber-600 text-white shadow-md shadow-orange-600/30 font-bold' : 'text-slate-300 hover:text-white hover:bg-slate-800/80 active:scale-98' }}"
               title="Panel Principal / Métricas">
                <div class="flex items-center gap-3 min-w-0">
                    <svg class="w-5 h-5 shrink-0 transition-transform duration-200 group-hover:scale-110 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-slate-400 group-hover:text-orange-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span x-show="!sidebarCollapsed" x-transition.opacity.duration.200ms class="truncate">Dashboard</span>
                </div>
            </a>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- GRUPO 2: CATÁLOGO DE PRODUCTOS -->
    <!-- ========================================== -->
    <div>
        <div x-show="!sidebarCollapsed" x-transition.opacity.duration.200ms class="px-3 mb-2 flex items-center justify-between">
            <span class="text-[10px] font-black uppercase tracking-widest text-slate-500">Catálogo & Prendas</span>
        </div>

        <div class="space-y-1">
            <!-- PRODUCTOS -->
            <a href="{{ route('admin.products.index') }}" 
               :class="sidebarCollapsed ? 'justify-center px-2' : 'px-3 justify-between'"
               class="group relative flex items-center gap-3 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-200 {{ request()->routeIs('admin.products.*') ? 'bg-gradient-to-r from-orange-600 to-amber-600 text-white shadow-md shadow-orange-600/30 font-bold' : 'text-slate-300 hover:text-white hover:bg-slate-800/80 active:scale-98' }}"
               title="Catálogo de Productos ({{ $totalProducts }})">
                <div class="flex items-center gap-3 min-w-0">
                    <svg class="w-5 h-5 shrink-0 transition-transform duration-200 group-hover:scale-110 {{ request()->routeIs('admin.products.*') ? 'text-white' : 'text-slate-400 group-hover:text-orange-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <span x-show="!sidebarCollapsed" x-transition.opacity.duration.200ms class="truncate">Productos</span>
                </div>
                
                <span x-show="!sidebarCollapsed" x-transition.opacity.duration.200ms class="text-[11px] px-2 py-0.5 rounded-md font-bold shrink-0 {{ request()->routeIs('admin.products.*') ? 'bg-white/20 text-white' : 'bg-slate-800 text-slate-400 group-hover:text-slate-200' }}">
                    {{ $totalProducts }}
                </span>

                <span x-show="sidebarCollapsed" class="absolute -top-1 -right-1 w-2.5 h-2.5 rounded-full bg-slate-700 ring-2 ring-slate-950"></span>
            </a>

            <!-- CATEGORÍAS -->
            <a href="{{ route('admin.categories.index') }}" 
               :class="sidebarCollapsed ? 'justify-center px-2' : 'px-3 justify-between'"
               class="group relative flex items-center gap-3 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-200 {{ request()->routeIs('admin.categories.*') ? 'bg-gradient-to-r from-orange-600 to-amber-600 text-white shadow-md shadow-orange-600/30 font-bold' : 'text-slate-300 hover:text-white hover:bg-slate-800/80 active:scale-98' }}"
               title="Líneas y Categorías ({{ $totalCategories }})">
                <div class="flex items-center gap-3 min-w-0">
                    <svg class="w-5 h-5 shrink-0 transition-transform duration-200 group-hover:scale-110 {{ request()->routeIs('admin.categories.*') ? 'text-white' : 'text-slate-400 group-hover:text-orange-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                    <span x-show="!sidebarCollapsed" x-transition.opacity.duration.200ms class="truncate">Categorías</span>
                </div>

                <span x-show="!sidebarCollapsed" x-transition.opacity.duration.200ms class="text-[11px] px-2 py-0.5 rounded-md font-bold shrink-0 {{ request()->routeIs('admin.categories.*') ? 'bg-white/20 text-white' : 'bg-slate-800 text-slate-400' }}">
                    {{ $totalCategories }}
                </span>
            </a>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- GRUPO 3: VENTAS Y MENSAJES -->
    <!-- ========================================== -->
    <div>
        <div x-show="!sidebarCollapsed" x-transition.opacity.duration.200ms class="px-3 mb-2 flex items-center justify-between">
            <span class="text-[10px] font-black uppercase tracking-widest text-slate-500">Ventas & Leads</span>
        </div>

        <div class="space-y-1">
            <!-- COTIZACIONES -->
            <a href="{{ route('admin.quotes.index') }}" 
               :class="sidebarCollapsed ? 'justify-center px-2' : 'px-3 justify-between'"
               class="group relative flex items-center gap-3 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-200 {{ request()->routeIs('admin.quotes.*') ? 'bg-gradient-to-r from-orange-600 to-amber-600 text-white shadow-md shadow-orange-600/30 font-bold' : 'text-slate-300 hover:text-white hover:bg-slate-800/80 active:scale-98' }}"
               title="Solicitudes de Cotización ({{ $pendingQuotes }} pendientes)">
                <div class="flex items-center gap-3 min-w-0">
                    <svg class="w-5 h-5 shrink-0 transition-transform duration-200 group-hover:scale-110 {{ request()->routeIs('admin.quotes.*') ? 'text-white' : 'text-slate-400 group-hover:text-orange-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span x-show="!sidebarCollapsed" x-transition.opacity.duration.200ms class="truncate">Cotizaciones</span>
                </div>
                @if($pendingQuotes > 0)
                    <span x-show="!sidebarCollapsed" x-transition.opacity.duration.200ms class="text-[11px] px-2 py-0.5 rounded-full font-black shrink-0 {{ request()->routeIs('admin.quotes.*') ? 'bg-white text-orange-600' : 'bg-orange-500 text-white animate-pulse' }}">
                        {{ $pendingQuotes }}
                    </span>

                    <!-- Badge animado cuando colapsado -->
                    <span x-show="sidebarCollapsed" class="absolute -top-1 -right-1 w-4 h-4 rounded-full bg-orange-500 text-white text-[9px] font-black flex items-center justify-center animate-pulse ring-2 ring-slate-950">
                        {{ $pendingQuotes }}
                    </span>
                @endif
            </a>

            <!-- MENSAJES DE CONTACTO -->
            <a href="{{ route('admin.messages.index') }}" 
               :class="sidebarCollapsed ? 'justify-center px-2' : 'px-3 justify-between'"
               class="group relative flex items-center gap-3 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-200 {{ request()->routeIs('admin.messages.*') ? 'bg-gradient-to-r from-orange-600 to-amber-600 text-white shadow-md shadow-orange-600/30 font-bold' : 'text-slate-300 hover:text-white hover:bg-slate-800/80 active:scale-98' }}"
               title="Mensajes de Contacto ({{ $unreadMessages }} no leídos)">
                <div class="flex items-center gap-3 min-w-0">
                    <svg class="w-5 h-5 shrink-0 transition-transform duration-200 group-hover:scale-110 {{ request()->routeIs('admin.messages.*') ? 'text-white' : 'text-slate-400 group-hover:text-orange-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span x-show="!sidebarCollapsed" x-transition.opacity.duration.200ms class="truncate">Mensajes</span>
                </div>
                @if($unreadMessages > 0)
                    <span x-show="!sidebarCollapsed" x-transition.opacity.duration.200ms class="text-[11px] px-2 py-0.5 rounded-full font-bold shrink-0 {{ request()->routeIs('admin.messages.*') ? 'bg-white text-orange-600' : 'bg-amber-400 text-slate-950 font-bold' }}">
                        {{ $unreadMessages }}
                    </span>

                    <span x-show="sidebarCollapsed" class="absolute -top-1 -right-1 w-2.5 h-2.5 rounded-full bg-amber-400 ring-2 ring-slate-950"></span>
                @endif
            </a>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- GRUPO 4: CONTENIDO & PÁGINAS WEB (CMS) -->
    <!-- ========================================== -->
    <div>
        <div x-show="!sidebarCollapsed" x-transition.opacity.duration.200ms class="px-3 mb-2 flex items-center justify-between">
            <span class="text-[10px] font-black uppercase tracking-widest text-slate-500">Sitio Web & CMS</span>
        </div>

        <div class="space-y-1">
            <!-- PÁGINAS Y CONTENIDOS -->
            <a href="{{ route('admin.pages.index') }}" 
               :class="sidebarCollapsed ? 'justify-center px-2' : 'px-3 justify-between'"
               class="group relative flex items-center gap-3 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-200 {{ request()->routeIs('admin.pages.*') ? 'bg-gradient-to-r from-orange-600 to-amber-600 text-white shadow-md shadow-orange-600/30 font-bold' : 'text-slate-300 hover:text-white hover:bg-slate-800/80 active:scale-98' }}"
               title="Gestor de Páginas y Banners">
                <div class="flex items-center gap-3 min-w-0">
                    <svg class="w-5 h-5 shrink-0 transition-transform duration-200 group-hover:scale-110 {{ request()->routeIs('admin.pages.*') ? 'text-white' : 'text-slate-400 group-hover:text-orange-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                    </svg>
                    <span x-show="!sidebarCollapsed" x-transition.opacity.duration.200ms class="truncate">Páginas & Banners</span>
                </div>
                
                <span x-show="!sidebarCollapsed" x-transition.opacity.duration.200ms class="text-[9px] uppercase px-1.5 py-0.5 rounded bg-emerald-500/20 text-emerald-400 font-black border border-emerald-500/30">
                    CMS
                </span>
            </a>
        </div>
    </div>

</div>
