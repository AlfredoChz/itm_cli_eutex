<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EUTEX | Uniformes Industriales, Ropa de Trabajo y EPP en Gamarra Lima')</title>
    <meta name="description" content="@yield('meta_description', 'EUTEX - Fabricantes de uniformes industriales, polos de alta visibilidad, chalecos reflectivos, jeans y mamelucos de trabajo. Confección en Gamarra, Lima con envíos a todo el Perú.')">
    <meta name="keywords" content="uniformes industriales, ropa de trabajo, chalecos de seguridad, polos industriales, jeans industriales, gamarra lima, eutex, epp peru">
    <meta name="author" content="EUTEX Uniformes Industriales">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'EUTEX | Uniformes Industriales en Gamarra Lima')">
    <meta property="og:description" content="@yield('meta_description', 'Confección y suministro de ropa de trabajo, uniformes industriales y equipos de seguridad.')">
    <meta property="og:image" content="{{ asset('images/eutex/banner_principal.png') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/eutex/tarjeta_contacto.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-slate-50 text-slate-800 antialiased flex flex-col min-h-screen" x-data="{ mobileMenuOpen: false }">

    <!-- TOP BAR DE CONTACTO -->
    <div class="bg-eutex-navy-dark text-slate-300 text-xs py-2 px-4 border-b border-slate-800/80">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-2">
            <!-- Contacto Rápido -->
            <div class="flex flex-wrap items-center gap-4 sm:gap-6">
                <a href="tel:920783202" class="flex items-center gap-1.5 hover:text-amber-400 transition-colors">
                    <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    <span>Central: <strong>920 783 202</strong></span>
                </a>

                <a href="https://wa.me/51920783202?text={{ urlencode('Hola EUTEX, deseo información y cotización de uniformes industriales.') }}" target="_blank" rel="noopener" class="flex items-center gap-1.5 hover:text-emerald-400 transition-colors">
                    <svg class="w-3.5 h-3.5 text-emerald-400 fill-current" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                    <span>WhatsApp: <strong>920783202</strong></span>
                </a>

                <div class="hidden md:flex items-center gap-1.5 text-slate-400">
                    <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span>eutex@ventas.com</span>
                </div>
            </div>

            <!-- Ubicación y Horario -->
            <div class="flex items-center gap-4 text-slate-400">
                <span class="flex items-center gap-1">
                    <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span class="hidden sm:inline">Fabricación en:</span> <strong>Gamarra, Lima</strong>
                </span>
                <span class="hidden lg:inline text-slate-600">|</span>
                <span class="hidden lg:inline">Lun - Sáb: 8:00 AM - 7:00 PM</span>
            </div>
        </div>
    </div>

    <!-- NAVBAR PRINCIPAL -->
    <header class="sticky top-0 z-40 bg-eutex-navy text-white shadow-xl transition-all border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- LOGO EUTEX -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group focus:outline-none">
                    <div class="relative w-12 h-12 rounded-xl bg-gradient-to-br from-amber-400 via-amber-500 to-amber-600 flex items-center justify-center shadow-lg shadow-amber-500/20 group-hover:scale-105 transition-transform">
                        <span class="font-serif italic font-extrabold text-2xl text-slate-950 tracking-tighter">ET</span>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex items-center gap-1">
                            <span class="font-heading font-black text-2xl tracking-wider text-white">EUTEX</span>
                            <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                        </div>
                        <span class="text-[10px] tracking-widest uppercase font-semibold text-amber-400 -mt-1">Uniformes Industriales</span>
                    </div>
                </a>

                <!-- NAVEGACIÓN DESKTOP -->
                <nav class="hidden lg:flex items-center gap-1 xl:gap-2">
                    <a href="{{ route('home') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition-all {{ request()->routeIs('home') ? 'bg-white/15 text-amber-400 font-semibold' : 'text-slate-200 hover:text-white hover:bg-white/10' }}">
                        Inicio
                    </a>

                    <a href="{{ route('nosotros') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition-all {{ request()->routeIs('nosotros') ? 'bg-white/15 text-amber-400 font-semibold' : 'text-slate-200 hover:text-white hover:bg-white/10' }}">
                        Nosotros
                    </a>

                    <!-- Dropdown Productos -->
                    <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="{{ route('products.index') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition-all flex items-center gap-1 {{ request()->routeIs('products.*') ? 'bg-white/15 text-amber-400 font-semibold' : 'text-slate-200 hover:text-white hover:bg-white/10' }}">
                            <span>Productos</span>
                            <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>

                        <!-- Dropdown Menu -->
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 translate-y-0"
                             x-transition:leave-end="opacity-0 translate-y-2"
                             class="absolute left-0 mt-1 w-80 bg-white rounded-2xl shadow-2xl border border-slate-100 text-slate-800 p-3 z-50">
                            
                            <div class="px-3 py-2 border-b border-slate-100 text-xs font-bold text-slate-400 uppercase tracking-wider">
                                Categorías de Confección
                            </div>

                            <a href="{{ route('products.category', 'polos-industriales') }}" class="flex items-center gap-3 p-2.5 rounded-xl hover:bg-slate-50 transition-colors group/item">
                                <div class="w-9 h-9 rounded-lg bg-blue-50 text-eutex-navy flex items-center justify-center group-hover/item:bg-amber-400 group-hover/item:text-slate-900 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                </div>
                                <div>
                                    <div class="text-sm font-semibold text-slate-900 group-hover/item:text-eutex-navy">Polos Industriales</div>
                                    <div class="text-xs text-slate-500">Manga larga, corta y piqué</div>
                                </div>
                            </a>

                            <a href="{{ route('products.category', 'chalecos-seguridad') }}" class="flex items-center gap-3 p-2.5 rounded-xl hover:bg-slate-50 transition-colors group/item">
                                <div class="w-9 h-9 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center group-hover/item:bg-amber-400 group-hover/item:text-slate-900 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                </div>
                                <div>
                                    <div class="text-sm font-semibold text-slate-900 group-hover/item:text-eutex-navy">Chalecos de Seguridad</div>
                                    <div class="text-xs text-slate-500">Tipo geólogo y alta visibilidad</div>
                                </div>
                            </a>

                            <a href="{{ route('products.category', 'pantalones-jeans') }}" class="flex items-center gap-3 p-2.5 rounded-xl hover:bg-slate-50 transition-colors group/item">
                                <div class="w-9 h-9 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center group-hover/item:bg-amber-400 group-hover/item:text-slate-900 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                                </div>
                                <div>
                                    <div class="text-sm font-semibold text-slate-900 group-hover/item:text-eutex-navy">Jeans & Pantalones Cargo</div>
                                    <div class="text-xs text-slate-500">Denim 14 oz con cinta reflectiva</div>
                                </div>
                            </a>

                            <a href="{{ route('products.category', 'mamelucos-overoles') }}" class="flex items-center gap-3 p-2.5 rounded-xl hover:bg-slate-50 transition-colors group/item">
                                <div class="w-9 h-9 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center group-hover/item:bg-amber-400 group-hover/item:text-slate-900 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                                <div>
                                    <div class="text-sm font-semibold text-slate-900 group-hover/item:text-eutex-navy">Mamelucos & Overoles</div>
                                    <div class="text-xs text-slate-500">Drill pesado para mina e industria</div>
                                </div>
                            </a>

                            <div class="mt-2 pt-2 border-t border-slate-100 flex items-center justify-between px-2">
                                <a href="{{ route('products.index') }}" class="text-xs font-bold text-amber-600 hover:text-amber-700 flex items-center gap-1">
                                    Ver catálogo completo &rarr;
                                </a>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('servicios') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition-all {{ request()->routeIs('servicios') ? 'bg-white/15 text-amber-400 font-semibold' : 'text-slate-200 hover:text-white hover:bg-white/10' }}">
                        Servicios
                    </a>

                    <a href="{{ route('blog.index') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition-all {{ request()->routeIs('blog.*') ? 'bg-white/15 text-amber-400 font-semibold' : 'text-slate-200 hover:text-white hover:bg-white/10' }}">
                        Blog
                    </a>

                    <a href="{{ route('contact') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition-all {{ request()->routeIs('contact') ? 'bg-white/15 text-amber-400 font-semibold' : 'text-slate-200 hover:text-white hover:bg-white/10' }}">
                        Contáctanos
                    </a>
                </nav>

                <!-- BOTONES DE ACCIÓN (SEARCH & COTIZAR) -->
                <div class="flex items-center gap-3">
                    
                    <!-- Botón Buscar -->
                    <button @click="$store.searchModal.open()" 
                            class="p-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-slate-200 hover:text-white transition-all focus:outline-none"
                            title="Buscar productos (Ctrl+K)">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>

                    <!-- Botón Cotizar Rápido -->
                    <button @click="$store.quoteCart.open()"
                            class="hidden sm:inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-300 hover:to-amber-400 text-slate-950 font-heading font-bold text-sm shadow-lg shadow-amber-500/25 transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                        <svg class="w-4 h-4 text-slate-950" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <span>Solicitar Cotización</span>
                    </button>

                    <!-- Hamburguesa Móvil -->
                    <button @click="mobileMenuOpen = !mobileMenuOpen" 
                            class="lg:hidden p-2.5 rounded-xl bg-white/10 text-white focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- MENÚ MÓVIL (DRAWER) -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="lg:hidden bg-eutex-navy-dark border-t border-white/10 px-4 pt-3 pb-6 space-y-2">
            
            <a href="{{ route('home') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium text-slate-200 hover:text-white hover:bg-white/10">
                Inicio
            </a>
            <a href="{{ route('nosotros') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium text-slate-200 hover:text-white hover:bg-white/10">
                Nosotros
            </a>
            <a href="{{ route('products.index') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium text-slate-200 hover:text-white hover:bg-white/10">
                Catálogo de Productos
            </a>
            <div class="pl-4 space-y-1 text-sm border-l-2 border-amber-400/40 my-2">
                <a href="{{ route('products.category', 'polos-industriales') }}" class="block py-1 text-slate-300 hover:text-amber-400">Polos Manga Larga y Cuello Redondo</a>
                <a href="{{ route('products.category', 'chalecos-seguridad') }}" class="block py-1 text-slate-300 hover:text-amber-400">Chalecos de Seguridad & Geólogo</a>
                <a href="{{ route('products.category', 'pantalones-jeans') }}" class="block py-1 text-slate-300 hover:text-amber-400">Jeans 14 oz y Pantalones Cargo</a>
                <a href="{{ route('products.category', 'mamelucos-overoles') }}" class="block py-1 text-slate-300 hover:text-amber-400">Mamelucos & Overoles Industriales</a>
            </div>
            <a href="{{ route('servicios') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium text-slate-200 hover:text-white hover:bg-white/10">
                Servicios
            </a>
            <a href="{{ route('blog.index') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium text-slate-200 hover:text-white hover:bg-white/10">
                Blog
            </a>
            <a href="{{ route('contact') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium text-slate-200 hover:text-white hover:bg-white/10">
                Contáctanos
            </a>

            <div class="pt-4 border-t border-white/10">
                <button @click="$store.quoteCart.open(); mobileMenuOpen = false;"
                        class="w-full flex items-center justify-center gap-2 py-3 rounded-xl bg-amber-400 text-slate-950 font-heading font-bold text-sm shadow-lg">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <span>Solicitar Cotización Inmediata</span>
                </button>
            </div>
        </div>
    </header>

    <!-- NOTIFICACIONES FLASH -->
    @if(session('success'))
        <div class="bg-emerald-600 text-white px-4 py-3 shadow-lg z-50 text-center font-medium flex items-center justify-center gap-2" x-data="{ show: true }" x-show="show">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <span>{{ session('success') }}</span>
            <button @click="show = false" class="ml-4 text-emerald-200 hover:text-white">&times;</button>
        </div>
    @endif

    <!-- CONTENIDO PRINCIPAL -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-eutex-navy-dark text-slate-300 pt-16 pb-8 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-slate-800/80">
                
                <!-- Columna 1: Empresa & Logo -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center shadow-md">
                            <span class="font-serif italic font-extrabold text-xl text-slate-950">ET</span>
                        </div>
                        <div>
                            <span class="font-heading font-black text-xl tracking-wider text-white">EUTEX</span>
                            <span class="block text-[10px] uppercase font-semibold text-amber-400 -mt-1 tracking-widest">Uniformes Industriales</span>
                        </div>
                    </div>

                    <p class="text-sm text-slate-400 leading-relaxed">
                        Líderes en confección textil de uniformes industriales, ropa de trabajo de alta visibilidad y suministro de equipos de protección personal en Gamarra, Lima para todo el Perú.
                    </p>

                    <div class="pt-2 text-xs text-slate-400 space-y-1.5">
                        <div class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-amber-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                            <span>Gamarra, La Victoria, Lima - Perú</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-amber-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span>920783202</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-amber-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span>eutex@ventas.com</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-amber-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span>e20huaccachi@gmail.com</span>
                        </div>
                    </div>
                </div>

                <!-- Columna 2: Enlaces Rápidos -->
                <div>
                    <h3 class="font-heading font-bold text-white text-base mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 rounded bg-amber-400"></span>
                        <span>Navegación Rápida</span>
                    </h3>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-amber-400 transition-colors">Inicio</a></li>
                        <li><a href="{{ route('nosotros') }}" class="hover:text-amber-400 transition-colors">Sobre Nosotros</a></li>
                        <li><a href="{{ route('products.index') }}" class="hover:text-amber-400 transition-colors">Catálogo de Productos</a></li>
                        <li><a href="{{ route('servicios') }}" class="hover:text-amber-400 transition-colors">Confección & Bordado</a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-amber-400 transition-colors">Blog & Normativa Técnica</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-amber-400 transition-colors">Contáctanos</a></li>
                    </ul>
                </div>

                <!-- Columna 3: Categorías -->
                <div>
                    <h3 class="font-heading font-bold text-white text-base mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 rounded bg-amber-400"></span>
                        <span>Líneas de Producción</span>
                    </h3>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('products.category', 'polos-industriales') }}" class="hover:text-amber-400 transition-colors">Polos Manga Larga (10 Colores)</a></li>
                        <li><a href="{{ route('products.category', 'chalecos-seguridad') }}" class="hover:text-amber-400 transition-colors">Chalecos de Seguridad & Geólogo</a></li>
                        <li><a href="{{ route('products.category', 'pantalones-jeans') }}" class="hover:text-amber-400 transition-colors">Jeans 14 oz con Reflectivo</a></li>
                        <li><a href="{{ route('products.category', 'pantalones-jeans') }}" class="hover:text-amber-400 transition-colors">Pantalones Cargo en Drill</a></li>
                        <li><a href="{{ route('products.category', 'mamelucos-overoles') }}" class="hover:text-amber-400 transition-colors">Mamelucos & Overoles de Faena</a></li>
                        <li><a href="{{ route('products.category', 'casacas-ropa-termica') }}" class="hover:text-amber-400 transition-colors">Casacas Térmicas Mineras</a></li>
                        <li><a href="{{ route('products.category', 'epp-seguridad') }}" class="hover:text-amber-400 transition-colors">Equipos de Protección (EPP)</a></li>
                    </ul>
                </div>

                <!-- Columna 4: Atención & Libro de Reclamaciones -->
                <div class="space-y-4">
                    <h3 class="font-heading font-bold text-white text-base mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 rounded bg-amber-400"></span>
                        <span>Atención Corporativa</span>
                    </h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Atendemos pedidos por mayor y menor, licitaciones públicas y requerimientos corporativos con muestras físicas previas.
                    </p>

                    <!-- Libro de Reclamaciones Box -->
                    <a href="{{ route('libro-reclamaciones') }}" class="block p-3 rounded-xl bg-slate-900 border border-slate-700/80 hover:border-amber-400 transition-all group">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-lg bg-amber-400/20 text-amber-400 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <div>
                                <span class="text-xs font-bold text-white group-hover:text-amber-400 block">Libro de Reclamaciones</span>
                                <span class="text-[10px] text-slate-400">Conforme al D.S. N° 011-2011-PCM</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Bottom Copyright -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 gap-4">
                <p>© {{ date('Y') }} <strong>EUTEX Uniformes Industriales</strong>. Todos los derechos reservados. Fabricado en Gamarra, Lima - Perú.</p>
                <div class="flex items-center gap-6">
                    <span class="text-slate-400 font-medium">Atención: 920 783 202</span>
                    <a href="https://wa.me/51920783202" target="_blank" class="text-emerald-400 hover:underline font-semibold">WhatsApp Oficial</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- MODAL DE BÚSQUEDA INSTANTÁNEA (Alpine.js) -->
    <div x-show="$store.searchModal.isOpen" 
         x-cloak
         class="fixed inset-0 z-50 overflow-y-auto"
         aria-labelledby="modal-title" role="dialog" aria-modal="true">
        
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-slate-950/75 backdrop-blur-sm transition-opacity"
             @click="$store.searchModal.close()"></div>

        <div class="flex min-h-full items-start justify-center p-4 pt-16 sm:p-6 sm:pt-24 text-center">
            <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all w-full max-w-2xl border border-slate-200"
                 @click.stop>
                
                <!-- Barra de Búsqueda -->
                <div class="relative border-b border-slate-100 flex items-center px-4">
                    <svg class="w-5 h-5 text-slate-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" 
                           id="search-input-field"
                           x-model="$store.searchModal.query"
                           @input.debounce.250ms="$store.searchModal.performSearch()"
                           @keydown.escape="$store.searchModal.close()"
                           placeholder="Buscar chalecos, polos, jeans, overoles, reflectivos..."
                           class="w-full py-4 text-base focus:outline-none placeholder-slate-400 text-slate-800">
                    <button @click="$store.searchModal.close()" class="text-slate-400 hover:text-slate-600 p-2 text-xl font-bold">
                        &times;
                    </button>
                </div>

                <!-- Resultados -->
                <div class="p-4 max-h-96 overflow-y-auto">
                    <!-- Loading -->
                    <div x-show="$store.searchModal.loading" class="py-8 text-center text-slate-500 text-sm">
                        <svg class="animate-spin h-6 w-6 text-amber-500 mx-auto mb-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Buscando prendas en el catálogo de EUTEX...
                    </div>

                    <!-- Lista de Resultados -->
                    <template x-if="!$store.searchModal.loading && $store.searchModal.results.length > 0">
                        <div class="space-y-2">
                            <div class="text-xs font-semibold uppercase text-slate-400 px-2 py-1">
                                Coincidencias encontradas (<span x-text="$store.searchModal.results.length"></span>)
                            </div>
                            <template x-for="item in $store.searchModal.results" :key="item.id">
                                <a :href="'/productos/' + item.slug" 
                                   class="flex items-center gap-3 p-2.5 rounded-xl hover:bg-slate-50 transition-colors group">
                                    <img :src="item.image" :alt="item.name" class="w-12 h-12 rounded-lg object-cover bg-slate-100 shrink-0">
                                    <div class="flex-grow min-w-0">
                                        <div class="flex items-center gap-2">
                                            <span class="text-xs font-bold text-slate-900 group-hover:text-amber-600 truncate" x-text="item.name"></span>
                                            <span x-show="item.badge" class="px-1.5 py-0.5 rounded text-[10px] bg-amber-100 text-amber-800 font-medium" x-text="item.badge"></span>
                                        </div>
                                        <p class="text-xs text-slate-500 truncate" x-text="item.short_description"></p>
                                    </div>
                                    <span class="text-xs font-medium text-slate-400 group-hover:text-amber-600 shrink-0">&rarr;</span>
                                </a>
                            </template>
                        </div>
                    </template>

                    <!-- Sin resultados -->
                    <template x-if="!$store.searchModal.loading && $store.searchModal.query.length >= 2 && $store.searchModal.results.length === 0">
                        <div class="py-8 text-center text-slate-500 text-sm">
                            <p>No se encontraron productos que coincidan con "<strong x-text="$store.searchModal.query"></strong>".</p>
                            <p class="text-xs text-slate-400 mt-1">Pruebe con palabras como: <em>polo, chaleco, jean, drill, naranja, reflectivo</em></p>
                        </div>
                    </template>

                    <!-- Placeholder inicial -->
                    <template x-if="!$store.searchModal.loading && $store.searchModal.query.length < 2">
                        <div class="py-4 text-center text-slate-400 text-xs">
                            Escriba al menos 2 letras para iniciar la búsqueda en vivo.
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL / DRAWER DE COTIZACIÓN RÁPIDA (Alpine.js) -->
    <div x-show="$store.quoteCart.isOpen" 
         x-cloak
         class="fixed inset-0 z-50 overflow-hidden" 
         aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
        
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-slate-950/70 backdrop-blur-sm transition-opacity"
             @click="$store.quoteCart.close()"></div>

        <div class="fixed inset-y-0 right-0 max-w-full flex pl-10">
            <div class="w-screen max-w-md bg-white shadow-2xl flex flex-col border-l border-slate-200"
                 x-transition:enter="transform transition ease-in-out duration-300"
                 x-transition:enter-start="translate-x-full"
                 x-transition:enter-end="translate-x-0"
                 x-transition:leave="transform transition ease-in-out duration-200"
                 x-transition:leave-start="translate-x-0"
                 x-transition:leave-end="translate-x-full">
                
                <!-- Encabezado Modal -->
                <div class="p-6 bg-eutex-navy text-white flex items-center justify-between">
                    <div>
                        <h2 class="font-heading font-bold text-lg text-white flex items-center gap-2">
                            <span>Solicitar Cotización</span>
                            <span class="px-2 py-0.5 rounded text-[10px] bg-amber-400 text-slate-950 font-extrabold uppercase">EUTEX</span>
                        </h2>
                        <p class="text-xs text-slate-300 mt-0.5">Respuesta inmediata por WhatsApp y correo</p>
                    </div>
                    <button @click="$store.quoteCart.close()" class="text-slate-300 hover:text-white p-2 text-2xl leading-none">
                        &times;
                    </button>
                </div>

                <!-- Formulario -->
                <div class="p-6 flex-grow overflow-y-auto">
                    <form action="{{ route('quote.store') }}" method="POST" class="space-y-4">
                        @csrf
                        
                        <!-- Si hay producto seleccionado -->
                        <div x-show="$store.quoteCart.selectedProduct" class="p-3 rounded-xl bg-amber-50 border border-amber-200/80 mb-4">
                            <span class="text-[10px] uppercase font-bold text-amber-700 tracking-wider block">Prenda Seleccionada</span>
                            <div class="flex items-center gap-3 mt-1">
                                <img :src="$store.quoteCart.selectedProduct ? $store.quoteCart.selectedProduct.image : ''" 
                                     class="w-12 h-12 rounded-lg object-cover border border-amber-200 shrink-0">
                                <div class="min-w-0">
                                    <strong class="text-xs text-slate-900 block truncate" x-text="$store.quoteCart.selectedProduct ? $store.quoteCart.selectedProduct.name : ''"></strong>
                                    <span class="text-[11px] text-slate-500" x-text="$store.quoteCart.selectedProduct ? $store.quoteCart.selectedProduct.sku : ''"></span>
                                </div>
                            </div>
                            <input type="hidden" name="product_id" :value="$store.quoteCart.selectedProduct ? $store.quoteCart.selectedProduct.id : ''">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Nombre Completo *</label>
                            <input type="text" name="name" required placeholder="Ej. Carlos Mendoza" 
                                   class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none">
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Empresa / Razón Social</label>
                                <input type="text" name="company" placeholder="Ej. Minera o Contratista" 
                                       class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">RUC (Opcional)</label>
                                <input type="text" name="ruc" placeholder="11 dígitos" maxlength="11"
                                       class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">WhatsApp / Teléfono *</label>
                                <input type="tel" name="phone" required placeholder="920 000 000" 
                                       class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Correo Electrónico *</label>
                                <input type="email" name="email" required placeholder="ventas@empresa.com" 
                                       class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-2">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Cantidad *</label>
                                <input type="number" name="quantity" min="1" x-model="$store.quoteCart.quantity"
                                       class="w-full px-3 py-2 rounded-xl border border-slate-300 text-sm focus:border-amber-500 outline-none text-center font-bold">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Color</label>
                                <input type="text" name="color" x-model="$store.quoteCart.selectedColor" placeholder="Ej. Naranja" 
                                       class="w-full px-3 py-2 rounded-xl border border-slate-300 text-sm focus:border-amber-500 outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Talla</label>
                                <input type="text" name="size" x-model="$store.quoteCart.selectedSize" placeholder="Ej. L / 32" 
                                       class="w-full px-3 py-2 rounded-xl border border-slate-300 text-sm focus:border-amber-500 outline-none">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Requerimientos / Personalización (Bordado, Cintas, etc.)</label>
                            <textarea name="message" rows="3" placeholder="Indíquenos si requiere bordado de logotipo, tipo de cinta reflectiva o entrega en provincia..." 
                                      class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-sm focus:border-amber-500 outline-none"></textarea>
                        </div>

                        <button type="submit" 
                                class="w-full py-3.5 rounded-xl bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-300 hover:to-amber-400 text-slate-950 font-heading font-extrabold text-sm shadow-xl shadow-amber-500/20 flex items-center justify-center gap-2">
                            <svg class="w-5 h-5 text-slate-950" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                            <span>Enviar Solicitud a Ventas</span>
                        </button>

                        <div class="text-center pt-2">
                            <span class="text-[11px] text-slate-400">Atención directa de lunes a sábado desde Gamarra, Lima</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- BOTÓN FLOTANTE WHATSAPP -->
    <aside aria-label="Contacto WhatsApp" class="fixed bottom-6 right-6 z-40 flex items-center gap-3">
        <a href="https://wa.me/51920783202?text={{ urlencode('¡Hola EUTEX! Deseo cotizar uniformes industriales y ropa de trabajo.') }}"
           target="_blank" rel="noopener"
           class="group relative flex items-center justify-center w-14 h-14 rounded-full bg-emerald-500 hover:bg-emerald-400 text-white shadow-2xl shadow-emerald-500/40 hover:scale-110 transition-all focus:outline-none"
           title="Escríbenos por WhatsApp: 920783202">
            
            <!-- Pulso animado -->
            <span class="absolute inset-0 rounded-full bg-emerald-400 opacity-75 animate-ping"></span>

            <svg class="w-8 h-8 relative z-10 fill-current" viewBox="0 0 24 24">
                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
            </svg>
        </a>
    </aside>

    @stack('scripts')
</body>
</html>
