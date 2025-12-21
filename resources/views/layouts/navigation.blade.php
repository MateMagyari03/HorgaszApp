@php
    $navItems = [

        [
            'label' => 'Home',
            'route' => 'dashboard',
            'icon' => '<path d="M4 11 12 4l8 7v9a1 1 0 0 1-1 1h-5v-6H10v6H5a1 1 0 0 1-1-1Z" stroke-width="1.5" stroke-linejoin="round" />',
            'pattern' => 'dashboard',
        ],


        [
            'label' => 'Fogási napló',
            'route' => 'catch-records.index',
            'icon' => '<path d="M4 6h16M4 12h16M4 18h10" stroke-width="1.5" stroke-linecap="round" />',
            'pattern' => 'catch-records.*',
        ],
        [
            'label' => 'Horgászvizek',
            'route' => 'waters.index',
            'icon' => '<path d="M4 12c3-6 13-6 16 0-3 6-13 6-16 0Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M12 5v14" stroke-width="1.5" stroke-linecap="round" />',
            'pattern' => 'waters.*',

        ],
        [
            'label' => 'Versenyek',
            'route' => 'contests.index',
            'icon' => '<path d="M5 4h14v5a4 4 0 0 1-4 4h-1.5L14 21l-4-2-4 2 1.5-8H6a4 4 0 0 1-4-4V4h3Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />',
            'pattern' => 'contests.*',
        ],

        [
           
            'label' => 'Versenyeim',
            'route' => 'registrations.index',
            'icon' => '<path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 0 0 1.946-.806 3.42 3.42 0 0 1 4.438 0 3.42 3.42 0 0 0 1.946.806 3.42 3.42 0 0 1 3.138 3.138 3.42 3.42 0 0 0 .806 1.946 3.42 3.42 0 0 1 0 4.438 3.42 3.42 0 0 0-.806 1.946 3.42 3.42 0 0 1-3.138 3.138 3.42 3.42 0 0 0-1.946.806 3.42 3.42 0 0 1-4.438 0 3.42 3.42 0 0 0-1.946-.806 3.42 3.42 0 0 1-3.138-3.138 3.42 3.42 0 0 0-.806-1.946 3.42 3.42 0 0 1 0-4.438 3.42 3.42 0 0 0 .806-1.946 3.42 3.42 0 0 1 3.138-3.138z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>',
            'pattern' => 'registrations.*',

        ],

        [
            'label' => 'Tilalmi idők',
            'route' => 'bans.index',
            'icon' => '<path d="M5 4h14l-1 16H6L5 4Zm3 0V2h8v2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />',
            'pattern' => 'bans.*',
        ],

        [
            'label' => 'Profil',
            'route' => 'profile.edit',
            'icon' => '<path d="M12 13a4 4 0 1 0-4-4 4 4 0 0 0 4 4Zm0 0c-4.418 0-8 2.239-8 5v3h16v-3c0-2.761-3.582-5-8-5Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />',
            'pattern' => 'profile.*',
        ],

    ];
@endphp






<aside class=
"hidden lg:flex lg:w-72 xl:w-80 border-r border-white/60 bg-white/70 backdrop-blur-sm px-6 py-8 flex-col justify-between shadow-sm">
    
<div class="space-y-8">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group relative">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-sky-400 via-blue-500 to-indigo-500 flex items-center justify-center text-white text-xl font-bold shadow-lg shadow-sky-200/50 transition-all duration-300 group-hover:scale-110 group-hover:rotate-6 float-animation relative overflow-hidden">
                <span class="relative z-10">🎣</span>

                <div class="absolute inset-0 bg-gradient-to-br from-white/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>

            <div>
                <p class="text-lg font-bold text-slate-900 group-hover:text-sky-600 transition-colors">HorgászApp</p>
                <p class="text-sm text-slate-500">Közösségi platform</p>
            </div>

        </a>

        <nav class="space-y-2">
            @foreach ($navItems as $item)
                @php $isActive = request()->routeIs($item['pattern']); @endphp

                <a href="{{ route($item['route']) }}"
                   class="nav-pill group {{ $isActive ? 'nav-pill-active' : 'nav-pill-inactive' }}" style="animation-delay: {{ $loop->index * 0.05 }}s;">
                    <span class=
                    "w-11 h-11 rounded-2xl bg-gradient-to-br from-white to-slate-50 flex items-center justify-center shadow-md shadow-slate-200/50 transition-all duration-300 {{ $isActive ? 'ring-2 ring-sky-300 ring-offset-2 scale-110' : 'group-hover:shadow-lg group-hover:scale-110' }}">
                        <svg class="w-5 h-5 text-slate-700 transition-transform duration-300 {{ $isActive ? 'text-sky-600 scale-110' : 'group-hover:scale-110' }}" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            {!! $item['icon'] !!}
                        </svg>
                    </span>
                    <span class="font-semibold transition-colors duration-300 {{ $isActive ? 'text-sky-700' : 'group-hover:text-sky-600' }}">{{ $item['label'] }}</span>
                </a>
            @endforeach
        </nav>
    </div>

        <div class="space-y-4">

        <div class="rounded-3xl bg-gradient-to-br from-sky-500 via-blue-500 to-indigo-600 text-white p-5 shadow-xl shadow-sky-300/30 relative overflow-hidden glow-effect float-animation" style="background-size: 200% 200%; animation: gradient-shift 4s ease infinite, float 5s ease-in-out infinite;">
            <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -mr-12 -mt-12 blur-xl"></div>
            <div class="absolute bottom-0 left-0 w-16 h-16 bg-white/10 rounded-full -ml-8 -mb-8 blur-lg"></div>
            <div class="relative z-10">

                <div class="flex items-center gap-2 mb-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <p class="text-xs font-bold uppercase tracking-wider opacity-90">Heti ajánló</p>
                     </div>

                <p class="text-base font-bold leading-snug">Friss tippek a legjobb horgászvizekhez.</p>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
           
            <button type="submit" class="secondary-button w-full justify-center bg-white">
                <svg class="w-5 h-5 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M15 17l5-5-5-5M20 12H9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M12 5V4a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h5a2 2 0 0 0 2-2v-1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                Kijelentkezés

            </button>
        </form>
    </div>
