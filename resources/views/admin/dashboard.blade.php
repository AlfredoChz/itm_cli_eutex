@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('header_title', 'Dashboard Principal')
@section('header_subtitle', 'Métricas del catálogo, cotizaciones y consultas de clientes')

@section('header_action')
    <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-lg text-xs font-bold text-white bg-orange-600 hover:bg-orange-500 shadow-md shadow-orange-600/30 transition-all">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        <span>Nuevo Producto</span>
    </a>
@endsection

@section('content')
<div class="space-y-6">

    <!-- METRIC CARDS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- PRODUCTOS -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Productos</p>
                <h3 class="text-2xl font-black text-slate-900 mt-1">{{ $stats['total_products'] }}</h3>
                <p class="text-xs text-slate-500 mt-1">
                    <span class="font-bold text-orange-600">{{ $stats['featured_products'] }}</span> destacados en portada
                </p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
            </div>
        </div>

        <!-- CATEGORIAS -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Líneas / Categorías</p>
                <h3 class="text-2xl font-black text-slate-900 mt-1">{{ $stats['total_categories'] }}</h3>
                <p class="text-xs text-slate-500 mt-1">Sectores industriales activos</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
            </div>
        </div>

        <!-- COTIZACIONES -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Cotizaciones</p>
                <h3 class="text-2xl font-black text-slate-900 mt-1">{{ $stats['total_quotes'] }}</h3>
                <p class="text-xs mt-1">
                    @if($stats['pending_quotes'] > 0)
                        <span class="font-bold text-amber-600 bg-amber-50 px-1.5 py-0.5 rounded text-[11px]">{{ $stats['pending_quotes'] }} por atender</span>
                    @else
                        <span class="text-emerald-600 font-medium">Al día</span>
                    @endif
                </p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
        </div>

        <!-- MENSAJES -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Mensajes de Contacto</p>
                <h3 class="text-2xl font-black text-slate-900 mt-1">{{ $stats['total_messages'] }}</h3>
                <p class="text-xs mt-1">
                    @if($stats['unread_messages'] > 0)
                        <span class="font-bold text-rose-600 bg-rose-50 px-1.5 py-0.5 rounded text-[11px]">{{ $stats['unread_messages'] }} no leídos</span>
                    @else
                        <span class="text-slate-500">Sin nuevos mensajes</span>
                    @endif
                </p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- ACCIONES RÁPIDAS -->
    <div class="bg-gradient-to-r from-slate-900 to-slate-950 p-5 rounded-2xl text-white shadow-lg border border-slate-800">
        <h4 class="text-sm font-bold uppercase tracking-wider text-orange-400 mb-3">Acciones Rápidas</h4>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
            <a href="{{ route('admin.products.create') }}" class="p-3 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-center transition-all group">
                <div class="w-8 h-8 mx-auto rounded-lg bg-orange-500/20 text-orange-400 flex items-center justify-center group-hover:bg-orange-500 group-hover:text-white transition-colors mb-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                </div>
                <span class="text-xs font-bold block">Crear Producto</span>
            </a>

            <a href="{{ route('admin.categories.create') }}" class="p-3 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-center transition-all group">
                <div class="w-8 h-8 mx-auto rounded-lg bg-blue-500/20 text-blue-400 flex items-center justify-center group-hover:bg-blue-500 group-hover:text-white transition-colors mb-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" /></svg>
                </div>
                <span class="text-xs font-bold block">Nueva Categoría</span>
            </a>

            <a href="{{ route('admin.quotes.index') }}" class="p-3 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-center transition-all group">
                <div class="w-8 h-8 mx-auto rounded-lg bg-amber-500/20 text-amber-400 flex items-center justify-center group-hover:bg-amber-500 group-hover:text-white transition-colors mb-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                </div>
                <span class="text-xs font-bold block">Ver Cotizaciones</span>
            </a>

            <a href="{{ route('home') }}" target="_blank" class="p-3 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-center transition-all group">
                <div class="w-8 h-8 mx-auto rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center group-hover:bg-emerald-500 group-hover:text-white transition-colors mb-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                </div>
                <span class="text-xs font-bold block">Visitar Web EUTEX</span>
            </a>
        </div>
    </div>

    <!-- SECCIÓN DE 2 COLUMNAS: COTIZACIONES RECIENTES & MENSAJES -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- COTIZACIONES RECIENTES (2 COLUMNAS) -->
        <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
            <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-slate-900 text-base">Últimas Solicitudes de Cotización</h3>
                    <p class="text-xs text-slate-500">Solicitudes recibidas desde la web y catálogo</p>
                </div>
                <a href="{{ route('admin.quotes.index') }}" class="text-xs font-bold text-orange-600 hover:text-orange-700">
                    Ver todas &rarr;
                </a>
            </div>

            @if($recentQuotes->count() > 0)
                <div class="overflow-x-auto">
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
                                            @php
                                                $waText = "Hola {$quote->name}, nos comunicamos de EUTEX Uniformes Industriales sobre tu cotización de {$quote->product_name} ({$quote->quantity} und).";
                                                $cleanPhone = preg_replace('/[^0-9]/', '', $quote->phone);
                                                if (strlen($cleanPhone) === 9) $cleanPhone = '51' . $cleanPhone;
                                            @endphp
                                            <a href="https://wa.me/{{ $cleanPhone }}?text={{ urlencode($waText) }}" 
                                               target="_blank" 
                                               title="Responder por WhatsApp"
                                               class="p-1.5 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-600 hover:text-white transition-colors">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2z"/></svg>
                                            </a>
                                            <a href="{{ route('admin.quotes.show', $quote) }}" class="p-1.5 rounded-lg bg-slate-100 text-slate-700 hover:bg-slate-200 transition-colors" title="Ver Detalles">
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
                    <p class="text-sm">No hay solicitudes de cotización registradas todavía.</p>
                </div>
            @endif
        </div>

        <!-- MENSAJES DE CONTACTO RECIENTES (1 COLUMNA) -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden flex flex-col">
            <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-slate-900 text-base">Mensajes de Contacto</h3>
                    <p class="text-xs text-slate-500">Formulario de contacto de la web</p>
                </div>
                <a href="{{ route('admin.messages.index') }}" class="text-xs font-bold text-orange-600 hover:text-orange-700">
                    Ver todos &rarr;
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
                        <p class="text-sm">No hay mensajes de contacto recientes.</p>
                    </div>
                @endforelse
            </div>
        </div>

    </div>

</div>
@endsection
