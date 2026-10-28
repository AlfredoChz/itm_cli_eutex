@extends('layouts.app')

@section('title', 'Servicios Textiles & Confección Industrial | EUTEX Gamarra')
@section('meta_description', 'Servicios integrales de confección de ropa de trabajo a medida, bordado computarizado de logotipos, serigrafía y asesoría en normas de seguridad laboral.')

@section('content')

<!-- HERO SERVICIOS -->
<div class="bg-eutex-navy text-white py-16 border-b border-white/10 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center max-w-3xl">
        <span class="text-xs font-bold uppercase tracking-widest text-amber-400 bg-white/10 px-3.5 py-1 rounded-full border border-white/20">
            Soluciones Integrales
        </span>
        <h1 class="font-heading font-black text-3xl sm:text-5xl text-white mt-4">
            Servicios Textiles & Confección
        </h1>
        <p class="text-slate-300 text-sm sm:text-base mt-3 leading-relaxed">
            Desde el diseño y patronaje técnico hasta la entrega final en obra: confeccionamos y personalizamos la dotación de su empresa con los más altos estándares del mercado.
        </p>
    </div>
</div>

<!-- SERVICIOS GRID -->
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($services as $index => $svc)
                <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm hover:shadow-xl transition-all space-y-6 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-2xl bg-amber-400 text-slate-950 flex items-center justify-center font-bold text-lg shadow-md">
                                0{{ $index + 1 }}
                            </div>
                            <h3 class="font-heading font-black text-xl text-slate-900">
                                {{ $svc['title'] }}
                            </h3>
                        </div>

                        <p class="text-sm text-slate-600 leading-relaxed mb-6">
                            {{ $svc['description'] }}
                        </p>

                        <div class="space-y-2.5">
                            <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block mb-2">Ventajas y Especificaciones:</span>
                            @foreach($svc['benefits'] as $b)
                                <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                    <svg class="w-4 h-4 text-emerald-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span>{{ $b }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="pt-6 border-t border-slate-100 flex items-center justify-between">
                        <button @click="$store.quoteCart.open()" class="text-xs font-bold text-amber-600 hover:text-amber-700 flex items-center gap-1">
                            <span>Solicitar este servicio</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                        <a href="https://wa.me/51920783202?text={{ urlencode('Hola EUTEX, deseo información sobre el servicio: ' . $svc['title']) }}" 
                           target="_blank"
                           class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold shadow transition-colors">
                            Consultar WhatsApp
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- REQUERIMIENTO ESPECIAL -->
<section class="py-16 bg-white border-t border-slate-200">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-6">
        <span class="text-xs font-bold uppercase tracking-widest text-amber-600 bg-amber-50 px-3 py-1 rounded-full border border-amber-200">
            Confecciones Personalizadas
        </span>
        <h2 class="font-heading font-black text-2xl sm:text-3xl text-slate-900">
            ¿Requiere un modelo específico o licitación pública?
        </h2>
        <p class="text-sm text-slate-600 leading-relaxed max-w-xl mx-auto">
            Trabajamos con bases de licitación, fichas técnicas específicas del cliente, colocación de reflectivos homologados y confección de muestras aprobatorias antes del lote completo.
        </p>

        <div class="pt-4 flex flex-wrap justify-center gap-4">
            <button @click="$store.quoteCart.open()" class="px-8 py-3.5 rounded-xl bg-eutex-navy hover:bg-eutex-navy-light text-white font-heading font-bold text-sm shadow-md">
                Enviar Términos de Referencia
            </button>
            <a href="tel:920783202" class="px-8 py-3.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-900 font-heading font-bold text-sm">
                Llamar a Central: 920 783 202
            </a>
        </div>
    </div>
</section>

@endsection
