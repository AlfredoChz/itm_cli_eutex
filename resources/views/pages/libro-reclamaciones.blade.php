@extends('layouts.app')

@section('title', 'Libro de Reclamaciones Virtual | EUTEX Gamarra')
@section('meta_description', 'Libro de reclamaciones virtual de EUTEX Uniformes Industriales conforme a la normativa peruana de INDECOPI.')

@section('content')

<div class="bg-eutex-navy text-white py-12 border-b border-white/10">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <span class="text-xs font-bold uppercase tracking-widest text-amber-400 bg-white/10 px-3 py-1 rounded-full border border-white/20">
            Conforme a Ley N° 29571
        </span>
        <h1 class="font-heading font-black text-2xl sm:text-4xl text-white mt-3">
            Libro de Reclamaciones Virtual
        </h1>
        <p class="text-xs sm:text-sm text-slate-300 mt-2">
            EUTEX Uniformes Industriales • Razón Comercial: EUTEX • Gamarra, La Victoria, Lima
        </p>
    </div>
</div>

<div class="py-12 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4">
        
        <div class="bg-white rounded-3xl p-8 sm:p-10 border border-slate-200 shadow-md">
            
            <div class="p-4 rounded-2xl bg-amber-50 border border-amber-200 text-xs text-amber-900 mb-8 space-y-1">
                <p><strong>Nota legal:</strong> Conforme al D.S. 011-2011-PCM, el proveedor deberá dar respuesta al reclamo en un plazo no mayor a quince (15) días hábiles improrrogables.</p>
                <p>• <strong>Queja:</strong> Disconformidad que no se encuentra relacionada a los bienes o servicios; o malestar frente a la atención al público.</p>
                <p>• <strong>Reclamo:</strong> Disconformidad relacionada a los bienes o servicios adquiridos.</p>
            </div>

            <form action="{{ route('libro-reclamaciones.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Sección 1: Identificación del Consumidor -->
                <div>
                    <h3 class="font-heading font-bold text-base text-slate-900 pb-2 border-b border-slate-200 mb-4">
                        1. Identificación del Consumidor Reclamante
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Nombre y Apellidos *</label>
                            <input type="text" name="nombre" required placeholder="Nombre completo" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 outline-none">
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Tipo Doc *</label>
                                <select name="tipo_doc" class="w-full px-3 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 outline-none bg-white">
                                    <option value="DNI">DNI</option>
                                    <option value="CE">Carné Ext.</option>
                                    <option value="RUC">RUC</option>
                                    <option value="Pasaporte">Pasaporte</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">N° Documento *</label>
                                <input type="text" name="num_doc" required placeholder="Número" class="w-full px-3 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 outline-none">
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Teléfono / WhatsApp *</label>
                            <input type="tel" name="telefono" required placeholder="920 000 000" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Correo Electrónico *</label>
                            <input type="email" name="email" required placeholder="correo@ejemplo.com" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Dirección Domiciliaria *</label>
                            <input type="text" name="direccion" required placeholder="Av. / Calle, Distrito" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 outline-none">
                        </div>
                    </div>
                </div>

                <!-- Sección 2: Identificación del Bien Contratado -->
                <div>
                    <h3 class="font-heading font-bold text-base text-slate-900 pb-2 border-b border-slate-200 mb-4">
                        2. Identificación del Bien Contratado
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Tipo de Solicitud *</label>
                            <select name="tipo" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 outline-none bg-white">
                                <option value="Reclamo">Reclamo (Disconformidad con la prenda o servicio)</option>
                                <option value="Queja">Queja (Malestar por la atención o trato)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Monto Reclamado (S/) (Opcional)</label>
                            <input type="number" step="0.01" name="monto" placeholder="0.00" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 outline-none">
                        </div>
                    </div>
                </div>

                <!-- Sección 3: Detalle y Pedido -->
                <div>
                    <h3 class="font-heading font-bold text-base text-slate-900 pb-2 border-b border-slate-200 mb-4">
                        3. Detalle de la Reclamación y Pedido del Consumidor
                    </h3>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Detalle del Reclamo o Queja *</label>
                            <textarea name="detalle" rows="4" required placeholder="Describa de forma precisa los hechos ocurridos..." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 outline-none"></textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Pedido Concreto del Consumidor *</label>
                            <textarea name="pedido" rows="3" required placeholder="Indique qué solución solicita (cambio de prenda, ajuste de costura, devolución, etc.)..." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-amber-500 outline-none"></textarea>
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-4 rounded-xl bg-eutex-navy hover:bg-eutex-navy-light text-white font-heading font-bold text-sm shadow-lg transition-all">
                        Enviar Registro en el Libro de Reclamaciones
                    </button>
                </div>
            </form>

        </div>

    </div>
</div>

@endsection
