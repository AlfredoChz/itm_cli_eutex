@extends('layouts.app')

@section('title', 'EUTEX | Fabricantes de Uniformes Industriales, Ropa de Trabajo y EPP en Gamarra Lima')
@section('meta_description', 'EUTEX: Especialistas en confección de uniformes industriales, polos manga larga en 10 colores, chalecos reflectivos, jeans 14 oz y mamelucos mineros. Fabricación directa en Gamarra, Lima.')

@section('content')

<!-- HERO SECTION -->
<section class="relative bg-eutex-navy text-white overflow-hidden py-16 lg:py-24 border-b border-white/10">
    <!-- Decorative background patterns -->
    <div class="absolute inset-0 opacity-10 pointer-events-none bg-[radial-gradient(#f59e0b_1px,transparent_1px)] [background-size:24px_24px]"></div>
    <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-amber-500/15 blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -left-24 w-96 h-96 rounded-full bg-blue-600/20 blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Columna Texto & CTAs -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                
                <!-- Badge Superior -->
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/20 text-amber-400 text-xs font-semibold backdrop-blur-sm">
                    <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                    <span>Fabricantes Directos en Gamarra • Norma ANSI / NTP</span>
                </div>

                <!-- Titular Principal -->
                <h1 class="font-heading font-black text-3xl sm:text-4xl md:text-5xl lg:text-5xl tracking-tight leading-tight text-white">
                    Confección y Suministro de <br class="hidden sm:inline">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 via-amber-300 to-yellow-200">
                        Uniformes Industriales
                    </span> <br class="hidden sm:inline">
                    y Ropa de Trabajo
                </h1>

                <!-- Subtítulo -->
                <p class="text-base sm:text-lg text-slate-300 leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    Especialistas en polos de algodón peinado, chalecos de seguridad reflectivos, jeans 14 oz y mamelucos para minería, construcción y manufactura. Calidad certificada, durabilidad extrema y precios de fábrica.
                </p>

                <!-- Botones de Acción -->
                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 pt-2">
                    <button @click="$store.quoteCart.open()"
                            class="px-7 py-3.5 rounded-xl bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-300 hover:to-amber-400 text-slate-950 font-heading font-extrabold text-sm sm:text-base shadow-xl shadow-amber-500/25 transition-all transform hover:-translate-y-0.5 flex items-center gap-2">
                        <svg class="w-5 h-5 text-slate-950" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        <span>Solicitar Cotización</span>
                    </button>

                    <a href="{{ route('products.index') }}"
                       class="px-7 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 border border-white/20 text-white font-heading font-bold text-sm sm:text-base backdrop-blur-sm transition-all flex items-center gap-2">
                        <span>Ver Catálogo Completo</span>
                        <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>

                <!-- Contacto Express -->
                <div class="pt-4 flex flex-wrap items-center justify-center lg:justify-start gap-6 text-xs text-slate-300 border-t border-white/10">
                    <a href="https://wa.me/51920783202" target="_blank" class="flex items-center gap-2 hover:text-emerald-400 transition-colors">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                        <span>WhatsApp de Ventas: <strong>920 783 202</strong></span>
                    </a>
                    <span class="text-slate-500">•</span>
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>Envíos diarios a todo el Perú</span>
                    </span>
                </div>
            </div>

            <!-- Columna Banner Visual -->
            <div class="lg:col-span-5 relative">
                <div class="relative mx-auto max-w-md lg:max-w-none">
                    
                    <!-- Glow decorativo -->
                    <div class="absolute inset-0 bg-gradient-to-tr from-amber-500/20 to-blue-500/20 rounded-3xl filter blur-2xl transform scale-95"></div>

                    <!-- Tarjeta Principal con Imagen de EUTEX -->
                    <div class="relative rounded-3xl overflow-hidden border-2 border-white/20 shadow-2xl bg-slate-900 group">
                        <img src="{{ asset('images/eutex/banner_principal.png') }}" 
                             alt="EUTEX Uniformes Industriales" 
                             class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-500">
                        
                        <!-- Overlay inferior de branding -->
                        <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-slate-950 via-slate-950/80 to-transparent p-6 text-left">
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-xs font-bold text-amber-400 uppercase tracking-wider block">Catálogo Oficial</span>
                                    <h4 class="font-heading font-extrabold text-white text-lg">EUTEX Industrial Wear</h4>
                                </div>
                                <span class="px-3 py-1 rounded-full bg-amber-400/20 border border-amber-400/40 text-amber-300 text-xs font-bold">
                                    Stock Permanente
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Pill Badges -->
                    <div class="absolute -top-4 -left-4 bg-white/95 text-slate-900 rounded-2xl p-3 shadow-xl border border-slate-200 hidden sm:flex items-center gap-3 backdrop-blur-md">
                        <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center font-bold">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div class="text-left">
                            <div class="text-xs font-bold leading-tight">100% Algodón Peinado</div>
                            <div class="text-[10px] text-slate-500">Mayor frescura y durabilidad</div>
                        </div>
                    </div>

                    <div class="absolute -bottom-4 -right-4 bg-white/95 text-slate-900 rounded-2xl p-3 shadow-xl border border-slate-200 hidden sm:flex items-center gap-3 backdrop-blur-md">
                        <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center font-bold">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <div class="text-left">
                            <div class="text-xs font-bold leading-tight">Cintas Reflectivas 3M</div>
                            <div class="text-[10px] text-slate-500">Alta visibilidad diurna y nocturna</div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- BARRA DE ESTADÍSTICAS & CONFIANZA -->
