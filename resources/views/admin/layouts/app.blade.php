<!DOCTYPE html>
<html lang="es" class="h-full bg-slate-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield('title', 'Panel de Administración') | EUTEX Uniformes Industriales</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/eutex/tarjeta_contacto.png') }}">
    <meta name="theme-color" content="#0B1B3D">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="h-full antialiased font-sans bg-slate-100 text-slate-800 select-none sm:select-auto" 
      x-data="{ 
          sidebarOpen: false,
          quickActionOpen: false
      }">

    @php
        $pendingQuotesCount = \App\Models\QuoteRequest::where('status', 'pending')->count();
        $unreadMsgsCount = \App\Models\ContactMessage::where('is_read', false)->count();
        $totalProductsCount = \App\Models\Product::count();
    @endphp

    <div class="min-h-full flex">
        <!-- SIDEBAR PARA MÓVIL (DRAWER DESLIZABLE) -->
        <div x-show="sidebarOpen" 
             x-transition:enter="transition-opacity ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="relative z-50 lg:hidden" 
             role="dialog" 
             aria-modal="true"
             style="display: none;">
            
            <div class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm" @click="sidebarOpen = false"></div>

            <div class="fixed inset-0 flex">
                <div x-show="sidebarOpen"
                     x-transition:enter="transition ease-out duration-300 transform"
                     x-transition:enter-start="-translate-x-full"
                     x-transition:enter-end="translate-x-0"
                     x-transition:leave="transition ease-in duration-200 transform"
                     x-transition:leave-start="translate-x-0"
                     x-transition:leave-end="-translate-x-full"
                     class="relative mr-16 flex w-full max-w-xs flex-1">
                    
                    <div class="flex flex-col flex-1 bg-slate-950 border-r border-slate-800 pt-5 pb-4">
                        <!-- Header Drawer -->
                        <div class="flex items-center justify-between px-6 pb-4 border-b border-slate-800">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-orange-600 flex items-center justify-center text-white font-black text-xl shadow-lg shadow-orange-500/30">E</div>
                                <div>
                                    <span class="text-xl font-black tracking-wider text-white">EUTEX</span>
                                    <span class="block text-[10px] uppercase font-bold tracking-widest text-orange-400">Control Móvil</span>
                                </div>
                            </div>
                            <button type="button" @click="sidebarOpen = false" class="text-slate-400 hover:text-white p-2 rounded-lg hover:bg-slate-800">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        
                        <!-- Perfil en Drawer -->
                        <div class="px-6 py-4 bg-slate-900/60 border-b border-slate-800/80 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-orange-600/20 text-orange-400 font-bold border border-orange-500/30 flex items-center justify-center text-base">
                                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-bold text-white truncate">{{ auth()->user()->name ?? 'Administrador' }}</p>
                                <p class="text-[11px] text-slate-400 truncate">{{ auth()->user()->email ?? 'admin@eutex.com' }}</p>
                            </div>
                        </div>

                        <!-- Nav Mobile -->
                        <nav class="mt-4 flex-1 px-4 space-y-1.5 overflow-y-auto">
                            @include('admin.partials.navigation')
                        </nav>

                        <!-- Footer Drawer -->
                        <div class="px-4 pt-4 border-t border-slate-800 space-y-2">
                            <a href="{{ route('home') }}" target="_blank" class="w-full flex items-center justify-center gap-2 px-3 py-2.5 rounded-xl text-xs font-bold text-slate-300 bg-slate-900 hover:bg-slate-800 border border-slate-800 transition-colors">
                                <svg class="w-4 h-4 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                                <span>Ver Sitio Web Público</span>
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2.5 rounded-xl text-xs font-bold text-rose-400 hover:text-white hover:bg-rose-500/20 transition-colors">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Cerrar Sesión
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SIDEBAR DE ESCRITORIO -->
        <div class="hidden lg:flex lg:flex-shrink-0">
            <div class="flex flex-col w-64 bg-slate-950 border-r border-slate-800/80">
                <!-- Brand / Logo -->
                <div class="flex items-center gap-3 px-6 h-18 border-b border-slate-800/80 bg-slate-950/60">
                    <div class="w-9 h-9 rounded-xl bg-orange-600 flex items-center justify-center text-white font-black text-xl shadow-lg shadow-orange-500/25">E</div>
                    <div>
                        <div class="flex items-center gap-1.5">
                            <span class="text-xl font-black tracking-wider text-white">EUTEX</span>
                            <span class="w-2 h-2 rounded-full bg-orange-500 animate-pulse"></span>
                        </div>
                        <span class="block text-[10px] uppercase font-bold tracking-widest text-slate-400">Admin Control</span>
                    </div>
                </div>

                <!-- Nav Links -->
                <div class="flex flex-col flex-1 overflow-y-auto pt-5 pb-4 px-4">
                    <nav class="space-y-1.5 flex-1">
                        @include('admin.partials.navigation')
                    </nav>

                    <!-- User Footer in Sidebar -->
                    <div class="pt-4 mt-6 border-t border-slate-800/80">
                        <div class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-slate-900/80 border border-slate-800">
                            <div class="w-9 h-9 rounded-full bg-slate-800 flex items-center justify-center text-orange-400 font-bold border border-slate-700">
                                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-bold text-white truncate">{{ auth()->user()->name ?? 'Administrador' }}</p>
                                <p class="text-[11px] text-slate-400 truncate">{{ auth()->user()->email ?? 'admin@eutex.com' }}</p>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('logout') }}" class="mt-2">
                            @csrf
                            <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-lg text-xs font-bold text-rose-400 hover:text-white hover:bg-rose-500/20 transition-colors">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Cerrar Sesión
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- CONTENIDO PRINCIPAL -->
        <div class="flex flex-col flex-1 min-w-0 overflow-hidden bg-slate-100">
            <!-- TOP BAR (HEADER STICKY) -->
            <header class="bg-white/95 backdrop-blur-md border-b border-slate-200 sticky top-0 z-30 shadow-xs">
                <div class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">
                    <!-- Izquierda: Botón Menú Móvil + Título -->
                    <div class="flex items-center gap-3 min-w-0">
                        <button type="button" 
                                @click="sidebarOpen = true" 
                                class="lg:hidden text-slate-600 hover:text-slate-900 p-2 rounded-xl bg-slate-100 hover:bg-slate-200 transition-colors shrink-0"
                                aria-label="Abrir Menú">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        
                        <div class="truncate">
                            <h1 class="text-base sm:text-lg font-bold text-slate-900 leading-tight truncate">@yield('header_title', 'Panel de Control')</h1>
                            <p class="text-xs text-slate-500 hidden sm:block truncate">@yield('header_subtitle', 'Gestión integral de productos, cotizaciones y catálogo EUTEX')</p>
                        </div>
                    </div>

                    <!-- Derecha: Acciones Rápidas -->
                    <div class="flex items-center gap-2 sm:gap-3 shrink-0">
                        <!-- Enlace al sitio público -->
                        <a href="{{ route('home') }}" target="_blank" class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 border border-slate-300 transition-colors">
                            <svg class="w-3.5 h-3.5 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                            <span>Ver Web</span>
                        </a>

                        <!-- Alertas de pendientes (en móvil muestra badge directo a cotizaciones) -->
                        @if($pendingQuotesCount > 0)
                            <a href="{{ route('admin.quotes.index', ['status' => 'pending']) }}" 
                               class="relative p-2 rounded-xl bg-amber-50 text-amber-700 hover:bg-amber-100 transition-colors"
                               title="{{ $pendingQuotesCount }} cotizaciones pendientes">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                                <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-orange-600 text-white text-[10px] font-black flex items-center justify-center animate-pulse shadow-xs">
                                    {{ $pendingQuotesCount }}
                                </span>
                            </a>
                        @endif

                        <!-- Botón de acción rápida superior -->
                        @yield('header_action')
                    </div>
                </div>
            </header>

            <!-- CONTENEDOR DE CONTENIDO (CON ESPACIO INFERIOR PARA BARRA MÓVIL) -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8 pb-24 sm:pb-8">
                <!-- NOTIFICACIONES FLASH -->
                @if(session('success'))
                    <div class="mb-4 sm:mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-start gap-3 shadow-xs" x-data="{ show: true }" x-show="show">
                        <svg class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="flex-1 text-xs sm:text-sm font-semibold">{{ session('success') }}</div>
                        <button type="button" @click="show = false" class="text-emerald-500 hover:text-emerald-700 p-1">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 sm:mb-6 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 flex items-start gap-3 shadow-xs" x-data="{ show: true }" x-show="show">
                        <svg class="w-5 h-5 text-rose-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="flex-1 text-xs sm:text-sm font-semibold">{{ session('error') }}</div>
                        <button type="button" @click="show = false" class="text-rose-500 hover:text-rose-700 p-1">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>
                @endif

                @if(session('info'))
                    <div class="mb-4 sm:mb-6 p-4 rounded-2xl bg-blue-50 border border-blue-200 text-blue-800 flex items-start gap-3 shadow-xs" x-data="{ show: true }" x-show="show">
                        <svg class="w-5 h-5 text-blue-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="flex-1 text-xs sm:text-sm font-semibold">{{ session('info') }}</div>
                        <button type="button" @click="show = false" class="text-blue-500 hover:text-blue-700 p-1">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- BARRA DE NAVEGACIÓN INFERIOR PARA MÓVILES (ESTILO APP MÓVIL NATIVA) -->
    <!-- ========================================================================= -->
    <nav class="lg:hidden fixed bottom-0 inset-x-0 z-40 bg-white/95 backdrop-blur-md border-t border-slate-200/90 shadow-2xl px-2 py-1.5 flex items-center justify-around safe-bottom">
        <!-- 1. Inicio -->
        <a href="{{ route('admin.dashboard') }}" 
           class="flex flex-col items-center justify-center flex-1 py-1 px-1 rounded-xl transition-colors {{ request()->routeIs('admin.dashboard') ? 'text-orange-600' : 'text-slate-500 hover:text-slate-900' }}">
            <svg class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? 'stroke-orange-600 stroke-[2.5]' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span class="text-[10px] font-bold mt-0.5 tracking-tight">Inicio</span>
        </a>

        <!-- 2. Productos -->
        <a href="{{ route('admin.products.index') }}" 
           class="flex flex-col items-center justify-center flex-1 py-1 px-1 rounded-xl transition-colors {{ request()->routeIs('admin.products.*') ? 'text-orange-600' : 'text-slate-500 hover:text-slate-900' }}">
            <svg class="w-5 h-5 {{ request()->routeIs('admin.products.*') ? 'stroke-orange-600 stroke-[2.5]' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
            <span class="text-[10px] font-bold mt-0.5 tracking-tight">Productos</span>
        </a>

        <!-- 3. BOTÓN CENTRAL CREAR (+) -->
        <div class="relative -top-3 flex flex-col items-center">
            <a href="{{ route('admin.products.create') }}" 
               class="w-12 h-12 rounded-full bg-gradient-to-tr from-orange-600 to-amber-500 text-white flex items-center justify-center shadow-lg shadow-orange-500/40 hover:scale-105 active:scale-95 transition-all focus:outline-none"
               title="Crear Nuevo Producto">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                </svg>
            </a>
            <span class="text-[9px] font-black uppercase text-orange-600 mt-0.5">Crear</span>
        </div>

        <!-- 4. Cotizaciones -->
        <a href="{{ route('admin.quotes.index') }}" 
           class="flex flex-col items-center justify-center flex-1 py-1 px-1 rounded-xl relative transition-colors {{ request()->routeIs('admin.quotes.*') ? 'text-orange-600' : 'text-slate-500 hover:text-slate-900' }}">
            <div class="relative">
                <svg class="w-5 h-5 {{ request()->routeIs('admin.quotes.*') ? 'stroke-orange-600 stroke-[2.5]' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                @if($pendingQuotesCount > 0)
                    <span class="absolute -top-1 -right-2 w-4 h-4 rounded-full bg-orange-600 text-white text-[9px] font-black flex items-center justify-center animate-pulse">
                        {{ $pendingQuotesCount }}
                    </span>
                @endif
            </div>
            <span class="text-[10px] font-bold mt-0.5 tracking-tight">Cotizar</span>
        </a>

        <!-- 5. Más / Menú -->
        <button type="button" 
                @click="sidebarOpen = true" 
                class="flex flex-col items-center justify-center flex-1 py-1 px-1 rounded-xl text-slate-500 hover:text-slate-900 transition-colors">
            <div class="relative">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                @if($unreadMsgsCount > 0)
                    <span class="absolute -top-1 -right-1 w-2.5 h-2.5 rounded-full bg-orange-600 ring-2 ring-white"></span>
                @endif
            </div>
            <span class="text-[10px] font-bold mt-0.5 tracking-tight">Más</span>
        </button>
    </nav>

    @stack('scripts')
</body>
</html>
