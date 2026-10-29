@extends('layouts.app')

@section('title', 'Contáctanos | EUTEX Uniformes Industriales Gamarra')
@section('meta_description', 'Comuníquese con el equipo de ventas de EUTEX: Teléfono 920783202, correos eutex@ventas.com y e20huaccachi@gmail.com. Talleres de confección en Gamarra, Lima.')

@section('content')

<!-- HERO CONTACTO -->
<div class="bg-eutex-navy text-white py-14 border-b border-white/10 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center max-w-3xl">
        <span class="text-xs font-bold uppercase tracking-widest text-amber-400 bg-white/10 px-3.5 py-1 rounded-full border border-white/20">
            Canales Oficiales
        </span>
        <h1 class="font-heading font-black text-3xl sm:text-5xl text-white mt-4">
            Contáctenos
        </h1>
        <p class="text-slate-300 text-sm sm:text-base mt-3 leading-relaxed">
            Estamos a su entera disposición para responder consultas sobre catálogos, cotizaciones por volumen, muestras de telas y plazos de entrega.
        </p>
    </div>
</div>

<div class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <!-- COLUMNA IZQUIERDA: TARJETA DE ATENCIÓN AL CLIENTE (IMAGE 1) -->
            <div class="lg:col-span-5 space-y-6">
                
                <div class="bg-eutex-navy text-white rounded-3xl p-8 shadow-xl border-2 border-amber-400/40 relative overflow-hidden">
                    <div class="absolute -right-8 -bottom-8 w-40 h-40 rounded-full bg-amber-400/10 blur-xl pointer-events-none"></div>

                    <!-- Logo EUTEX -->
                    <div class="flex items-center gap-3 pb-6 border-b border-white/10">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center shadow-lg">
                            <span class="font-serif italic font-extrabold text-2xl text-slate-950">ET</span>
                        </div>
                        <div>
                            <span class="font-heading font-black text-2xl tracking-wider text-white">EUTEX</span>
                            <span class="block text-xs uppercase font-semibold text-amber-400 -mt-1 tracking-widest">Uniformes Industriales</span>
                        </div>
                    </div>

                    <div class="my-6">
                        <span class="text-xs font-bold uppercase tracking-widest text-amber-400 block mb-1">
                            Atención al Cliente
                        </span>
                        <h3 class="font-heading font-black text-2xl text-white">
                            Datos de Contacto Directo
                        </h3>
                    </div>

                    <div class="space-y-4 text-sm">
                        
                        <!-- Teléfono / WhatsApp -->
                        <div class="flex items-center gap-4 p-3.5 rounded-2xl bg-white/5 border border-white/10">
                            <div class="w-10 h-10 rounded-xl bg-amber-400/20 text-amber-400 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div>
                                <span class="text-[10px] uppercase font-bold text-slate-400 block">Teléfono / WhatsApp</span>
                                <a href="tel:{{ preg_replace('/[^0-9]/', '', setting('contact_phone', '920783202')) }}" class="font-heading font-black text-lg text-white hover:text-amber-400 transition-colors">
                                    {{ setting('contact_phone', '920 783 202') }}
                                </a>
                            </div>
                        </div>

                        <!-- Email Ventas -->
                        <div class="flex items-center gap-4 p-3.5 rounded-2xl bg-white/5 border border-white/10">
                            <div class="w-10 h-10 rounded-xl bg-amber-400/20 text-amber-400 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <span class="text-[10px] uppercase font-bold text-slate-400 block">Correo de Ventas</span>
                                <a href="mailto:{{ setting('contact_email', 'eutex@ventas.com') }}" class="font-medium text-white hover:text-amber-400 transition-colors">
                                    {{ setting('contact_email', 'eutex@ventas.com') }}
                                </a>
                            </div>
                        </div>

                        <!-- Email Alternativo -->
                        <div class="flex items-center gap-4 p-3.5 rounded-2xl bg-white/5 border border-white/10">
                            <div class="w-10 h-10 rounded-xl bg-amber-400/20 text-amber-400 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <span class="text-[10px] uppercase font-bold text-slate-400 block">Correo de Atención</span>
                                <a href="mailto:e20huaccachi@gmail.com" class="font-medium text-white hover:text-amber-400 transition-colors">
                                    e20huaccachi@gmail.com
                                </a>
                            </div>
                        </div>

                        <!-- Ubicación -->
                        <div class="flex items-center gap-4 p-3.5 rounded-2xl bg-white/5 border border-white/10">
                            <div class="w-10 h-10 rounded-xl bg-amber-400/20 text-amber-400 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <span class="text-[10px] uppercase font-bold text-slate-400 block">Ubicación y Talleres</span>
                                <span class="font-semibold text-white">{{ setting('contact_address', 'Gamarra, La Victoria, Lima - Perú') }}</span>
                            </div>
                        </div>

                    </div>

                    <div class="mt-8 pt-4 border-t border-white/10 flex items-center justify-between">
                        <span class="text-xs text-slate-400">{{ setting('contact_schedule', 'Lun - Sáb: 8:00 AM - 7:00 PM') }}</span>
                        <a href="https://wa.me/{{ setting('contact_whatsapp', '51920783202') }}?text={{ urlencode(setting('contact_whatsapp_text', 'Hola EUTEX, deseo información y cotización.')) }}" target="_blank" class="px-4 py-2 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-white text-xs font-bold transition-colors">
                            WhatsApp Directo
                        </a>
                    </div>
                </div>

                <!-- Banner Image de Contacto -->
                <div class="rounded-3xl overflow-hidden border border-slate-200 shadow-sm bg-white p-2">
                    <img src="{{ asset('images/eutex/tarjeta_contacto.png') }}" alt="Tarjeta EUTEX" class="w-full h-auto rounded-2xl">
                </div>

            </div>

            <!-- COLUMNA DERECHA: FORMULARIO DE CONSULTA & MAPA -->
            <div class="lg:col-span-7 space-y-8">
                
                <div class="bg-white rounded-3xl p-8 sm:p-10 border border-slate-200 shadow-sm">
                    <div class="mb-6">
                        <span class="text-xs font-bold uppercase tracking-widest text-amber-600 bg-amber-50 px-3 py-1 rounded-full border border-amber-200">
                            Escríbanos
                        </span>
                        <h2 class="font-heading font-black text-2xl text-slate-900 mt-2">
                            Envíenos su Consulta o Requerimiento
                        </h2>
                        <p class="text-slate-600 text-xs sm:text-sm mt-1">
                            Responderemos su mensaje el mismo día hábil con la información solicitada.
                        </p>
                    </div>

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                        @csrf
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Nombre Completo *</label>
                                <input type="text" name="name" required placeholder="Ej. Roberto Sánchez" 
                                       class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Empresa / Razón Social</label>
                                <input type="text" name="company" placeholder="Ej. Constructora Andina" 
                                       class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Correo Electrónico *</label>
                                <input type="email" name="email" required placeholder="correo@empresa.com" 
                                       class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Teléfono de Contacto</label>
                                <input type="tel" name="phone" placeholder="920 000 000" 
                                       class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Asunto</label>
                            <input type="text" name="subject" placeholder="Consulta sobre uniformes para minería / dotación de personal" 
                                   class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Mensaje / Detalle de la Solicitud *</label>
                            <textarea name="message" rows="4" required placeholder="Describa el tipo de prendas requeridas, cantidades, tallas o cualquier consulta técnica..." 
                                      class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none"></textarea>
                        </div>

                        <button type="submit" 
                                class="w-full py-4 rounded-xl bg-eutex-navy hover:bg-eutex-navy-light text-white font-heading font-black text-sm shadow-lg transition-all flex items-center justify-center gap-2">
                            <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                            <span>Enviar Mensaje a EUTEX</span>
                        </button>
                    </form>
                </div>

                <!-- MAPA DE UBICACIÓN GAMARRA, LIMA -->
                <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-heading font-bold text-base text-slate-900">Ubicación de Nuestros Talleres</h3>
                            <p class="text-xs text-slate-500">Jr. Gamarra, La Victoria, Lima - Perú</p>
                        </div>
                        <a href="https://maps.google.com/?q=Gamarra+La+Victoria+Lima" target="_blank" class="text-xs font-bold text-amber-600 hover:underline">
                            Ver en Google Maps &rarr;
                        </a>
                    </div>
                    
                    <div class="h-64 rounded-2xl overflow-hidden border border-slate-200 shadow-inner">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.6967735398246!2d-77.0163351!3d-12.0643759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8a2c20626b1%3A0xe54d6fa7c24a737f!2sGamarra%2C%20La%20Victoria!5e0!3m2!1ses!2spe!4v1700000000000!5m2!1ses!2spe" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

@endsection