<section class="bg-white py-10 border-b border-slate-200 shadow-sm relative z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center divide-y md:divide-y-0 md:divide-x divide-slate-200">
            @foreach($stats as $stat)
                <div class="pt-4 md:pt-0 px-4">
                    <div class="font-heading font-black text-3xl sm:text-4xl text-eutex-navy tracking-tight">
                        {{ $stat['value'] }}
                    </div>
                    <div class="text-xs sm:text-sm font-semibold text-slate-600 mt-1 uppercase tracking-wider">
                        {{ $stat['label'] }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CATEGORÍAS PRINCIPALES -->
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Encabezado de Sección -->
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="text-xs font-extrabold uppercase tracking-widest text-amber-600 bg-amber-50 px-3 py-1 rounded-full border border-amber-200">
                Líneas Especializadas
            </span>
            <h2 class="font-heading font-black text-2xl sm:text-3xl md:text-4xl text-slate-900 mt-3">
                Categorías de Confección Textil y EPP
            </h2>
            <p class="text-slate-600 text-sm sm:text-base mt-2">
                Prendas fabricadas con los más altos estándares de calidad, resistencia mecánica y protección laboral para cada sector productivo.
            </p>
        </div>

        <!-- Grid de Categorías -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($categories as $category)
                <a href="{{ route('products.category', $category->slug) }}" 
                   class="group bg-white rounded-2xl overflow-hidden border border-slate-200/90 shadow-sm hover:shadow-xl hover:border-amber-400 transition-all duration-300 flex flex-col">
                    
                    <div class="relative h-56 overflow-hidden bg-slate-100">
                        <img src="{{ asset($category->image) }}" 
                             alt="{{ $category->name }}" 
                             class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/20 to-transparent"></div>
                        
                        <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between text-white">
                            <span class="text-xs font-semibold px-2.5 py-1 rounded-md bg-white/20 backdrop-blur-md">
                                {{ $category->products_count }} Modelos
                            </span>
                            <span class="text-xs font-bold text-amber-400 group-hover:translate-x-1 transition-transform flex items-center gap-1">
                                Ver prendas &rarr;
                            </span>
                        </div>
                    </div>

                    <div class="p-6 flex-grow flex flex-col justify-between">
                        <div>
                            <h3 class="font-heading font-bold text-lg text-slate-900 group-hover:text-eutex-navy transition-colors mb-2">
                                {{ $category->name }}
                            </h3>
                            <p class="text-slate-600 text-xs sm:text-sm line-clamp-2 leading-relaxed">
                                {{ $category->description }}
                            </p>
                        </div>
                        
                        <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs font-bold text-eutex-navy group-hover:text-amber-600">
                            <span>Explorar categoría</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-10 text-center">
            <a href="{{ route('products.index') }}" 
               class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-eutex-navy hover:bg-eutex-navy-light text-white font-heading font-bold text-sm shadow-md transition-all">
                <span>Ver todo el catálogo industrial</span>
                <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- SHOWCASE ESPECIAL 1: POLOS MANGA LARGA (10 COLORES) -->
<section class="py-16 bg-white border-y border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            
            <!-- Imagen del Producto (Image 3) -->
            <div class="lg:col-span-6">
                <div class="relative rounded-2xl overflow-hidden border border-slate-200 shadow-xl bg-slate-50 p-2 group">
                    <img src="{{ asset('images/eutex/polos_manga_larga.png') }}" 
                         alt="Polos Manga Larga EUTEX 10 Colores" 
                         class="w-full h-auto rounded-xl object-contain transform group-hover:scale-102 transition-transform duration-300">
                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-eutex-navy text-amber-400 text-xs font-bold shadow-md">
                        10 Colores en Stock
                    </span>
                </div>
            </div>

            <!-- Detalles Técnicos & Valor -->
            <div class="lg:col-span-6 space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-eutex-navy text-xs font-bold border border-blue-200">
                    <span>Línea Industrial de Algodón Peinado</span>
                </div>

                <h2 class="font-heading font-black text-2xl sm:text-3xl text-slate-900 leading-tight">
                    Polos Manga Larga y Cuello Redondo Reforzado
                </h2>

                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    Confeccionados con hilado 100% algodón jersey peinado de alta durabilidad, suaves al tacto, transpirables y especialmente reforzados para aguantar jornadas laborales pesadas y lavado industrial continuo.
                </p>

                <!-- 4 Puntos Clave Extraídos de la Imagen 3 -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    <div class="flex items-start gap-3 p-3 rounded-xl bg-slate-50 border border-slate-200/80">
                        <div class="w-8 h-8 rounded-lg bg-amber-400/20 text-amber-600 flex items-center justify-center font-bold shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <strong class="text-xs font-bold text-slate-900 block">Cuello redondo reforzado</strong>
                            <span class="text-xs text-slate-500">Mayor durabilidad y comodidad.</span>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 p-3 rounded-xl bg-slate-50 border border-slate-200/80">
                        <div class="w-8 h-8 rounded-lg bg-amber-400/20 text-amber-600 flex items-center justify-center font-bold shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <strong class="text-xs font-bold text-slate-900 block">Puños en rib</strong>
                            <span class="text-xs text-slate-500">Mejor ajuste y fino acabado.</span>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 p-3 rounded-xl bg-slate-50 border border-slate-200/80">
                        <div class="w-8 h-8 rounded-lg bg-amber-400/20 text-amber-600 flex items-center justify-center font-bold shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <strong class="text-xs font-bold text-slate-900 block">Tela de alta calidad</strong>
                            <span class="text-xs text-slate-500">Suave, fresca y resistente.</span>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 p-3 rounded-xl bg-slate-50 border border-slate-200/80">
                        <div class="w-8 h-8 rounded-lg bg-amber-400/20 text-amber-600 flex items-center justify-center font-bold shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <strong class="text-xs font-bold text-slate-900 block">Basta de doble costura</strong>
                            <span class="text-xs text-slate-500">Mayor resistencia al uso.</span>
                        </div>
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex flex-wrap items-center gap-4 pt-2">
                    <a href="https://wa.me/51920783202?text={{ urlencode('Hola EUTEX, deseo cotizar el Polo Manga Larga Industrial Cuello Redondo.') }}" 
                       target="_blank"
                       class="px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-heading font-bold text-sm shadow-md transition-all flex items-center gap-2">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        <span>Cotizar por WhatsApp</span>
                    </a>

                    <a href="{{ route('products.show', 'polo-manga-larga-industrial-cuello-redondo') }}"
                       class="px-6 py-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 font-heading font-bold text-sm transition-all">
                        Ver Ficha Técnica
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SHOWCASE ESPECIAL 2: CHALECOS & JEANS (Images 4 & 5) -->
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            
            <!-- CHALECOS DE SEGURIDAD (Image 4) -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm flex flex-col justify-between hover:shadow-xl transition-shadow">
                <div class="space-y-4">
                    <span class="text-xs font-bold uppercase tracking-wider text-amber-700 bg-amber-100 px-3 py-1 rounded-full inline-block">
                        Norma ANSI 107
                    </span>
                    <h3 class="font-heading font-black text-2xl text-slate-900">
                        Chalecos de Seguridad & Tipo Geólogo
                    </h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Cinta reflectiva de 5 cm de alta visibilidad, cierre frontal reforzado, bolsillos funcionales con tapa y porta-lapiceros en 4 colores: Naranja, Amarillo Neón, Azul Marino y Negro.
                    </p>
                    <div class="rounded-2xl overflow-hidden border border-slate-100 bg-slate-50 p-2 my-4">
                        <img src="{{ asset('images/eutex/chalecos_seguridad.png') }}" 
                             alt="Chalecos de Seguridad EUTEX" 
                             class="w-full h-auto rounded-xl object-contain">
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <a href="{{ route('products.show', 'chaleco-seguridad-tipo-geologo-multibolsillos') }}" 
                       class="font-heading font-bold text-sm text-eutex-navy hover:text-amber-600 flex items-center gap-1">
                        <span>Ver detalles del chaleco</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    <button @click="$store.quoteCart.open({{ $featuredProducts->where('slug', 'chaleco-seguridad-tipo-geologo-multibolsillos')->first() ?? 'null' }})"
                            class="px-4 py-2 rounded-xl bg-amber-400 hover:bg-amber-300 text-slate-950 text-xs font-extrabold shadow">
                        Cotizar
                    </button>
                </div>
            </div>

            <!-- JEANS INDUSTRIALES 14 OZ (Image 5) -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm flex flex-col justify-between hover:shadow-xl transition-shadow">
                <div class="space-y-4">
                    <span class="text-xs font-bold uppercase tracking-wider text-blue-700 bg-blue-100 px-3 py-1 rounded-full inline-block">
                        Denim 14 oz • Alta Resistencia
                    </span>
                    <h3 class="font-heading font-black text-2xl text-slate-900">
                        Jeans Industriales con Cinta Reflectiva
                    </h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Confección en denim pesado 14 onzas con triple costura de cadeneta en entrepierna, cintura con botón remachado, bolsillos profundos y cinta reflectiva 3M para máxima visibilidad en mina y obra.
                    </p>
                    <div class="rounded-2xl overflow-hidden border border-slate-100 bg-slate-50 p-2 my-4">
                        <img src="{{ asset('images/eutex/jeans_industriales.png') }}" 
                             alt="Jeans Industriales EUTEX" 
                             class="w-full h-auto rounded-xl object-contain">
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <a href="{{ route('products.show', 'pantalon-jean-industrial-14oz-cinta-reflectiva') }}" 
                       class="font-heading font-bold text-sm text-eutex-navy hover:text-amber-600 flex items-center gap-1">
                        <span>Ver detalles del jean</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    <button @click="$store.quoteCart.open({{ $featuredProducts->where('slug', 'pantalon-jean-industrial-14oz-cinta-reflectiva')->first() ?? 'null' }})"
                            class="px-4 py-2 rounded-xl bg-amber-400 hover:bg-amber-300 text-slate-950 text-xs font-extrabold shadow">
                        Cotizar
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CATÁLOGO DE PRODUCTOS DESTACADOS (CON PESTAÑAS INTERACTIVAS ALPINE.JS) -->
<section class="py-16 bg-white" x-data="{ activeTab: 'todos' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
            <div>
                <span class="text-xs font-extrabold uppercase tracking-widest text-amber-600 bg-amber-50 px-3 py-1 rounded-full border border-amber-200">
                    Prendas en Demanda
                </span>
                <h2 class="font-heading font-black text-2xl sm:text-3xl md:text-4xl text-slate-900 mt-2">
                    Productos Destacados EUTEX
                </h2>
            </div>

            <!-- Filtros de Pestañas -->
            <div class="flex flex-wrap gap-2">
                <button @click="activeTab = 'todos'" 
                        :class="activeTab === 'todos' ? 'bg-eutex-navy text-white shadow-md' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'"
                        class="px-4 py-2 rounded-xl text-xs font-bold transition-all">
                    Todos
                </button>
                <button @click="activeTab = 'polos-industriales'" 
                        :class="activeTab === 'polos-industriales' ? 'bg-eutex-navy text-white shadow-md' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'"
                        class="px-4 py-2 rounded-xl text-xs font-bold transition-all">
                    Polos
                </button>
                <button @click="activeTab = 'chalecos-seguridad'" 
                        :class="activeTab === 'chalecos-seguridad' ? 'bg-eutex-navy text-white shadow-md' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'"
                        class="px-4 py-2 rounded-xl text-xs font-bold transition-all">
                    Chalecos
                </button>
                <button @click="activeTab = 'pantalones-jeans'" 
                        :class="activeTab === 'pantalones-jeans' ? 'bg-eutex-navy text-white shadow-md' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'"
                        class="px-4 py-2 rounded-xl text-xs font-bold transition-all">
                    Jeans & Pantalones
                </button>
                <button @click="activeTab = 'mamelucos-overoles'" 
                        :class="activeTab === 'mamelucos-overoles' ? 'bg-eutex-navy text-white shadow-md' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'"
                        class="px-4 py-2 rounded-xl text-xs font-bold transition-all">
                    Mamelucos
                </button>
            </div>
        </div>

        <!-- Grid de Productos -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($allProducts as $product)
                <div x-show="activeTab === 'todos' || activeTab === '{{ $product->category->slug }}'"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     class="bg-white rounded-2xl overflow-hidden border border-slate-200/90 shadow-sm hover:shadow-xl hover:border-amber-400 transition-all flex flex-col justify-between group product-card">
                    
                    <div>
                        <!-- Imagen con Badges -->
                        <div class="relative h-64 overflow-hidden bg-slate-100">
                            <img src="{{ asset($product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            
                            @if($product->badge)
                                <span class="absolute top-3 left-3 px-3 py-1 rounded-full text-xs font-extrabold bg-gradient-to-r from-amber-400 to-amber-500 text-slate-950 shadow-md">
                                    {{ $product->badge }}
                                </span>
                            @endif

                            <span class="absolute bottom-3 right-3 px-2 py-0.5 rounded text-[10px] font-semibold bg-slate-900/80 text-white backdrop-blur-sm">
                                SKU: {{ $product->sku }}
                            </span>
                        </div>

                        <!-- Info del Producto -->
                        <div class="p-6">
                            <span class="text-xs font-bold text-amber-600 uppercase tracking-wider block mb-1">
                                {{ $product->category->name }}
                            </span>
                            
                            <h3 class="font-heading font-extrabold text-lg text-slate-900 group-hover:text-eutex-navy transition-colors mb-2">
                                <a href="{{ route('products.show', $product->slug) }}">
                                    {{ $product->name }}
                                </a>
                            </h3>

                            <p class="text-xs text-slate-500 line-clamp-2 mb-4 leading-relaxed">
                                {{ $product->short_description }}
                            </p>

                            <!-- Features pill list -->
                            @if(!empty($product->features))
                                <ul class="space-y-1 text-xs text-slate-600 mb-4">
                                    @foreach(array_slice($product->features, 0, 2) as $feat)
                                        <li class="flex items-center gap-1.5 truncate">
                                            <svg class="w-3.5 h-3.5 text-amber-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                            <span class="truncate">{{ $feat }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>

                    <!-- Botones de Acción -->
                    <div class="p-6 pt-0 border-t border-slate-100 flex items-center gap-3">
                        <a href="https://wa.me/51920783202?text={{ urlencode('Hola EUTEX, deseo cotizar el producto: ' . $product->name . ' (SKU: ' . $product->sku . ')') }}" 
                           target="_blank"
                           class="flex-1 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold flex items-center justify-center gap-1.5 shadow transition-colors">
                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                            <span>WhatsApp</span>
                        </a>

                        <a href="{{ route('products.show', $product->slug) }}"
                           class="px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-bold transition-colors">
                            Detalles
                        </a>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- POR QUÉ ELEGIR A EUTEX (VALUE PROPOSITION) -->
<section class="py-16 bg-slate-900 text-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="text-xs font-bold uppercase tracking-widest text-amber-400 bg-amber-400/10 px-3 py-1 rounded-full border border-amber-400/30">
                Garantía y Confianza
            </span>
            <h2 class="font-heading font-black text-2xl sm:text-3xl md:text-4xl text-white mt-3">
                ¿Por qué elegir a EUTEX como su proveedor textil?
            </h2>
            <p class="text-slate-400 text-sm sm:text-base mt-2">
                Combinamos experiencia técnica, materiales de primera calidad y fabricación directa sin intermediarios.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div class="p-6 rounded-2xl bg-slate-800/80 border border-slate-700/80 hover:border-amber-400 transition-all group">
                <div class="w-12 h-12 rounded-xl bg-amber-400/20 text-amber-400 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <h4 class="font-heading font-bold text-lg text-white mb-2">Fabricación Directa en Gamarra</h4>
                <p class="text-xs sm:text-sm text-slate-400 leading-relaxed">
                    Control absoluto de los tiempos de entrega y los costos. Somos fabricantes directos en el emporio comercial de Gamarra, Lima sin revendedores.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-slate-800/80 border border-slate-700/80 hover:border-amber-400 transition-all group">
                <div class="w-12 h-12 rounded-xl bg-amber-400/20 text-amber-400 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h4 class="font-heading font-bold text-lg text-white mb-2">Cintas Reflectivas 3M Homologadas</h4>
                <p class="text-xs sm:text-sm text-slate-400 leading-relaxed">
                    Visibilidad 360° certificada bajo norma ANSI/ISEA 107 y NTP. Máxima retro-reflexión en túneles, carreteras y faenas nocturnas.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-slate-800/80 border border-slate-700/80 hover:border-amber-400 transition-all group">
                <div class="w-12 h-12 rounded-xl bg-amber-400/20 text-amber-400 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                </div>
                <h4 class="font-heading font-bold text-lg text-white mb-2">Bordado & Estampado Computarizado</h4>
                <p class="text-xs sm:text-sm text-slate-400 leading-relaxed">
                    Identidad corporativa de alta definición con hilos de resistencia industrial y serigrafía plastisol que no se cuartea con el uso.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-slate-800/80 border border-slate-700/80 hover:border-amber-400 transition-all group">
                <div class="w-12 h-12 rounded-xl bg-amber-400/20 text-amber-400 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
                </div>
                <h4 class="font-heading font-bold text-lg text-white mb-2">Telas de Alto Desempeño</h4>
                <p class="text-xs sm:text-sm text-slate-400 leading-relaxed">
                    Algodón jersey peinado 24/1, denim pesado 14 oz, drill San Jacinto, ripstop antidesgarro y telas impermeables con filtro UV.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-slate-800/80 border border-slate-700/80 hover:border-amber-400 transition-all group">
                <div class="w-12 h-12 rounded-xl bg-amber-400/20 text-amber-400 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h4 class="font-heading font-bold text-lg text-white mb-2">Puntualidad en Entregas</h4>
                <p class="text-xs sm:text-sm text-slate-400 leading-relaxed">
                    Capacidad instalada para abastecer pedidos de gran escala y dotaciones urgentes sin comprometer la calidad de las costuras.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-slate-800/80 border border-slate-700/80 hover:border-amber-400 transition-all group">
                <div class="w-12 h-12 rounded-xl bg-amber-400/20 text-amber-400 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/></svg>
                </div>
                <h4 class="font-heading font-bold text-lg text-white mb-2">Despachos a Todo el Perú</h4>
                <p class="text-xs sm:text-sm text-slate-400 leading-relaxed">
                    Enviamos diariamente a través de Shalom, Marvisur y agencias autorizadas a campamentos y empresas de todo el territorio nacional.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- SECCIÓN DE CONTACTO & COTIZACIÓN RÁPIDA -->
<section class="py-16 bg-slate-100" id="contacto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-stretch">
            
            <!-- TARJETA EUTEX ATENCIÓN AL CLIENTE (Réplica Image 1) -->
            <div class="lg:col-span-5 bg-eutex-navy text-white rounded-3xl p-8 shadow-xl flex flex-col justify-between border-2 border-amber-400/40 relative overflow-hidden">
                <div class="absolute -right-10 -bottom-10 w-44 h-44 rounded-full bg-amber-400/10 blur-xl pointer-events-none"></div>

                <div>
                    <!-- Logo Card -->
                    <div class="flex items-center gap-3 pb-6 border-b border-white/10">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center shadow-lg">
                            <span class="font-serif italic font-extrabold text-2xl text-slate-950">ET</span>
                        </div>
                        <div>
                            <span class="font-heading font-black text-2xl tracking-wider text-white">EUTEX</span>
                            <span class="block text-xs uppercase font-semibold text-amber-400 -mt-1 tracking-widest">Uniformes Industriales</span>
                        </div>
                    </div>

                    <div class="mt-6 mb-8">
                        <span class="text-xs font-bold uppercase tracking-widest text-amber-400 block mb-1">
                            Atención al Cliente
                        </span>
                        <h3 class="font-heading font-black text-2xl text-white">
                            Canales Directos de Ventas
                        </h3>
                        <p class="text-xs text-slate-300 mt-2 leading-relaxed">
                            Póngase en contacto inmediato con nuestros ejecutivos para solicitar listas de precios al por mayor y muestras físicas.
                        </p>
                    </div>

                    <!-- Datos Image 1 -->
                    <div class="space-y-4 text-sm">
                        
                        <div class="flex items-center gap-4 p-3 rounded-2xl bg-white/5 border border-white/10">
                            <div class="w-10 h-10 rounded-xl bg-amber-400/20 text-amber-400 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div>
                                <span class="text-[10px] uppercase font-bold text-slate-400 block">Teléfono & WhatsApp</span>
                                <a href="tel:920783202" class="font-heading font-black text-lg text-white hover:text-amber-400 transition-colors">
                                    920 783 202
                                </a>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 p-3 rounded-2xl bg-white/5 border border-white/10">
                            <div class="w-10 h-10 rounded-xl bg-amber-400/20 text-amber-400 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <span class="text-[10px] uppercase font-bold text-slate-400 block">Correo Corporativo</span>
                                <a href="mailto:eutex@ventas.com" class="font-medium text-white hover:text-amber-400 transition-colors">
                                    eutex@ventas.com
                                </a>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 p-3 rounded-2xl bg-white/5 border border-white/10">
                            <div class="w-10 h-10 rounded-xl bg-amber-400/20 text-amber-400 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <span class="text-[10px] uppercase font-bold text-slate-400 block">Correo Alternativo</span>
                                <a href="mailto:e20huaccachi@gmail.com" class="font-medium text-white hover:text-amber-400 transition-colors">
                                    e20huaccachi@gmail.com
                                </a>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 p-3 rounded-2xl bg-white/5 border border-white/10">
                            <div class="w-10 h-10 rounded-xl bg-amber-400/20 text-amber-400 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <span class="text-[10px] uppercase font-bold text-slate-400 block">Ubicación y Talleres</span>
                                <span class="font-semibold text-white">Gamarra_Lima (La Victoria, Perú)</span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="mt-8 pt-4 border-t border-white/10 flex items-center justify-between">
                    <span class="text-xs text-slate-400">Atención personalizada</span>
                    <a href="https://wa.me/51920783202" target="_blank" class="px-4 py-2 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-white text-xs font-bold transition-colors">
                        Escribir a WhatsApp
                    </a>
                </div>
            </div>

            <!-- FORMULARIO DE COTIZACIÓN INTEGRADO -->
            <div class="lg:col-span-7 bg-white rounded-3xl p-8 sm:p-10 shadow-lg border border-slate-200">
                <div class="mb-6">
                    <span class="text-xs font-extrabold uppercase tracking-widest text-amber-600 bg-amber-50 px-3 py-1 rounded-full border border-amber-200">
                        Presupuesto Formal
                    </span>
                    <h3 class="font-heading font-black text-2xl text-slate-900 mt-2">
                        Solicite su Cotización Empresarial
                    </h3>
                    <p class="text-slate-600 text-xs sm:text-sm mt-1">
                        Complete el formulario y le enviaremos la cotización detallada con ficha técnica y tiempos de confección.
                    </p>
                </div>

                <form action="{{ route('quote.store') }}" method="POST" class="space-y-4">
                    @csrf
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Nombre y Apellidos *</label>
                            <input type="text" name="name" required placeholder="Ej. Juan Pérez" 
                                   class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Empresa / Razón Social</label>
                            <input type="text" name="company" placeholder="Ej. Minera del Sur S.A.C." 
                                   class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Teléfono / WhatsApp *</label>
                            <input type="tel" name="phone" required placeholder="920 000 000" 
                                   class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Correo Electrónico *</label>
                            <input type="email" name="email" required placeholder="correo@empresa.com" 
                                   class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Ciudad / Destino</label>
                            <input type="text" name="city" placeholder="Lima, Arequipa, etc." 
                                   class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Producto de Interés</label>
                            <select name="product_name" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none bg-white">
                                <option value="Polos Manga Larga Cuello Redondo">Polos Manga Larga (10 Colores)</option>
                                <option value="Chaleco de Seguridad Tipo Geólogo">Chalecos de Seguridad & Geólogo</option>
                                <option value="Pantalón Jean Industrial 14 oz">Jeans Industriales 14 oz</option>
                                <option value="Pantalón Cargo Industrial Drill">Pantalón Cargo en Drill</option>
                                <option value="Mameluco Industrial en Drill">Mamelucos & Overoles</option>
                                <option value="Casaca Térmica Minera">Casacas Térmicas Impermeables</option>
                                <option value="Dotación Integral EPP">Kit de Seguridad EPP</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Cantidad Estimada *</label>
                            <input type="number" name="quantity" min="1" value="24" required
                                   class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Detalles del Requerimiento</label>
                        <textarea name="message" rows="3" placeholder="Describa requerimientos de bordado de logo, colores específicos, cintas reflectivas..." 
                                  class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none"></textarea>
                    </div>

                    <button type="submit" 
                            class="w-full py-4 rounded-xl bg-gradient-to-r from-amber-400 via-amber-500 to-amber-600 hover:from-amber-300 hover:to-amber-500 text-slate-950 font-heading font-black text-base shadow-xl shadow-amber-500/25 transition-all flex items-center justify-center gap-2">
                        <svg class="w-5 h-5 text-slate-950" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        <span>Solicitar Cotización Inmediata</span>
                    </button>
                </form>
            </div>

        </div>

    </div>
</section>

<!-- BLOG & ARTÍCULOS TÉCNICOS PREVIEW -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-10">
            <div>
                <span class="text-xs font-extrabold uppercase tracking-widest text-amber-600 bg-amber-50 px-3 py-1 rounded-full border border-amber-200">
                    Conocimiento Técnico
                </span>
                <h2 class="font-heading font-black text-2xl sm:text-3xl text-slate-900 mt-2">
                    Blog de Seguridad Textil & Normativa
                </h2>
            </div>
            <a href="{{ route('blog.index') }}" class="text-sm font-bold text-eutex-navy hover:text-amber-600 flex items-center gap-1">
                <span>Ver todos los artículos</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($latestPosts as $post)
                <article class="bg-white rounded-2xl overflow-hidden border border-slate-200/90 shadow-sm hover:shadow-lg transition-all flex flex-col justify-between group">
                    <div>
                        <div class="relative h-48 overflow-hidden bg-slate-100">
                            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <span class="absolute top-3 left-3 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-eutex-navy text-amber-400 shadow">
                                {{ $post->category }}
                            </span>
                        </div>

                        <div class="p-6">
                            <div class="text-xs text-slate-400 mb-2 flex items-center gap-2">
                                <span>{{ $post->published_at ? $post->published_at->format('d M, Y') : 'Reciente' }}</span>
                                <span>•</span>
                                <span>{{ $post->read_time }} de lectura</span>
                            </div>

                            <h3 class="font-heading font-bold text-base text-slate-900 group-hover:text-amber-600 transition-colors line-clamp-2 mb-2">
                                <a href="{{ route('blog.show', $post->slug) }}">
                                    {{ $post->title }}
                                </a>
                            </h3>

                            <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed">
                                {{ $post->summary }}
                            </p>
                        </div>
                    </div>

                    <div class="p-6 pt-0">
                        <a href="{{ route('blog.show', $post->slug) }}" class="text-xs font-bold text-eutex-navy hover:text-amber-600 flex items-center gap-1">
                            Leer artículo completo &rarr;
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

    </div>
</section>

@endsection
