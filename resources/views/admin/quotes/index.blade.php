@extends('admin.layouts.app')

@section('title', 'Cotizaciones Recibidas')
@section('header_title', 'Solicitudes de Cotización')
@section('header_subtitle', 'Gestiona presupuestos y atiende a clientes industriales directamente por WhatsApp')

@section('content')
<div class="space-y-6">

    <!-- STATUS TABS & SEARCH -->
    <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-xs flex flex-col md:flex-row md:items-center justify-between gap-4">
        <!-- Tabs -->
        <div class="flex items-center gap-2 overflow-x-auto pb-1 md:pb-0">
            <a href="{{ route('admin.quotes.index') }}" 
               class="px-3 py-1.5 rounded-xl text-xs font-bold transition-all whitespace-nowrap {{ !request('status') ? 'bg-orange-600 text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                Todas ({{ $stats['total'] }})
            </a>
            <a href="{{ route('admin.quotes.index', ['status' => 'pending']) }}" 
               class="px-3 py-1.5 rounded-xl text-xs font-bold transition-all whitespace-nowrap {{ request('status') === 'pending' ? 'bg-amber-600 text-white shadow-xs' : 'bg-amber-50 text-amber-800 hover:bg-amber-100' }}">
                Pendientes ({{ $stats['pending'] }})
            </a>
            <a href="{{ route('admin.quotes.index', ['status' => 'contacted']) }}" 
               class="px-3 py-1.5 rounded-xl text-xs font-bold transition-all whitespace-nowrap {{ request('status') === 'contacted' ? 'bg-blue-600 text-white shadow-xs' : 'bg-blue-50 text-blue-800 hover:bg-blue-100' }}">
                Contactadas ({{ $stats['contacted'] }})
            </a>
            <a href="{{ route('admin.quotes.index', ['status' => 'closed']) }}" 
               class="px-3 py-1.5 rounded-xl text-xs font-bold transition-all whitespace-nowrap {{ request('status') === 'closed' ? 'bg-emerald-600 text-white shadow-xs' : 'bg-emerald-50 text-emerald-800 hover:bg-emerald-100' }}">
                Cerradas ({{ $stats['closed'] }})
            </a>
        </div>

        <!-- Search -->
        <form method="GET" action="{{ route('admin.quotes.index') }}" class="flex items-center gap-2 w-full md:w-auto">
            @if(request('status'))
                <input type="hidden" name="status" value="{{ request('status') }}">
            @endif
            <input type="text" 
                   name="search" 
                   value="{{ request('search') }}" 
                   placeholder="Buscar cliente, teléfono, empresa..." 
                   class="w-full md:w-64 px-3 py-1.5 rounded-xl bg-slate-50 border border-slate-300 text-xs focus:ring-2 focus:ring-orange-500 focus:outline-none">
            <button type="submit" class="px-3 py-1.5 bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs rounded-xl transition-colors shrink-0">
                Buscar
            </button>
            @if(request('search'))
                <a href="{{ route('admin.quotes.index', request('status') ? ['status' => request('status')] : []) }}" class="p-1.5 bg-slate-100 hover:bg-slate-200 text-slate-500 rounded-xl">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </a>
            @endif
        </form>
    </div>

    <!-- TABLA DE COTIZACIONES -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
        @if($quotes->count() > 0)
            <div class="overflow-x-auto">
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
                                           class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-[10px] shadow-xs transition-colors">
                                            <svg class="w-3 h-3 fill-current" viewBox="0 0 24 24"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2z"/></svg>
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
                                                class="px-2.5 py-1 rounded-lg text-xs font-bold border-0 cursor-pointer focus:ring-2 focus:ring-orange-500 {{ $quote->status === 'pending' ? 'bg-amber-100 text-amber-800' : ($quote->status === 'contacted' ? 'bg-blue-100 text-blue-800' : 'bg-emerald-100 text-emerald-800') }}">
                                            <option value="pending" {{ $quote->status === 'pending' ? 'selected' : '' }}>Pendiente</option>
                                            <option value="contacted" {{ $quote->status === 'contacted' ? 'selected' : '' }}>Contactado</option>
                                            <option value="closed" {{ $quote->status === 'closed' ? 'selected' : '' }}>Atendido / Cerrado</option>
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
                                           class="p-1.5 rounded-lg text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                        </a>

                                        <form method="POST" action="{{ route('admin.quotes.destroy', $quote) }}" onsubmit="return confirm('¿Seguro de eliminar esta cotización #{{ $quote->id }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    title="Eliminar"
                                                    class="p-1.5 rounded-lg text-rose-600 hover:bg-rose-50 transition-colors">
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
                <h4 class="text-base font-bold text-slate-800">No hay solicitudes de cotización</h4>
                <p class="text-xs text-slate-500 mt-1">Las cotizaciones solicitadas por los clientes desde la web aparecerán aquí.</p>
            </div>
        @endif
    </div>

</div>
@endsection