</aside>









<div class="lg:hidden" x-data="{ mobileMenuOpen: false }">
    <div class="w-full border-b border-white/70 bg-white/80 px-4 py-3 backdrop-blur-sm sticky top-0 z-40">
        <div class="flex items-center justify-between gap-3">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 flex-shrink-0">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-sky-400 to-indigo-500 flex items-center justify-center text-white text-base font-bold shadow-md">
                    🎣
                </div>
                <div class="hidden sm:block">
                    <p class="font-semibold text-slate-900 text-sm">HorgászApp</p>
                </div>
            </a>

            <button 
                @click="mobileMenuOpen = !mobileMenuOpen"
                class="p-2 rounded-xl bg-gradient-to-br from-sky-50 to-indigo-50 border border-sky-200/50 shadow-sm hover:shadow-md transition-all duration-200"
                aria-label="Menü megnyitása"
            >
                <svg x-show="!mobileMenuOpen" class="w-6 h-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="mobileMenuOpen" class="w-6 h-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-cloak>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div 
        x-show="mobileMenuOpen"
        @click="mobileMenuOpen = false"
        x-cloak
        x-transition:enter="transition-opacity ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 lg:hidden"
    ></div>

    <div 
        x-show="mobileMenuOpen"
        @click.away="mobileMenuOpen = false"
        x-cloak
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed right-0 top-0 h-full w-80 max-w-[85vw] bg-white/95 backdrop-blur-md shadow-2xl z-50 overflow-y-auto"
    >
        <div class="flex flex-col h-full">
            <div class="px-6 py-6 border-b border-slate-200/50">
                <div class="flex items-center justify-between mb-6">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-sky-400 via-blue-500 to-indigo-500 flex items-center justify-center text-white text-xl font-bold shadow-lg shadow-sky-200/50 transition-all duration-300 group-hover:scale-110 group-hover:rotate-6">
                            🎣
                        </div>
                        <div>
                            <p class="text-lg font-bold text-slate-900">HorgászApp</p>
                            <p class="text-xs text-slate-500">Közösségi platform</p>
                        </div>
                    </a>
                </div>

                @auth
                <div class="flex items-center gap-3 p-3 rounded-2xl bg-gradient-to-br from-sky-50 to-indigo-50 border border-sky-200/50">
                    @php
                        $user = Auth::user();
                        $nameParts = array_filter(explode(' ', $user->name));
                        $initials = '';
                        foreach ($nameParts as $part) {
                            $initials .= strtoupper(mb_substr($part, 0, 1));
                            if (strlen($initials) === 2) {
                                break;
                            }
                        }
                    @endphp
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sky-400 via-blue-500 to-indigo-500 text-white flex items-center justify-center font-bold shadow-md">
                        <span>{{ $initials ?: 'HU' }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-slate-900 truncate">{{ $user->name }}</p>
                        <p class="text-xs text-slate-500 truncate">{{ $user->email }}</p>
                    </div>
                </div>
                @endauth
            </div>

            <nav class="flex-1 px-4 py-4 space-y-2">
                @foreach ($navItems as $item)
                    @php $isActive = request()->routeIs($item['pattern']); @endphp
                    <a href="{{ route($item['route']) }}"
                       @click="mobileMenuOpen = false"
                       class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all duration-200 group {{ $isActive ? 'bg-gradient-to-r from-sky-50 to-indigo-50 text-sky-900 shadow-md shadow-sky-200/50 border border-sky-200/50' : 'text-slate-600 hover:bg-slate-50 hover:text-sky-700' }}">
                        <span class="w-10 h-10 rounded-xl flex items-center justify-center transition-all duration-200 {{ $isActive ? 'bg-white shadow-md ring-2 ring-sky-300/50' : 'bg-slate-50 group-hover:bg-white group-hover:shadow-sm' }}">
                            <svg class="w-5 h-5 transition-colors duration-200 {{ $isActive ? 'text-sky-600' : 'text-slate-600 group-hover:text-sky-600' }}" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                {!! $item['icon'] !!}
                            </svg>
                        </span>
                        <span class="font-semibold">{{ $item['label'] }}</span>
                    </a>
                @endforeach
            </nav>

            <div class="px-4 py-4 border-t border-slate-200/50 space-y-3">
                <div class="rounded-2xl bg-gradient-to-br from-sky-500 via-blue-500 to-indigo-600 text-white p-4 shadow-lg shadow-sky-300/30 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-white/10 rounded-full -mr-10 -mt-10 blur-xl"></div>
                    <div class="relative z-10">
                        <div class="flex items-center gap-2 mb-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            <p class="text-xs font-bold uppercase tracking-wider opacity-90">Heti ajánló</p>
                        </div>
                        <p class="text-sm font-bold leading-snug">Friss tippek a legjobb horgászvizekhez.</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-3 rounded-2xl border-2 border-slate-200 bg-white font-semibold text-slate-700 hover:border-sky-300 hover:text-sky-700 hover:bg-sky-50 transition-all duration-200">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M15 17l5-5-5-5M20 12H9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 5V4a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h5a2 2 0 0 0 2-2v-1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Kijelentkezés
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
