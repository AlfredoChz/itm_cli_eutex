@php
    $currentRoute = request()->route() ? request()->route()->getName() : '';
    $pendingQuotes = \App\Models\QuoteRequest::where('status', 'pending')->count();
    $unreadMessages = \App\Models\ContactMessage::where('is_read', false)->count();
    $totalProducts = \App\Models\Product::count();
@endphp

<!-- DASHBOARD -->
<a href="{{ route('admin.dashboard') }}" 
   :class="sidebarCollapsed ? 'justify-center px-2' : 'px-3 justify-between'"
   class="group relative flex items-center gap-3 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-orange-600 text-white shadow-md shadow-orange-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' }}"
   title="Dashboard">
    <div class="flex items-center gap-3">
        <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-slate-400 group-hover:text-white' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        <span x-show="!sidebarCollapsed" x-transition.opacity.duration.200ms class="truncate">Dashboard</span>
    </div>
</a>

<!-- PRODUCTOS -->
<a href="{{ route('admin.products.index') }}" 
   :class="sidebarCollapsed ? 'justify-center px-2' : 'px-3 justify-between'"
   class="group relative flex items-center gap-3 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.products.*') ? 'bg-orange-600 text-white shadow-md shadow-orange-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' }}"
   title="Catálogo de Productos ({{ $totalProducts }})">
    <div class="flex items-center gap-3">
        <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.products.*') ? 'text-white' : 'text-slate-400 group-hover:text-white' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
        </svg>
        <span x-show="!sidebarCollapsed" x-transition.opacity.duration.200ms class="truncate">Productos</span>
    </div>
    
    <span x-show="!sidebarCollapsed" x-transition.opacity.duration.200ms class="text-xs px-2 py-0.5 rounded-md font-bold {{ request()->routeIs('admin.products.*') ? 'bg-white/20 text-white' : 'bg-slate-800 text-slate-400' }}">
        {{ $totalProducts }}
    </span>

    <!-- Mini badge cuando está colapsado -->
    <span x-show="sidebarCollapsed" class="absolute -top-1 -right-1 w-2.5 h-2.5 rounded-full bg-slate-700 ring-2 ring-slate-950"></span>
</a>

<!-- CATEGORÍAS -->
<a href="{{ route('admin.categories.index') }}" 
   :class="sidebarCollapsed ? 'justify-center px-2' : 'px-3 justify-between'"
   class="group relative flex items-center gap-3 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.categories.*') ? 'bg-orange-600 text-white shadow-md shadow-orange-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' }}"
   title="Líneas y Categorías">
    <div class="flex items-center gap-3">
        <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.categories.*') ? 'text-white' : 'text-slate-400 group-hover:text-white' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
        </svg>
        <span x-show="!sidebarCollapsed" x-transition.opacity.duration.200ms class="truncate">Categorías</span>
    </div>
</a>

<!-- COTIZACIONES -->
<a href="{{ route('admin.quotes.index') }}" 
   :class="sidebarCollapsed ? 'justify-center px-2' : 'px-3 justify-between'"
   class="group relative flex items-center gap-3 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.quotes.*') ? 'bg-orange-600 text-white shadow-md shadow-orange-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' }}"
   title="Solicitudes de Cotización ({{ $pendingQuotes }} pendientes)">
    <div class="flex items-center gap-3">
        <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.quotes.*') ? 'text-white' : 'text-slate-400 group-hover:text-white' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        <span x-show="!sidebarCollapsed" x-transition.opacity.duration.200ms class="truncate">Cotizaciones</span>
    </div>
    @if($pendingQuotes > 0)
        <span x-show="!sidebarCollapsed" x-transition.opacity.duration.200ms class="text-xs px-2 py-0.5 rounded-full font-black {{ request()->routeIs('admin.quotes.*') ? 'bg-white text-orange-600' : 'bg-orange-500 text-white animate-pulse' }}">
            {{ $pendingQuotes }}
        </span>

        <!-- Badge animado cuando colapsado -->
        <span x-show="sidebarCollapsed" class="absolute -top-1 -right-1 w-4 h-4 rounded-full bg-orange-500 text-white text-[9px] font-black flex items-center justify-center animate-pulse ring-2 ring-slate-950">
            {{ $pendingQuotes }}
        </span>
    @endif
</a>

<!-- MENSAJES DE CONTACTO -->
<a href="{{ route('admin.messages.index') }}" 
   :class="sidebarCollapsed ? 'justify-center px-2' : 'px-3 justify-between'"
   class="group relative flex items-center gap-3 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.messages.*') ? 'bg-orange-600 text-white shadow-md shadow-orange-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' }}"
   title="Mensajes de Contacto ({{ $unreadMessages }} no leídos)">
    <div class="flex items-center gap-3">
        <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.messages.*') ? 'text-white' : 'text-slate-400 group-hover:text-white' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
        </svg>
        <span x-show="!sidebarCollapsed" x-transition.opacity.duration.200ms class="truncate">Mensajes</span>
    </div>
    @if($unreadMessages > 0)
        <span x-show="!sidebarCollapsed" x-transition.opacity.duration.200ms class="text-xs px-2 py-0.5 rounded-full font-bold {{ request()->routeIs('admin.messages.*') ? 'bg-white text-orange-600' : 'bg-amber-400 text-slate-950 font-bold' }}">
            {{ $unreadMessages }}
        </span>

        <span x-show="sidebarCollapsed" class="absolute -top-1 -right-1 w-2.5 h-2.5 rounded-full bg-amber-400 ring-2 ring-slate-950"></span>
    @endif
</a>
