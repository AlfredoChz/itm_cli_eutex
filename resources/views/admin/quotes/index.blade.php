@extends('admin.layouts.app')

@section('title', 'Cotizaciones')
@section('header_title', 'Solicitudes de Cotización')
@section('header_subtitle', 'Gestiona presupuestos y atiende a clientes industriales al instante por WhatsApp')

@section('content')
<div class="space-y-4 sm:space-y-6">

    <!-- STATUS TABS & SEARCH -->
    <div class="bg-white p-3.5 sm:p-5 rounded-2xl sm:rounded-3xl border border-slate-200/90 shadow-xs space-y-3">
        <!-- Pestañas de Estado con Scroll Horizontal Suave en Móvil -->
        <div class="flex items-center gap-2 overflow-x-auto pb-1 text-xs font-bold scrollbar-none">
            <a href="{{ route('admin.quotes.index') }}" 
               class="px-3.5 py-2 rounded-xl transition-all whitespace-nowrap shrink-0 {{ !request('status') ? 'bg-orange-600 text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                Todas ({{ $stats['total'] }})
            </a>
            <a href="{{ route('admin.quotes.index', ['status' => 'pending']) }}" 
               class="px-3.5 py-2 rounded-xl transition-all whitespace-nowrap shrink-0 flex items-center gap-1.5 {{ request('status') === 'pending' ? 'bg-amber-600 text-white shadow-xs' : 'bg-amber-50 text-amber-800 hover:bg-amber-100' }}">
                <span>Pendientes</span>
                <span class="px-1.5 py-0.2 rounded-full text-[10px] {{ request('status') === 'pending' ? 'bg-white text-amber-800' : 'bg-amber-200 text-amber-900 font-black' }}">{{ $stats['pending'] }}</span>
            </a>
            <a href="{{ route('admin.quotes.index', ['status' => 'contacted']) }}" 
               class="px-3.5 py-2 rounded-xl transition-all whitespace-nowrap shrink-0 {{ request('status') === 'contacted' ? 'bg-blue-600 text-white shadow-xs' : 'bg-blue-50 text-blue-800 hover:bg-blue-100' }}">
                Contactadas ({{ $stats['contacted'] }})
            </a>
            <a href="{{ route('admin.quotes.index', ['status' => 'closed']) }}" 
               class="px-3.5 py-2 rounded-xl transition-all whitespace-nowrap shrink-0 {{ request('status') === 'closed' ? 'bg-emerald-600 text-white shadow-xs' : 'bg-emerald-50 text-emerald-800 hover:bg-emerald-100' }}">
                Atendidas ({{ $stats['closed'] }})
            </a>
        </div>

        <!-- Buscador -->
        <form method="GET" action="{{ route('admin.quotes.index') }}" class="flex items-center gap-2 pt-1">
            @if(request('status'))
                <input type="hidden" name="status" value="{{ request('status') }}">
            @endif
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}" 
                       placeholder="Buscar cliente, empresa o celular..." 
                       class="w-full pl-10 pr-4 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-xs sm:text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none">
            </div>

            <button type="submit" class="px-4 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs rounded-xl transition-colors shrink-0">
                Buscar
            </button>

            @if(request('search'))
                <a href="{{ route('admin.quotes.index', request('status') ? ['status' => request('status')] : []) }}" class="p-2.5 bg-slate-100 hover:bg-slate-200 text-slate-500 rounded-xl" title="Limpiar búsqueda">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </a>
            @endif
        </form>
    </div>

    <!-- CONTENEDOR DE COTIZACIONES -->
    <div class="bg-white rounded-2xl sm:rounded-3xl border border-slate-200/90 shadow-xs overflow-hidden">
        @if($quotes->count() > 0)

            <!-- ======================================================== -->
            <!-- VISTA MÓVIL (TARJETAS GRANDES CON WHATSAPP DIRECTO) -->
            <!-- ======================================================== -->
            <div class="block md:hidden divide-y divide-slate-100">
                @foreach($quotes as $quote)
                    @php
                        $waText = "Hola {$quote->name}, nos comunicamos de EUTEX Uniformes Industriales sobre tu solicitud de cotización para {$quote->product_name} ({$quote->quantity} und). ¿En qué podemos ayudarte?";
                        $cleanPhone = preg_replace('/[^0-9]/', '', $quote->phone);
                        if (strlen($cleanPhone) === 9) $cleanPhone = '51' . $cleanPhone;
                    @endphp
                    <div class="p-4 space-y-3 hover:bg-slate-50/60 transition-colors">
                        <!-- Header de Tarjeta -->
                        <div class="flex items-start justify-between gap-2">
                            <div>
                                <div class="flex items-center gap-1.5">
                                    <h4 class="font-bold text-slate-900 text-sm">{{ $quote->name }}</h4>
                                    <span class="text-[10px] font-mono font-bold text-slate-400">#{{ $quote->id }}</span>
                                </div>
                                @if($quote->company)
                                    <p class="text-xs font-semibold text-slate-700 mt-0.5">
                                        🏢 {{ $quote->company }}
                                        @if($quote->ruc)
                                            <span class="text-slate-400 font-normal font-mono text-[11px]">(RUC: {{ $quote->ruc }})</span>
                                        @endif
                                    </p>
                                @endif
                                <div class="flex items-center gap-2 text-[11px] text-slate-400 mt-0.5">
                                    <span>📅 {{ $quote->created_at->format('d/m/Y') }} ({{ $quote->created_at->format('h:i A') }})</span>
                                    @if($quote->city)
                                        <span>• 📍 {{ $quote->city }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Selector de Estado Rápido -->
                            <form method="POST" action="{{ route('admin.quotes.status', $quote) }}" class="shrink-0">
                                @csrf
                                @method('PATCH')
                                <select name="status" 
                                        onchange="this.form.submit()" 
                                        class="px-2.5 py-1 rounded-xl text-[11px] font-bold border-0 cursor-pointer focus:ring-2 focus:ring-orange-500 {{ $quote->status === 'pending' ? 'bg-amber-100 text-amber-800' : ($quote->status === 'contacted' ? 'bg-blue-100 text-blue-800' : 'bg-emerald-100 text-emerald-800') }}">
                                    <option value="pending" {{ $quote->status === 'pending' ? 'selected' : '' }}>Pendiente</option>
                                    <option value="contacted" {{ $quote->status === 'contacted' ? 'selected' : '' }}>Contactado</option>
                                    <option value="closed" {{ $quote->status === 'closed' ? 'selected' : '' }}>Atendido</option>
                                </select>
                            </form>
                        </div>

                        <!-- Prenda y Cantidad -->
                        <div class="p-3 rounded-2xl bg-slate-50 border border-slate-200/80">
                            <div class="flex items-center justify-between text-xs">
                                <span class="font-bold text-slate-900 truncate">{{ $quote->product_name ?? 'Cotización General' }}</span>
                                <span class="px-2 py-0.5 rounded-lg bg-orange-100 text-orange-800 font-bold text-[11px] shrink-0 ml-2">
                                    {{ $quote->quantity }} unidades
                                </span>
                            </div>
                            @if($quote->message)
                                <p class="text-[11px] text-slate-500 mt-1.5 line-clamp-2 italic">
                                    "{{ $quote->message }}"
                                </p>
                            @endif
                        </div>

                        <!-- Botones Grandes de Atención -->
                        <div class="flex items-center gap-2 pt-1">
                            <!-- Botón WhatsApp Principal -->
                            <a href="https://wa.me/{{ $cleanPhone }}?text={{ urlencode($waText) }}" 
                               target="_blank" 
                               class="flex-1 inline-flex items-center justify-center gap-2 py-2.5 px-4 rounded-xl bg-emerald-600 active:bg-emerald-700 text-white font-bold text-xs shadow-md shadow-emerald-600/30 transition-all">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2z"/></svg>
                                <span>Chatear por WhatsApp</span>
                            </a>

                            <!-- Llamada -->
                            <a href="tel:{{ $quote->phone }}" class="p-2.5 rounded-xl bg-slate-100 text-slate-700 hover:bg-slate-200 transition-colors" title="Llamar">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </a>

                            <!-- Detalle -->
                            <a href="{{ route('admin.quotes.show', $quote) }}" class="p-2.5 rounded-xl bg-slate-100 text-slate-700 hover:bg-slate-200 transition-colors" title="Ver Detalle">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- ======================================================== -->
            <!-- VISTA ESCRITORIO (TABLA DETALLADA) -->
            <!-- ======================================================== -->
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 text-slate-500 font-bold uppercase tracking-wider border-b border-slate-100">
                        <tr>
                            <th class="py-3.5 px-4 w-12">#</th>
                            <th class="py-3.5 px-4">Cliente / Razón Social</th>
                            <th class="py-3.5 px-4">Contacto Directo</th>
                            <th class="py-3.5 px-4">Prenda / Cantidad</th>
                            <th class="py-3.5 px-4">Estado</th>
                            <th class="py-3.5 px-4">Fecha</th>
                            <th class="py-3.5 px-4 text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($quotes as $quote)
                            @php
                                $waText = "Hola {$quote->name}, nos comunicamos de EUTEX Uniformes Industriales sobre tu solicitud de cotización para {$quote->product_name} ({$quote->quantity} und). ¿En qué podemos ayudarte?";
                                $cleanPhone = preg_replace('/[^0-9]/', '', $quote->phone);
                                if (strlen($cleanPhone) === 9) $cleanPhone = '51' . $cleanPhone;
                            @endphp
                            <tr class="hover:bg-slate-50/70 transition-colors">
                                <!-- ID -->
                                <td class="py-3.5 px-4 font-mono font-bold text-slate-400">
                                    #{{ $quote->id }}
                                </td>

                                <!-- Cliente -->
                                <td class="py-3.5 px-4">
                                    <p class="font-bold text-slate-900 text-sm">{{ $quote->name }}</p>
                                    @if($quote->company)
                                        <p class="text-[11px] font-semibold text-slate-700 mt-0.5">
                                            🏢 {{ $quote->company }}
                                            @if($quote->ruc)
                                                <span class="text-slate-400 font-normal font-mono">(RUC: {{ $quote->ruc }})</span>
                                            @endif
                                        </p>
                                    @endif
                                    @if($quote->city)
                                        <p class="text-[10px] text-slate-400 mt-0.5">📍 {{ $quote->city }}</p>
                                    @endif
                                </td>

                                <!-- Contacto -->
                                <td class="py-3.5 px-4">
                                    <div class="flex items-center gap-2">
                                        <span class="font-mono font-bold text-slate-800">{{ $quote->phone }}</span>
                                        <a href="https://wa.me/{{ $cleanPhone }}?text={{ urlencode($waText) }}" 
                                           target="_blank" 
                                           title="Conversar por WhatsApp"
                                           class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-[10px] shadow-xs transition-colors">
                                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2z"/></svg>
                                            <span>WhatsApp</span>
                                        </a>
                                    </div>
                                    <p class="text-[11px] text-slate-500 mt-0.5">{{ $quote->email }}</p>
                                </td>

                                <!-- Prenda y Cantidad -->
                                <td class="py-3.5 px-4">
                                    <span class="font-bold text-slate-900 block">{{ $quote->product_name ?? 'Cotización General' }}</span>
                                    <span class="inline-block mt-0.5 px-2 py-0.5 rounded bg-slate-100 text-slate-700 font-bold text-[11px]">
                                        {{ $quote->quantity }} unidades
                                    </span>
                                </td>

                                <!-- Estado con selector rápido -->
                                <td class="py-3.5 px-4">
                                    <form method="POST" action="{{ route('admin.quotes.status', $quote) }}">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" 
                                                onchange="this.form.submit()" 
                                                class="px-2.5 py-1 rounded-xl text-xs font-bold border-0 cursor-pointer focus:ring-2 focus:ring-orange-500 {{ $quote->status === 'pending' ? 'bg-amber-100 text-amber-800' : ($quote->status === 'contacted' ? 'bg-blue-100 text-blue-800' : 'bg-emerald-100 text-emerald-800') }}">
                                            <option value="pending" {{ $quote->status === 'pending' ? 'selected' : '' }}>Pendiente</option>
                                            <option value="contacted" {{ $quote->status === 'contacted' ? 'selected' : '' }}>Contactado</option>
                                            <option value="closed" {{ $quote->status === 'closed' ? 'selected' : '' }}>Atendido</option>
                                        </select>
                                    </form>
                                </td>

                                <!-- Fecha -->
                                <td class="py-3.5 px-4 text-slate-500">
                                    <span class="block">{{ $quote->created_at->format('d/m/Y') }}</span>
                                    <span class="text-[10px] text-slate-400">{{ $quote->created_at->format('h:i A') }}</span>
                                </td>

                                <!-- Acciones -->
                                <td class="py-3.5 px-4 text-right">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <a href="{{ route('admin.quotes.show', $quote) }}" 
                                           title="Ver Detalle Completo"
                                           class="p-2 rounded-xl text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                        </a>

                                        <form method="POST" action="{{ route('admin.quotes.destroy', $quote) }}" data-confirm="La cotización #{{ $quote->id }} se eliminará del registro." data-confirm-title="¿Eliminar Cotización?">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    title="Eliminar"
                                                    class="p-2 rounded-xl text-rose-600 hover:bg-rose-50 transition-colors">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="p-4 border-t border-slate-100 bg-slate-50/50">
                {{ $quotes->links() }}
            </div>
        @else
            <div class="p-12 text-center text-slate-400">
                <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 text-slate-400 flex items-center justify-center mb-3">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h4 class="text-base font-bold text-slate-800">No hay cotizaciones con este filtro</h4>
                <p class="text-xs text-slate-500 mt-1">Prueba seleccionando "Todas" o cambiando el término de búsqueda.</p>
            </div>
        @endif
    </div>

</div>
@endsection
