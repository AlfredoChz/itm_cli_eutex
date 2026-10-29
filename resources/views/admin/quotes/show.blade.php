@extends('admin.layouts.app')

@section('title', 'Cotización #' . $quote->id)
@section('header_title', 'Detalle de Solicitud #' . $quote->id)
@section('header_subtitle', 'Recibida el ' . $quote->created_at->format('d/m/Y \a \l\a\s h:i A'))

@section('header_action')
    <a href="{{ route('admin.quotes.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 border border-slate-300 transition-colors">
        &larr; Volver
    </a>
@endsection

@section('content')
<div class="max-w-4xl mx-auto space-y-4 sm:space-y-6">

    @php
        $waText = "Hola {$quote->name}, nos comunicamos de EUTEX Uniformes Industriales con relación a su solicitud de cotización para {$quote->product_name} por una cantidad de {$quote->quantity} unidades. ¿Cómo podemos atender su requerimiento?";
        $cleanPhone = preg_replace('/[^0-9]/', '', $quote->phone);
        if (strlen($cleanPhone) === 9) $cleanPhone = '51' . $cleanPhone;
    @endphp

    <!-- ACTION HEADER CARD (TOUCH-FRIENDLY PARA CELULARES) -->
    <div class="bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 p-5 sm:p-6 rounded-2xl sm:rounded-3xl text-white shadow-xl border border-slate-800 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <span class="text-[10px] sm:text-xs font-bold uppercase tracking-wider text-orange-400">Canal de Respuesta Inmediata</span>
            <h2 class="text-lg sm:text-xl font-bold mt-1 text-white">Atender a {{ $quote->name }}</h2>
            <p class="text-xs text-slate-300 mt-0.5">Conéctate al instante con el cliente para confirmar presupuesto y entrega</p>
        </div>

        <div class="flex items-center gap-2.5 w-full sm:w-auto">
            <a href="https://wa.me/{{ $cleanPhone }}?text={{ urlencode($waText) }}" 
               target="_blank"
               class="flex-1 sm:flex-initial inline-flex items-center justify-center gap-2 py-3 px-5 rounded-2xl bg-emerald-600 active:bg-emerald-700 hover:bg-emerald-500 text-white font-bold text-xs sm:text-sm shadow-lg shadow-emerald-600/30 transition-all">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2z"/></svg>
                <span>Chatear por WhatsApp</span>
            </a>
            
            <a href="tel:{{ $quote->phone }}" 
               class="p-3 rounded-2xl bg-slate-800 active:bg-slate-700 text-white border border-slate-700 transition-colors"
               title="Llamar por Teléfono">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
            </a>

            <a href="mailto:{{ $quote->email }}?subject={{ urlencode('Cotización EUTEX - ' . ($quote->product_name ?? 'Uniformes Industriales')) }}" 
               class="p-3 rounded-2xl bg-slate-800 active:bg-slate-700 text-white border border-slate-700 transition-colors"
               title="Enviar Email">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 sm:gap-6">

        <!-- DETALLES DEL CLIENTE (1 COLUMNA) -->
        <div class="bg-white p-5 sm:p-6 rounded-2xl sm:rounded-3xl border border-slate-200/90 shadow-xs space-y-4">
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 border-b border-slate-100 pb-3">Datos del Cliente</h3>

            <div>
                <span class="text-[11px] text-slate-400 block">Nombre Completo</span>
                <p class="font-bold text-slate-900 text-sm mt-0.5">{{ $quote->name }}</p>
            </div>

            <div>
                <span class="text-[11px] text-slate-400 block">Empresa / Razón Social</span>
                <p class="font-bold text-slate-800 text-sm mt-0.5">{{ $quote->company ?? 'No especificado (Particular)' }}</p>
            </div>

            @if($quote->ruc)
                <div>
                    <span class="text-[11px] text-slate-400 block">Número de RUC</span>
                    <p class="font-mono font-bold text-slate-800 text-sm mt-0.5">{{ $quote->ruc }}</p>
                </div>
            @endif

            <div>
                <span class="text-[11px] text-slate-400 block">Teléfono / WhatsApp</span>
                <p class="font-mono font-bold text-slate-900 text-sm mt-0.5">{{ $quote->phone }}</p>
            </div>

            <div>
                <span class="text-[11px] text-slate-400 block">Correo Electrónico</span>
                <p class="text-slate-800 text-xs mt-0.5 break-all">{{ $quote->email }}</p>
            </div>

            @if($quote->city)
                <div>
                    <span class="text-[11px] text-slate-400 block">Ciudad / Destino</span>
                    <p class="font-semibold text-slate-800 text-xs mt-0.5">📍 {{ $quote->city }}</p>
                </div>
            @endif

            <!-- CAMBIO DE ESTADO -->
            <div class="pt-4 border-t border-slate-100">
                <span class="text-[11px] font-bold text-slate-600 block mb-2">Estado de la Solicitud</span>
                <form method="POST" action="{{ route('admin.quotes.status', $quote) }}">
                    @csrf
                    @method('PATCH')
                    <div class="flex gap-2">
                        <select name="status" class="w-full px-3 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-xs font-bold focus:ring-2 focus:ring-orange-500 focus:outline-none">
                            <option value="pending" {{ $quote->status === 'pending' ? 'selected' : '' }}>Pendiente</option>
                            <option value="contacted" {{ $quote->status === 'contacted' ? 'selected' : '' }}>Contactado</option>
                            <option value="closed" {{ $quote->status === 'closed' ? 'selected' : '' }}>Atendido</option>
                        </select>
                        <button type="submit" class="px-4 py-2.5 bg-slate-900 active:bg-slate-800 text-white font-bold text-xs rounded-xl shrink-0">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- REQUERIMIENTO DEL PRODUCTO (2 COLUMNAS) -->
        <div class="md:col-span-2 bg-white p-5 sm:p-6 rounded-2xl sm:rounded-3xl border border-slate-200/90 shadow-xs space-y-5">
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 border-b border-slate-100 pb-3">Prenda & Requerimiento</h3>

            <!-- PRODUCTO CARD -->
            <div class="flex items-start gap-3 sm:gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-200">
                <div class="w-16 h-16 rounded-xl bg-white border border-slate-200 overflow-hidden shrink-0 flex items-center justify-center">
                    @if($quote->product && $quote->product->image)
                        <img src="{{ asset($quote->product->image) }}" alt="{{ $quote->product_name }}" class="w-full h-full object-cover">
                    @else
                        <svg class="w-8 h-8 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    @endif
                </div>

                <div class="flex-1 min-w-0">
                    <h4 class="font-bold text-slate-900 text-sm sm:text-base leading-snug">{{ $quote->product_name ?? 'Solicitud General' }}</h4>
                    <div class="flex flex-wrap items-center gap-2 mt-1.5 text-xs">
                        <span class="font-bold text-orange-600 bg-orange-50 px-2 py-0.5 rounded-md">
                            Cantidad: {{ $quote->quantity }} unidades
                        </span>
                        @if($quote->product)
                            <a href="{{ route('products.show', $quote->product->slug) }}" target="_blank" class="text-blue-600 hover:underline font-semibold">
                                Ver ficha técnica &rarr;
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- MENSAJE / ESPECIFICACIONES DEL CLIENTE -->
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500 block mb-2">
                    Detalles Adicionales del Cliente:
                </span>
                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 text-slate-800 text-xs sm:text-sm whitespace-pre-line leading-relaxed">
                    {{ $quote->message ?: 'El cliente no especificó requerimientos adicionales (pedido estándar).' }}
                </div>
            </div>

            <!-- ZONA DE ELIMINAR -->
            <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs">
                <span class="text-slate-400">ID de registro: #{{ $quote->id }}</span>
                <form method="POST" action="{{ route('admin.quotes.destroy', $quote) }}" onsubmit="return confirm('¿Seguro que deseas eliminar esta cotización?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-rose-600 hover:text-rose-800 font-bold p-1">
                        Eliminar cotización
                    </button>
                </form>
            </div>
        </div>

    </div>

</div>
@endsection
