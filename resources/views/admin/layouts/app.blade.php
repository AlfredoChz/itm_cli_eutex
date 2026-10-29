<!DOCTYPE html>
<html lang="es" class="h-full bg-slate-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel de Administración') | EUTEX Uniformes Industriales</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/eutex/tarjeta_contacto.png') }}">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="h-full antialiased font-sans bg-slate-100 text-slate-800" x-data="{ sidebarOpen: false }">

    <div class="min-h-full flex">
        <!-- SIDEBAR PARA MÓVIL (OVERLAY) -->
        <div x-show="sidebarOpen" 
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="relative z-50 lg:hidden" 
             role="dialog" 
             aria-modal="true"
             style="display: none;">
            
            <div class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm" @click="sidebarOpen = false"></div>

            <div class="fixed inset-0 flex">
                <div class="relative mr-16 flex w-full max-w-xs flex-1">
                    <div class="flex flex-col flex-1 bg-slate-950 border-r border-slate-800 pt-5 pb-4">
                        <!-- Logo & Close -->
                        <div class="flex items-center justify-between px-6 pb-4 border-b border-slate-800">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-lg bg-orange-600 flex items-center justify-center text-white font-black text-lg shadow-lg shadow-orange-500/30">E</div>
                                <div>
                                    <span class="text-lg font-black tracking-wider text-white">EUTEX</span>
                                    <span class="block text-[10px] uppercase font-bold tracking-widest text-orange-400">Panel de Control</span>
                                </div>
                            </div>
                            <button type="button" @click="sidebarOpen = false" class="text-slate-400 hover:text-white p-2">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        
                        <!-- Nav Mobile -->
                        <nav class="mt-4 flex-1 px-4 space-y-1">
                            @include('admin.partials.navigation')
                        </nav>
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
                    <nav class="space-y-1 flex-1">
                        @include('admin.partials.navigation')
                    </nav>

                    <!-- User Footer in Sidebar -->
                    <div class="pt-4 mt-6 border-t border-slate-800/80">
                        <div class="flex items-center gap-3 px-3 py-2 rounded-xl bg-slate-900/80 border border-slate-800">
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
            <!-- TOP BAR -->
            <header class="bg-white border-b border-slate-200 sticky top-0 z-30 shadow-xs">
                <div class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center gap-3">
                        <button type="button" @click="sidebarOpen = true" class="lg:hidden text-slate-600 hover:text-slate-900 p-2 rounded-lg hover:bg-slate-100">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <div>
                            <h1 class="text-lg font-bold text-slate-900 leading-tight">@yield('header_title', 'Panel de Control')</h1>
                            <p class="text-xs text-slate-500 hidden sm:block">@yield('header_subtitle', 'Gestión integral de productos, cotizaciones y catálogo EUTEX')</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <!-- Enlace al sitio público -->
                        <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 border border-slate-300 transition-colors">
                            <svg class="w-4 h-4 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                            <span class="hidden sm:inline">Ver Sitio Web</span>
                        </a>

                        <!-- Botón de acción rápida superior -->
                        @yield('header_action')
                    </div>
                </div>
            </header>

            <!-- CONTENEDOR DE CONTENIDO -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
                <!-- NOTIFICACIONES FLASH -->
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-start gap-3 shadow-xs" x-data="{ show: true }" x-show="show">
                        <svg class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="flex-1 text-sm font-medium">{{ session('success') }}</div>
                        <button type="button" @click="show = false" class="text-emerald-500 hover:text-emerald-700">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 flex items-start gap-3 shadow-xs" x-data="{ show: true }" x-show="show">
                        <svg class="w-5 h-5 text-rose-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="flex-1 text-sm font-medium">{{ session('error') }}</div>
                        <button type="button" @click="show = false" class="text-rose-500 hover:text-rose-700">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>
                @endif

                @if(session('info'))
                    <div class="mb-6 p-4 rounded-xl bg-blue-50 border border-blue-200 text-blue-800 flex items-start gap-3 shadow-xs" x-data="{ show: true }" x-show="show">
                        <svg class="w-5 h-5 text-blue-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="flex-1 text-sm font-medium">{{ session('info') }}</div>
                        <button type="button" @click="show = false" class="text-blue-500 hover:text-blue-700">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
