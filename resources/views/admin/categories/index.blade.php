@extends('admin.layouts.app')

@section('title', 'Líneas y Categorías')
@section('header_title', 'Líneas & Categorías')
@section('header_subtitle', 'Organiza los sectores de producción (Polos, Chalecos, Jeans, Minería, EPP)')

@section('header_action')
    <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl text-xs font-bold text-white bg-orange-600 hover:bg-orange-500 shadow-md shadow-orange-600/30 transition-all active:scale-95">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
        </svg>
        <span class="hidden sm:inline">Nueva Categoría</span>
        <span class="sm:hidden">Nueva</span>
    </a>
@endsection

@section('content')
<div class="space-y-4 sm:space-y-6">

    <div class="bg-white rounded-2xl sm:rounded-3xl border border-slate-200/90 shadow-xs overflow-hidden">
        <!-- ======================================================== -->
        <!-- VISTA MÓVIL (TARJETAS PARA CELULARES) -->
        <!-- ======================================================== -->
        <div class="block md:hidden divide-y divide-slate-100">
            @forelse($categories as $category)
                <div class="p-4 space-y-3 hover:bg-slate-50/60 transition-colors">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-2xl bg-orange-50 text-orange-600 flex items-center justify-center shrink-0 border border-orange-100 font-bold overflow-hidden">
                            @if($category->image)
                                <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" class="w-full h-full object-cover">
                            @else
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                            @endif
                        </div>

                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between">
                                <h4 class="font-bold text-slate-900 text-sm truncate">{{ $category->name }}</h4>
                                <span class="text-[10px] font-mono font-bold text-slate-400">Orden #{{ $category->order }}</span>
                            </div>
                            <p class="text-[11px] font-mono text-slate-400 truncate mt-0.5">/categoria/{{ $category->slug }}</p>
                        </div>
                    </div>

                    @if($category->description)
                        <p class="text-xs text-slate-600 line-clamp-2">{{ $category->description }}</p>
                    @endif

                    <div class="flex items-center justify-between pt-1">
                        <a href="{{ route('admin.products.index', ['category_id' => $category->id]) }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-slate-100 text-slate-800 font-bold text-xs">
                            <span>{{ $category->products_count }} productos</span>
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>

                        <div class="flex items-center gap-1.5">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="p-2 rounded-xl bg-blue-50 text-blue-600 hover:bg-blue-100" title="Editar">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                            </a>
                            <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" onsubmit="return confirm('¿Eliminar esta categoría?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 rounded-xl bg-rose-50 text-rose-600 hover:bg-rose-100" title="Eliminar">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-8 text-center text-slate-400">
                    No hay categorías creadas.
                </div>
            @endforelse
        </div>

        <!-- ======================================================== -->
        <!-- VISTA ESCRITORIO (TABLA) -->
        <!-- ======================================================== -->
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 font-bold uppercase tracking-wider border-b border-slate-100">
                    <tr>
                        <th class="py-3.5 px-4 w-16">Orden</th>
                        <th class="py-3.5 px-4">Línea / Categoría</th>
                        <th class="py-3.5 px-4">Slug URL</th>
                        <th class="py-3.5 px-4">Productos Asociados</th>
                        <th class="py-3.5 px-4 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($categories as $category)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="py-3.5 px-4 font-mono font-bold text-slate-400">
                                #{{ $category->order }}
                            </td>

                            <td class="py-3.5 px-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center shrink-0 border border-orange-100 font-bold overflow-hidden">
                                        @if($category->image)
                                            <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" class="w-full h-full object-cover">
                                        @else
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                            </svg>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-900 text-sm">{{ $category->name }}</p>
                                        <p class="text-[11px] text-slate-500 line-clamp-1 mt-0.5">{{ $category->description }}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="py-3.5 px-4 font-mono text-slate-600">
                                /categoria/{{ $category->slug }}
                            </td>

                            <td class="py-3.5 px-4">
                                <a href="{{ route('admin.products.index', ['category_id' => $category->id]) }}" class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-bold bg-slate-100 hover:bg-slate-200 text-slate-800 transition-colors">
                                    <span>{{ $category->products_count }} productos</span>
                                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                                </a>
                            </td>

                            <td class="py-3.5 px-4 text-right">
                                <div class="flex items-center justify-end gap-1.5">
                                    <a href="{{ route('products.category', $category->slug) }}" 
                                       target="_blank" 
                                       title="Ver en web pública"
                                       class="p-2 rounded-xl text-slate-500 hover:text-slate-900 hover:bg-slate-100 transition-colors">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                        </svg>
                                    </a>

                                    <a href="{{ route('admin.categories.edit', $category) }}" 
                                       title="Editar Categoría"
                                       class="p-2 rounded-xl text-blue-600 hover:bg-blue-50 transition-colors">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>

                                    <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" onsubmit="return confirm('¿Seguro que deseas eliminar esta categoría?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                title="Eliminar Categoría"
                                                class="p-2 rounded-xl text-rose-600 hover:bg-rose-50 transition-colors">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-slate-400">
                                No hay categorías creadas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
