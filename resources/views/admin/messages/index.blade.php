@extends('admin.layouts.app')

@section('title', 'Mensajes')
@section('header_title', 'Bandeja de Contacto')
@section('header_subtitle', 'Consultas y mensajes recibidos a través del formulario de la web')

@section('content')
<div class="space-y-4 sm:space-y-6">

    <!-- SEARCH & FILTERS -->
    <div class="bg-white p-3.5 sm:p-5 rounded-2xl sm:rounded-3xl border border-slate-200/90 shadow-xs flex flex-col sm:flex-row items-center justify-between gap-3">
        <div class="flex items-center gap-2 w-full sm:w-auto">
            <a href="{{ route('admin.messages.index') }}" 
               class="flex-1 sm:flex-initial text-center px-3.5 py-2 rounded-xl text-xs font-bold transition-all {{ !request()->has('unread') ? 'bg-orange-600 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                Todos los Mensajes
            </a>
            <a href="{{ route('admin.messages.index', ['unread' => 1]) }}" 
               class="flex-1 sm:flex-initial text-center px-3.5 py-2 rounded-xl text-xs font-bold transition-all flex items-center justify-center gap-1.5 {{ request()->has('unread') ? 'bg-amber-600 text-white' : 'bg-amber-50 text-amber-800 hover:bg-amber-100' }}">
                <span>No Leídos</span>
                @if($unreadCount > 0)
                    <span class="px-1.5 py-0.2 rounded-full text-[10px] bg-white text-slate-900 font-black">{{ $unreadCount }}</span>
                @endif
            </a>
        </div>

        <form method="GET" action="{{ route('admin.messages.index') }}" class="flex items-center gap-2 w-full sm:w-auto">
            <div class="relative flex-1 sm:w-64">
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}" 
                       placeholder="Buscar por nombre, correo o asunto..." 
                       class="w-full px-3 py-2 rounded-xl bg-slate-50 border border-slate-300 text-xs sm:text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none">
            </div>
            <button type="submit" class="px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs rounded-xl transition-colors shrink-0">
                Buscar
            </button>
        </form>
    </div>

    <!-- CONTENEDOR DE MENSAJES -->
    <div class="bg-white rounded-2xl sm:rounded-3xl border border-slate-200/90 shadow-xs overflow-hidden">
        @if($messages->count() > 0)

            <!-- ======================================================== -->
            <!-- VISTA MÓVIL (TARJETAS PARA CELULAR) -->
            <!-- ======================================================== -->
            <div class="block md:hidden divide-y divide-slate-100">
                @foreach($messages as $msg)
                    @php
                        $cleanPhone = preg_replace('/[^0-9]/', '', $msg->phone);
                        if (strlen($cleanPhone) === 9) $cleanPhone = '51' . $cleanPhone;
                    @endphp
                    <div class="p-4 space-y-2.5 hover:bg-slate-50/60 transition-colors {{ !$msg->is_read ? 'bg-orange-50/20' : '' }}">
                        <div class="flex items-start justify-between gap-2">
                            <div class="flex items-center gap-2">
                                @if(!$msg->is_read)
                                    <span class="w-2.5 h-2.5 rounded-full bg-orange-600 animate-pulse shrink-0"></span>
                                @else
                                    <span class="w-2 h-2 rounded-full bg-slate-300 shrink-0"></span>
                                @endif
                                <div>
                                    <h4 class="font-bold text-slate-900 text-sm">{{ $msg->name }}</h4>
                                    <p class="text-[11px] text-slate-500">{{ $msg->email }}</p>
                                </div>
                            </div>

                            <span class="text-[10px] text-slate-400 whitespace-nowrap">
                                {{ $msg->created_at->format('d/m/Y') }}
                            </span>
                        </div>

                        <!-- Asunto y Extracto -->
                        <div class="p-3 rounded-2xl bg-slate-50 border border-slate-200/80">
                            <p class="font-bold text-xs text-slate-800">{{ $msg->subject ?? 'Consulta general' }}</p>
                            <p class="text-xs text-slate-600 line-clamp-2 mt-1 leading-relaxed">{{ $msg->message }}</p>
                        </div>

                        <!-- Botones Acción Móvil -->
                        <div class="flex items-center gap-2 pt-1">
                            @if($msg->phone)
                                <a href="https://wa.me/{{ $cleanPhone }}?text={{ urlencode('Hola ' . $msg->name . ', nos comunicamos de EUTEX Uniformes Industriales sobre tu mensaje.') }}" 
                                   target="_blank"
                                   class="inline-flex items-center gap-1.5 py-2 px-3 rounded-xl bg-emerald-600 active:bg-emerald-700 text-white font-bold text-xs shadow-xs">
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2z"/></svg>
                                    <span>WhatsApp</span>
                                </a>
                            @endif

                            <a href="mailto:{{ $msg->email }}" class="p-2 rounded-xl bg-slate-100 text-slate-700 hover:bg-slate-200 transition-colors" title="Email">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            </a>

                            <a href="{{ route('admin.messages.show', $msg) }}" class="flex-1 text-center py-2 px-3 rounded-xl bg-slate-900 active:bg-slate-800 text-white font-bold text-xs transition-colors">
                                Leer Mensaje Completo
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- ======================================================== -->
            <!-- VISTA ESCRITORIO (TABLA) -->
            <!-- ======================================================== -->
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 text-slate-500 font-bold uppercase tracking-wider border-b border-slate-100">
                        <tr>
                            <th class="py-3.5 px-4 w-8"></th>
                            <th class="py-3.5 px-4">Remitente</th>
                            <th class="py-3.5 px-4">Asunto & Mensaje</th>
                            <th class="py-3.5 px-4">Teléfono / WhatsApp</th>
                            <th class="py-3.5 px-4">Fecha</th>
                            <th class="py-3.5 px-4 text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($messages as $msg)
                            <tr class="hover:bg-slate-50/70 transition-colors {{ !$msg->is_read ? 'bg-orange-50/20' : '' }}">
                                <td class="py-3.5 px-4 text-center">
                                    @if(!$msg->is_read)
                                        <span class="inline-block w-2.5 h-2.5 rounded-full bg-orange-600 animate-pulse" title="No leído"></span>
                                    @else
                                        <span class="inline-block w-2 h-2 rounded-full bg-slate-300"></span>
                                    @endif
                                </td>

                                <td class="py-3.5 px-4">
                                    <p class="font-bold text-slate-900 text-sm">{{ $msg->name }}</p>
                                    <p class="text-[11px] text-slate-500 mt-0.5">{{ $msg->email }}</p>
                                    @if($msg->company)
                                        <p class="text-[10px] text-slate-400 mt-0.5">🏢 {{ $msg->company }}</p>
                                    @endif
                                </td>

                                <td class="py-3.5 px-4">
                                    <p class="font-bold text-slate-800 text-xs">{{ $msg->subject ?? 'Consulta general' }}</p>
                                    <p class="text-[11px] text-slate-500 line-clamp-1 mt-0.5">{{ $msg->message }}</p>
                                </td>

                                <td class="py-3.5 px-4 font-mono text-slate-700">
                                    {{ $msg->phone ?? 'No especificado' }}
                                </td>

                                <td class="py-3.5 px-4 text-slate-500 whitespace-nowrap">
                                    {{ $msg->created_at->format('d/m/Y') }}
                                    <span class="block text-[10px] text-slate-400">{{ $msg->created_at->format('h:i A') }}</span>
                                </td>

                                <td class="py-3.5 px-4 text-right">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <a href="{{ route('admin.messages.show', $msg) }}" 
                                           class="p-2 rounded-xl text-blue-600 hover:bg-blue-50 transition-colors" 
                                           title="Ver Mensaje">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                        </a>

                                        <form method="POST" action="{{ route('admin.messages.destroy', $msg) }}" onsubmit="return confirm('¿Eliminar este mensaje?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="p-2 rounded-xl text-rose-600 hover:bg-rose-50 transition-colors" 
                                                    title="Eliminar">
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
                {{ $messages->links() }}
            </div>
        @else
            <div class="p-12 text-center text-slate-400">
                <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-100 text-slate-400 flex items-center justify-center mb-3">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h4 class="text-base font-bold text-slate-800">No hay mensajes en esta vista</h4>
                <p class="text-xs text-slate-500 mt-1">Los mensajes enviados desde el formulario web aparecerán aquí.</p>
            </div>
        @endif
    </div>

</div>
@endsection
