@extends('layouts.app')

@section('title', $post->title . ' | Blog EUTEX')
@section('meta_description', $post->summary)

@section('content')

<!-- BREADCRUMBS -->
<div class="bg-slate-100 border-b border-slate-200 py-3.5">
    <div class="max-w-4xl mx-auto px-4">
        <nav class="flex text-xs text-slate-500 space-x-2">
            <a href="{{ route('home') }}" class="hover:text-amber-600">Inicio</a>
            <span>/</span>
            <a href="{{ route('blog.index') }}" class="hover:text-amber-600">Blog</a>
            <span>/</span>
            <span class="text-slate-800 font-semibold truncate">{{ $post->title }}</span>
        </nav>
    </div>
</div>

<article class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-4">
        
        <div class="space-y-4 mb-8">
            <div class="flex items-center gap-3">
                <span class="px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800">
                    {{ $post->category }}
                </span>
                <span class="text-xs text-slate-400">
                    {{ $post->published_at ? $post->published_at->format('d de F, Y') : 'Reciente' }} • {{ $post->read_time }} de lectura
                </span>
            </div>

            <h1 class="font-heading font-black text-2xl sm:text-4xl text-slate-900 leading-tight">
                {{ $post->title }}
            </h1>

            <div class="flex items-center gap-3 text-xs text-slate-500 pt-2 border-t border-slate-100">
                <span>Escrito por: <strong>{{ $post->author }}</strong></span>
            </div>
        </div>

        <!-- Imagen Destacada -->
        <div class="rounded-3xl overflow-hidden border border-slate-200 shadow-md mb-10 h-72 sm:h-96 bg-slate-50">
            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
        </div>

        <!-- Contenido del Artículo -->
        <div class="prose max-w-none text-slate-700 leading-relaxed text-sm sm:text-base space-y-4 border-b border-slate-200 pb-12">
            {!! nl2br(e($post->content)) !!}
        </div>

        <!-- Compartir / CTA -->
        <div class="pt-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="text-xs text-slate-500">
                ¿Le resultó útil este artículo? Compártalo con su equipo de seguridad o logística.
            </div>
            <a href="https://wa.me/51920783202?text={{ urlencode('Hola EUTEX, estuve leyendo el artículo: ' . $post->title . ' y deseo asesoría técnica.') }}" 
               target="_blank"
               class="px-5 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs flex items-center gap-2">
                <span>Consultar por WhatsApp</span>
            </a>
        </div>

        <!-- Artículos Recientes -->
        @if($recentPosts->count() > 0)
            <div class="mt-16 pt-10 border-t border-slate-200">
                <h3 class="font-heading font-black text-xl text-slate-900 mb-6">
                    Otros Artículos Relacionados
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    @foreach($recentPosts as $r)
                        <div class="space-y-2">
                            <img src="{{ asset($r->image) }}" class="w-full h-32 object-cover rounded-xl border border-slate-100">
                            <h4 class="font-heading font-bold text-xs text-slate-900 hover:text-amber-600 line-clamp-2">
                                <a href="{{ route('blog.show', $r->slug) }}">{{ $r->title }}</a>
                            </h4>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</article>

@endsection
