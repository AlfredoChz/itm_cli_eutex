@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('header_title', 'Dashboard')
@section('header_subtitle', 'Resumen general de tu tienda, catálogo y ventas')

@section('header_action')
    <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl text-xs font-bold text-white bg-orange-600 hover:bg-orange-500 shadow-md shadow-orange-600/30 transition-all active:scale-95">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
        </svg>
        <span class="hidden sm:inline">Nuevo Producto</span>
        <span class="sm:hidden">Crear</span>
    </a>
@endsection

@section('content')
<div class="space-y-5 sm:space-y-6">

    <!-- HERO BANNER BIENVENIDA -->
    <div class="relative overflow-hidden bg-gradient-to-br from-slate-950 via-slate-900 to-blue-950 p-5 sm:p-7 rounded-2xl sm:rounded-3xl text-white shadow-xl border border-slate-800">
        <!-- Decoración de fondo -->
        <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-orange-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute right-20 -top-10 w-32 h-32 bg-blue-500/10 rounded-full blur-2xl pointer-events-none"></div>

        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black uppercase tracking-wider bg-orange-600/30 text-orange-400 border border-orange-500/30">
                        EUTEX Uniformes
                    </span>
                    <span class="text-xs text-slate-400 hidden sm:inline">|</span>
                    <span class="text-xs text-slate-400 font-medium">{{ now()->translatedFormat('l, d \d\e F \d\e Y') }}</span>
                </div>
                <h2 class="text-xl sm:text-2xl font-black tracking-tight text-white">
                    ¡Hola, {{ auth()->user()->name ?? 'Administrador' }}! 👋
                </h2>
                <p class="text-xs sm:text-sm text-slate-300 mt-1 max-w-xl">
                    @if($stats['pending_quotes'] > 0)
                        Tienes <strong class="text-orange-400">{{ $stats['pending_quotes'] }} cotizaciones pendientes</strong> por atender. Responde a tus clientes vía WhatsApp con un solo toque.
                    @else
                        Todas las cotizaciones se encuentran al día. Tu catálogo cuenta con <strong class="text-orange-400">{{ $stats['total_products'] }} prendas</strong> publicadas.
                    @endif
                </p>
            </div>

            <!-- Botones de Acción Directa en Banner -->
            <div class="flex items-center gap-2.5 shrink-0 pt-2 md:pt-0">
                <a href="{{ route('admin.quotes.index', ['status' => 'pending']) }}" class="flex-1 sm:flex-initial inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-orange-600 hover:bg-orange-500 text-white font-bold text-xs shadow-lg shadow-orange-600/40 transition-all active:scale-95">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span>Cotizaciones ({{ $stats['pending_quotes'] }})</span>
                </a>
                <a href="{{ route('home') }}" target="_blank" class="p-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-white border border-white/10 transition-colors" title="Visitar Sitio Web">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- TARJETAS DE MÉTRICAS (2 COLUMNAS EN MÓVIL, 4 EN ESCRITORIO) -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
        <!-- 1. PRODUCTOS -->
        <a href="{{ route('admin.products.index') }}" class="group bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/90 shadow-xs hover:border-orange-500/50 hover:shadow-md transition-all active:scale-98">
            <div class="flex items-center justify-between mb-2">
                <span class="text-[10px] sm:text-xs font-bold uppercase tracking-wider text-slate-400 group-hover:text-orange-600 transition-colors">Productos</span>
                <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center shrink-0">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
            </div>
            <h3 class="text-2xl sm:text-3xl font-black text-slate-900 leading-none">{{ $stats['total_products'] }}</h3>
            <p class="text-[11px] text-slate-500 mt-2 truncate">
                <span class="font-bold text-orange-600">{{ $stats['featured_products'] }}</span> destacados
            </p>
        </a>

        <!-- 2. COTIZACIONES -->
        <a href="{{ route('admin.quotes.index') }}" class="group bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/90 shadow-xs hover:border-amber-500/50 hover:shadow-md transition-all active:scale-98">
            <div class="flex items-center justify-between mb-2">
                <span class="text-[10px] sm:text-xs font-bold uppercase tracking-wider text-slate-400 group-hover:text-amber-600 transition-colors">Cotizaciones</span>
                <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>
            <h3 class="text-2xl sm:text-3xl font-black text-slate-900 leading-none">{{ $stats['total_quotes'] }}</h3>
            <p class="text-[11px] mt-2 truncate">
                @if($stats['pending_quotes'] > 0)
                    <span class="font-bold text-amber-600 bg-amber-50 px-1.5 py-0.5 rounded">{{ $stats['pending_quotes'] }} pendientes</span>
                @else
                    <span class="text-emerald-600 font-medium">Al día</span>
                @endif
            </p>
        </a>

        <!-- 3. CATEGORÍAS -->
        <a href="{{ route('admin.categories.index') }}" class="group bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/90 shadow-xs hover:border-blue-500/50 hover:shadow-md transition-all active:scale-98">
            <div class="flex items-center justify-between mb-2">
                <span class="text-[10px] sm:text-xs font-bold uppercase tracking-wider text-slate-400 group-hover:text-blue-600 transition-colors">Líneas Textil</span>
                <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                </div>
            </div>
            <h3 class="text-2xl sm:text-3xl font-black text-slate-900 leading-none">{{ $stats['total_categories'] }}</h3>
            <p class="text-[11px] text-slate-500 mt-2 truncate">Sectores activos</p>
        </a>

        <!-- 4. MENSAJES -->
        <a href="{{ route('admin.messages.index') }}" class="group bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/90 shadow-xs hover:border-emerald-500/50 hover:shadow-md transition-all active:scale-98">
            <div class="flex items-center justify-between mb-2">
                <span class="text-[10px] sm:text-xs font-bold uppercase tracking-wider text-slate-400 group-hover:text-emerald-600 transition-colors">Mensajes</span>
                <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <h3 class="text-2xl sm:text-3xl font-black text-slate-900 leading-none">{{ $stats['total_messages'] }}</h3>
            <p class="text-[11px] mt-2 truncate">
                @if($stats['unread_messages'] > 0)
                    <span class="font-bold text-rose-600 bg-rose-50 px-1.5 py-0.5 rounded">{{ $stats['unread_messages'] }} nuevos</span>
                @else
                    <span class="text-slate-400">Sin nuevos</span>
                @endif
            </p>
        </a>
    </div>

    <!-- SECCIÓN DE 2 COLUMNAS: COTIZACIONES RECIENTES & MENSAJES -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 sm:gap-6">
        
        <!-- COTIZACIONES RECIENTES (2 COLUMNAS) -->
        <div class="lg:col-span-2 bg-white rounded-2xl sm:rounded-3xl border border-slate-200/90 shadow-xs overflow-hidden">
            <div class="p-4 sm:p-5 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-slate-900 text-sm sm:text-base">Últimas Solicitudes de Cotización</h3>
                    <p class="text-[11px] sm:text-xs text-slate-500">Responde directo por WhatsApp con un clic</p>
                </div>
                <a href="{{ route('admin.quotes.index') }}" class="text-xs font-bold text-orange-600 hover:text-orange-700 flex items-center gap-1">
                    <span>Ver todas</span>
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            @if($recentQuotes->count() > 0)
                <!-- VISTA MÓVIL (TARJETAS TOUCH-FRIENDLY PARA CELULAR) -->
                <div class="block md:hidden divide-y divide-slate-100">
                    @foreach($recentQuotes as $quote)
                        @php
                            $waText = "Hola {$quote->name}, nos comunicamos de EUTEX Uniformes Industriales con respecto a tu solicitud de cotización para {$quote->product_name} ({$quote->quantity} und). ¿En qué podemos asesorarte?";
                            $cleanPhone = preg_replace('/[^0-9]/', '', $quote->phone);
                            if (strlen($cleanPhone) === 9) $cleanPhone = '51' . $cleanPhone;
                        @endphp
                        <div class="p-4 space-y-3 hover:bg-slate-50/60 transition-colors">
                            <div class="flex items-start justify-between gap-2">
                                <div class="min-w-0">
                                    <div class="flex items-center gap-2">
                                        <h4 class="font-bold text-slate-900 text-sm truncate">{{ $quote->name }}</h4>
                                        <span class="text-[10px] font-mono font-bold text-slate-400">#{{ $quote->id }}</span>
                                    </div>
                                    <p class="text-xs text-slate-500 truncate mt-0.5">
                                        {{ $quote->company ?: 'Particular' }} • {{ $quote->phone }}
                                    </p>
                                </div>

                                <!-- Badge Estado -->
                                <div>
                                    @if($quote->status === 'pending')
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-100 text-amber-800">
                                            Pendiente
                                        </span>
                                    @elseif($quote->status === 'contacted')
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-100 text-blue-800">
                                            Contactado
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">
                                            Atendido
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Prenda solicitada -->
                            <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center justify-between text-xs">
                                <span class="font-semibold text-slate-800 truncate">{{ $quote->product_name ?? 'Cotización General' }}</span>
                                <span class="font-bold text-orange-600 shrink-0 ml-2">{{ $quote->quantity }} und.</span>
                            </div>

                            <!-- Botones Acción Móvil -->
                            <div class="flex items-center gap-2 pt-1">
                                <a href="https://wa.me/{{ $cleanPhone }}?text={{ urlencode($waText) }}" 
                                   target="_blank"
                                   class="flex-1 inline-flex items-center justify-center gap-2 py-2 px-3 rounded-xl bg-emerald-600 active:bg-emerald-700 text-white font-bold text-xs shadow-xs transition-colors">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2z"/></svg>
                                    <span>WhatsApp</span>
                                </a>
                                <a href="{{ route('admin.quotes.show', $quote) }}" 
                                   class="px-3.5 py-2 rounded-xl bg-slate-100 text-slate-700 font-bold text-xs hover:bg-slate-200 transition-colors">
                                    Detalle
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- VISTA ESCRITORIO (TABLA TRADICIONAL) -->
                <div class="hidden md:block overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead class="bg-slate-50 text-slate-500 font-bold uppercase tracking-wider border-b border-slate-100">
                            <tr>
                                <th class="py-3 px-4">Cliente / Empresa</th>
                                <th class="py-3 px-4">Producto Solicitado</th>
                                <th class="py-3 px-4">Cant.</th>
                                <th class="py-3 px-4">Estado</th>
                                <th class="py-3 px-4 text-right">Acción</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($recentQuotes as $quote)
                                @php
                                    $waText = "Hola {$quote->name}, nos comunicamos de EUTEX Uniformes Industriales sobre tu cotización de {$quote->product_name} ({$quote->quantity} und).";
                                    $cleanPhone = preg_replace('/[^0-9]/', '', $quote->phone);
                                    if (strlen($cleanPhone) === 9) $cleanPhone = '51' . $cleanPhone;
                                @endphp
                                <tr class="hover:bg-slate-50/70 transition-colors">
                                    <td class="py-3.5 px-4">
                                        <p class="font-bold text-slate-900">{{ $quote->name }}</p>
                                        <p class="text-[11px] text-slate-500">{{ $quote->company ?? 'Particular' }} • {{ $quote->phone }}</p>
                                    </td>
                                    <td class="py-3.5 px-4">
                                        <span class="font-medium text-slate-800">{{ $quote->product_name ?? 'Cotización General' }}</span>
                                    </td>
                                    <td class="py-3.5 px-4 font-bold text-slate-700">
                                        {{ $quote->quantity }} und.
                                    </td>
                                    <td class="py-3.5 px-4">
                                        @if($quote->status === 'pending')
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-100 text-amber-800">
                                                Pendiente
                                            </span>
                                        @elseif($quote->status === 'contacted')
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-100 text-blue-800">
                                                Contactado
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">
                                                Atendido
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-3.5 px-4 text-right">
                                        <div class="flex items-center justify-end gap-1.5">
                                            <a href="https://wa.me/{{ $cleanPhone }}?text={{ urlencode($waText) }}" 
                                               target="_blank" 
                                               title="Responder por WhatsApp"
                                               class="p-2 rounded-xl bg-emerald-50 text-emerald-700 hover:bg-emerald-600 hover:text-white transition-colors">
                                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2z"/></svg>
                                            </a>
                                            <a href="{{ route('admin.quotes.show', $quote) }}" class="p-2 rounded-xl bg-slate-100 text-slate-700 hover:bg-slate-200 transition-colors" title="Ver Detalles">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="p-8 text-center text-slate-400">
                    <p class="text-xs sm:text-sm">No hay solicitudes de cotización registradas todavía.</p>
                </div>
            @endif
        </div>

        <!-- MENSAJES DE CONTACTO RECIENTES (1 COLUMNA) -->
        <div class="bg-white rounded-2xl sm:rounded-3xl border border-slate-200/90 shadow-xs overflow-hidden flex flex-col">
            <div class="p-4 sm:p-5 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-slate-900 text-sm sm:text-base">Mensajes de Contacto</h3>
                    <p class="text-[11px] sm:text-xs text-slate-500">Consultas del formulario</p>
                </div>
                <a href="{{ route('admin.messages.index') }}" class="text-xs font-bold text-orange-600 hover:text-orange-700 flex items-center gap-1">
                    <span>Ver todos</span>
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <div class="divide-y divide-slate-100 flex-1">
                @forelse($recentMessages as $msg)
                    <div class="p-4 hover:bg-slate-50 transition-colors {{ !$msg->is_read ? 'bg-orange-50/30' : '' }}">
                        <div class="flex items-center justify-between mb-1">
                            <span class="font-bold text-xs text-slate-900 flex items-center gap-1.5">
                                @if(!$msg->is_read)
                                    <span class="w-2 h-2 rounded-full bg-orange-600"></span>
                                @endif
                                {{ $msg->name }}
                            </span>
                            <span class="text-[10px] text-slate-400">{{ $msg->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-xs font-medium text-slate-700 truncate">{{ $msg->subject ?? 'Sin asunto' }}</p>
                        <p class="text-[11px] text-slate-500 line-clamp-2 mt-1">{{ $msg->message }}</p>
                        <div class="mt-2 text-right">
                            <a href="{{ route('admin.messages.show', $msg) }}" class="text-[11px] font-bold text-orange-600 hover:underline">
                                Leer mensaje &rarr;
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="p-8 text-center text-slate-400">
                        <p class="text-xs sm:text-sm">No hay mensajes de contacto recientes.</p>
                    </div>
                @endforelse
            </div>
        </div>

    </div>

</div>
@endsection
