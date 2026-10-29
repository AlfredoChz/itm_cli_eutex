@extends('admin.layouts.app')

@section('title', 'Mensaje de: ' . $message->name)
@section('header_title', 'Mensaje de Contacto')
@section('header_subtitle', 'Recibido el ' . $message->created_at->format('d/m/Y \a \l\a\s h:i A'))

@section('header_action')
    <a href="{{ route('admin.messages.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 border border-slate-300 transition-colors">
        &larr; Volver a Mensajes
    </a>
@endsection

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    @php
        $cleanPhone = preg_replace('/[^0-9]/', '', $message->phone);
        if (strlen($cleanPhone) === 9) $cleanPhone = '51' . $cleanPhone;
    @endphp

    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
        <!-- HEADER -->
        <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 bg-slate-50/50">
            <div>
                <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Remitente</span>
                <h2 class="text-xl font-bold text-slate-900 mt-0.5">{{ $message->name }}</h2>
                <div class="flex flex-wrap items-center gap-3 text-xs text-slate-600 mt-1">
                    <span>✉️ {{ $message->email }}</span>
                    @if($message->phone)
                        <span>📞 {{ $message->phone }}</span>
                    @endif
                    @if($message->company)
                        <span>🏢 {{ $message->company }}</span>
                    @endif
                </div>
            </div>

            <!-- BOTONES DE CONTACTO -->
            <div class="flex items-center gap-2">
                @if($message->phone)
                    <a href="https://wa.me/{{ $cleanPhone }}?text={{ urlencode('Hola ' . $message->name . ', nos comunicamos de EUTEX Uniformes Industriales sobre tu mensaje.') }}" 
                       target="_blank" 
                       class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs shadow-xs transition-colors">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2z"/></svg>
                        <span>WhatsApp</span>
                    </a>
                @endif
                <a href="mailto:{{ $message->email }}?subject={{ urlencode('Respuesta EUTEX: ' . ($message->subject ?? 'Consulta')) }}" 
                   class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs shadow-xs transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                    <span>Responder por Email</span>
                </a>
            </div>
        </div>

        <!-- CUERPO DEL MENSAJE -->
        <div class="p-6 space-y-4">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block mb-1">Asunto:</span>
                <h3 class="text-base font-bold text-slate-900">{{ $message->subject ?? 'Sin asunto especificado' }}</h3>
            </div>

            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block mb-2">Contenido:</span>
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 text-slate-800 text-sm whitespace-pre-line leading-relaxed">
                    {{ $message->message }}
                </div>
            </div>
        </div>

        <!-- FOOTER ACCIONES -->
        <div class="p-6 bg-slate-50/50 border-t border-slate-100 flex items-center justify-between text-xs">
            <span class="text-slate-400">Estado: Leído</span>

            <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" onsubmit="return confirm('¿Seguro que deseas eliminar este mensaje?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-rose-600 hover:text-rose-800 font-bold">
                    Eliminar este mensaje
                </button>
            </form>
        </div>
    </div>

</div>
@endsection
