@extends('layouts.app')

@section('title', 'Sobre Nosotros | EUTEX Uniformes Industriales Gamarra')
@section('meta_description', 'Conozca la historia, infraestructura y valores de EUTEX: taller de confección textil líder en uniformes industriales, ropa de trabajo y EPP en Gamarra, Lima.')

@section('content')

<!-- HERO NOSOTROS -->
<div class="bg-eutex-navy text-white py-16 border-b border-white/10 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center max-w-3xl">
        <span class="text-xs font-bold uppercase tracking-widest text-amber-400 bg-white/10 px-3.5 py-1 rounded-full border border-white/20">
            Nuestra Empresa
        </span>
        <h1 class="font-heading font-black text-3xl sm:text-5xl text-white mt-4">
            EUTEX Uniformes Industriales
        </h1>
        <p class="text-slate-300 text-sm sm:text-base mt-3 leading-relaxed">
            Más de 10 años confeccionando prendas de alta durabilidad, seguridad y ergonomía textil desde el corazón productivo de Gamarra, Lima para todo el Perú.
        </p>
    </div>
</div>

<!-- HISTORIA & PROPÓSITO -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-6 space-y-5">
                <span class="text-xs font-bold uppercase tracking-wider text-amber-600 bg-amber-50 px-3 py-1 rounded-full border border-amber-200">
                    Trayectoria y Compromiso
                </span>
                <h2 class="font-heading font-black text-2xl sm:text-3xl text-slate-900 leading-tight">
                    Pasión por la confección de alta resistencia
                </h2>
                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    <strong>EUTEX</strong> nació con un propósito claro: dotar a la fuerza trabajadora del Perú con indumentaria industrial de máxima calidad, capaz de resistir las condiciones más extremas de minería, construcción y manufactura, sin sacrificar confort ni diseño.
                </p>
                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    Nuestros talleres propios en <strong>Gamarra, La Victoria</strong> cuentan con maquinaria de última generación para patronaje, corte de precisión, confección con costura de cadeneta reforzada y bordado computarizado. Esta integración vertical nos permite ofrecer precios competitivos de fabricante directo y plazos de entrega estrictos.
                </p>

                <div class="grid grid-cols-2 gap-4 pt-4">
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                        <div class="font-heading font-black text-2xl text-eutex-navy">+10 Años</div>
                        <div class="text-xs text-slate-500 font-semibold mt-1">Liderazgo en confección textil industrial</div>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                        <div class="font-heading font-black text-2xl text-amber-600">100% Gamarra</div>
                        <div class="text-xs text-slate-500 font-semibold mt-1">Producción nacional de alto nivel</div>
                    </div>
                </div>
            </div>

            <!-- Banner Visual Card -->
            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-2xl border-2 border-slate-100 bg-slate-900">
                    <img src="{{ asset('images/eutex/tarjeta_contacto.png') }}" 
                         alt="EUTEX Uniformes Industriales" 
                         class="w-full h-auto object-cover">
                </div>
            </div>

        </div>
    </div>
</section>

<!-- MISIÓN, VISIÓN Y VALORES -->
<section class="py-16 bg-slate-50 border-y border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            
            <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-700 flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="font-heading font-black text-2xl text-slate-900">Nuestra Misión</h3>
                <p class="text-sm text-slate-600 leading-relaxed">
                    Confeccionar y suministrar uniformes industriales y prendas de alta visibilidad que brinden máxima protección física, durabilidad y bienestar a los trabajadores del Perú, impulsando la productividad de las empresas mediante indumentaria certificada y personalizada.
                </p>
            </div>

            <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-700 flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
                <h3 class="font-heading font-black text-2xl text-slate-900">Nuestra Visión</h3>
                <p class="text-sm text-slate-600 leading-relaxed">
                    Ser reconocidos a nivel nacional como la empresa textil líder y de referencia indiscutible en uniformes industriales, ropa técnica y dotación de seguridad en el Perú, destacando por nuestra capacidad de innovación en telas y excelencia en el servicio al cliente.
                </p>
            </div>

        </div>

        <!-- Valores Corporativos -->
        <div class="text-center max-w-2xl mx-auto mb-8">
            <h3 class="font-heading font-black text-2xl text-slate-900">Nuestros Valores Fundamentales</h3>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-2xl border border-slate-200 text-center space-y-2">
                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center mx-auto font-bold">✓</div>
                <h4 class="font-heading font-bold text-base text-slate-900">Calidad Superior</h4>
                <p class="text-xs text-slate-500">Seleccionamos únicamente hilados de algodón peinado y telas de alto gramaje.</p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200 text-center space-y-2">
                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center mx-auto font-bold">🛡</div>
                <h4 class="font-heading font-bold text-base text-slate-900">Seguridad Ante Todo</h4>
                <p class="text-xs text-slate-500">Cintas reflectivas 3M y costuras reforzadas que garantizan la protección en obra.</p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200 text-center space-y-2">
                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center mx-auto font-bold">⏱</div>
                <h4 class="font-heading font-bold text-base text-slate-900">Puntualidad Absoluta</h4>
                <p class="text-xs text-slate-500">Cumplimos estrictamente los cronogramas de entrega para evitar paradas operativas.</p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200 text-center space-y-2">
                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center mx-auto font-bold">🤝</div>
                <h4 class="font-heading font-bold text-base text-slate-900">Atención Personalizada</h4>
                <p class="text-xs text-slate-500">Asesoramos personalmente a cada empresa para optimizar su presupuesto.</p>
            </div>
        </div>

    </div>
</section>

<!-- CTA -->
<section class="py-16 bg-eutex-navy text-white text-center">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="font-heading font-black text-2xl sm:text-3xl text-white">
            ¿Listo para equipar a su equipo con uniformes de alta calidad?
        </h2>
        <p class="text-slate-300 text-sm sm:text-base mt-2 max-w-xl mx-auto">
            Visítenos en nuestros talleres en Gamarra, Lima o solicite una cotización inmediata a través de WhatsApp.
        </p>
        <div class="mt-8 flex flex-wrap justify-center gap-4">
            <button @click="$store.quoteCart.open()" class="px-8 py-3.5 rounded-xl bg-amber-400 hover:bg-amber-300 text-slate-950 font-heading font-black text-sm shadow-xl">
                Solicitar Cotización Empresarial
            </button>
            <a href="https://wa.me/51920783202" target="_blank" class="px-8 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-heading font-bold text-sm shadow-xl">
                Contactar por WhatsApp: 920 783 202
            </a>
        </div>
    </div>
</section>

@endsection
