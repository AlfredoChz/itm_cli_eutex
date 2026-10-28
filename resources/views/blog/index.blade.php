@extends('layouts.app')

@section('title', 'Blog Técnico & Normativa de Seguridad Textil | EUTEX Gamarra')
@section('meta_description', 'Artículos, guías técnicas sobre telas industriales, normativas ANSI 107 y recomendaciones para el cuidado de uniformes de trabajo.')

@section('content')

<!-- HERO BLOG -->
<div class="bg-eutex-navy text-white py-14 border-b border-white/10 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center max-w-3xl">
        <span class="text-xs font-bold uppercase tracking-widest text-amber-400 bg-white/10 px-3.5 py-1 rounded-full border border-white/20">
            Conocimiento Especializado
        </span>
        <h1 class="font-heading font-black text-3xl sm:text-5xl text-white mt-4">
            Blog Técnico Industrial
        </h1>
        <p class="text-slate-300 text-sm sm:text-base mt-3 leading-relaxed">
            Consejos de expertos textiles sobre normas de alta visibilidad, propiedades de las fibras de algodón y mantenimiento de uniformes corporativos.
        </p>
    </div>
</div>

<div class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
                <article class="bg-white rounded-3xl overflow-hidden border border-slate-200/90 shadow-sm hover:shadow-xl transition-all flex flex-col justify-between group">
                    <div>
                        <div class="relative h-56 overflow-hidden bg-slate-100">
                            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-xs font-bold bg-eutex-navy text-amber-400 shadow">
                                {{ $post->category }}
                            </span>
                        </div>

                        <div class="p-6 sm:p-8">
                            <div class="text-xs text-slate-400 mb-2 flex items-center gap-2">
                                <span>{{ $post->published_at ? $post->published_at->format('d M, Y') : 'Reciente' }}</span>
                                <span>•</span>
                                <span>{{ $post->read_time }}</span>
                            </div>

                            <h2 class="font-heading font-bold text-lg text-slate-900 group-hover:text-amber-600 transition-colors mb-3 leading-snug">
                                <a href="{{ route('blog.show', $post->slug) }}">
                                    {{ $post->title }}
                                </a>
                            </h2>

                            <p class="text-xs sm:text-sm text-slate-500 line-clamp-3 leading-relaxed">
                                {{ $post->summary }}
                            </p>
                        </div>
                    </div>

                    <div class="p-6 sm:p-8 pt-0 border-t border-slate-100 flex items-center justify-between">
                        <span class="text-xs text-slate-400">Por: {{ $post->author }}</span>
                        <a href="{{ route('blog.show', $post->slug) }}" class="text-xs font-bold text-eutex-navy hover:text-amber-600 flex items-center gap-1">
                            <span>Leer artículo</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="pt-10">
            {{ $posts->links() }}
        </div>

    </div>
</div>

@endsection
