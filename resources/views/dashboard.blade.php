<x-app-layout>
    <x-slot name="header">
        Horgász irányítópult
    </x-slot>




    <section class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
        <div class="stat-card glow-effect">

            <div class="flex items-start justify-between">
                <div class="flex-1">

                    <div class="flex items-center gap-2 mb-2">

                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sky-400 to-blue-500 flex items-center justify-center shadow-lg shadow-sky-200/50">
                            
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                     
                        <p class="text-sm text-slate-500 font-medium">Összes fogás</p>
                    </div>

                    <p class="text-3xl font-bold gradient-text mt-2">{{ $stats['totalCatches'] ?? 0 }}</p>
                    <p class="text-xs text-slate-400 mt-2 flex items-center gap-1">
                      
                    
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        Ebből idén: {{ $stats['yearCatch'] ?? 0 }}
                    </p>
                </div>

            </div>
        </div>




        <div class="stat-card glow-effect">
            <div class="flex items-start justify-between">
              
            <div class="flex-1">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center shadow-lg shadow-amber-200/50 float-animation">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                        </div>
                        <p class="text-sm text-slate-500 font-medium">Legnagyobb fogás</p>
                    </div>

                    <p class="text-3xl font-bold gradient-text mt-2">
                        {{ $stats['biggestCatch'] ? number_format($stats['biggestCatch'], 1) . ' kg' : '–' }}
                    </p>

                    <p class="text-xs text-slate-400 mt-2 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>

                        Saját rekordod

                    </p>
                </div>
            </div>
        </div>




        <div class="stat-card glow-effect">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                   
                <div class="flex items-center gap-2 mb-2">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center shadow-lg shadow-emerald-200/50">
                           
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <p class="text-sm text-slate-500 font-medium">Kedvenc víz</p>
                    </div>

                    <p class="text-2xl font-bold gradient-text mt-2">{{ $stats['favoriteWater'] ?? '–' }}</p>
                    <p class="text-xs text-slate-400 mt-2 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Fogások száma alapján
                    </p>
                </div>
            </div>
        </div>



        <div class="stat-card glow-effect">
            <div class="flex items-start justify-between">
                <div class="flex-1">

                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-400 to-pink-500 flex items-center justify-center shadow-lg shadow-purple-200/50">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                        </div>
                        <p class="text-sm text-slate-500 font-medium">Aktív verseny</p>
                    </div>

                    <p class="text-2xl font-bold gradient-text mt-2 leading-tight">
                        {{ Str::limit(optional($upcomingContests->first())->nev ?? 'Nincs meghirdetve', 15) }}
                    </p>
                    <p class="text-xs text-slate-400 mt-2 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>


                        {{ optional($upcomingContests->first())->datum_kezdete ?? '–' }}
                        @if($upcomingContests->first())
                            – {{ $upcomingContests->first()->datum_vege }}
                        @endif

                    </p>
                </div>
            </div>
        </div>
    </section>


    <section class="grid gap-6 lg:grid-cols-2">
        <div class="page-section space-y-4">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-slate-500">Aktív versenyek</p>
                    <p class="text-xl font-semibold">Következő lehetőségek</p>
                </div>
                <a href="{{ route('contests.index') }}" class="text-sm font-semibold text-sky-600">Összes verseny</a>
            </div>
            <div class="space-y-4">

                @forelse ($upcomingContests as $index => $contest)
                    <div class="flex flex-col gap-3 rounded-2xl border-2 border-slate-100 p-5 bg-gradient-to-br from-white to-slate-50/50 hover:border-sky-300 transition-all duration-300 hover:shadow-lg hover:shadow-sky-200/30 hover:-translate-y-1 glow-effect" style="animation: slideInUp 0.5s ease-out backwards; animation-delay: {{ $index * 0.1 }}s;">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">

                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-400 to-pink-500 flex items-center justify-center shadow-md">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                    </svg>
                                </div>

                                <p class="font-bold text-slate-900">{{ $contest->nev }}</p>
                            </div>


                            @php
                                $status = $contest->status;
                            @endphp

                            @if($status === 'nyitott')
                                <span class="text-xs px-3 py-1.5 rounded-full bg-gradient-to-r from-blue-100 to-sky-100 text-blue-700 font-semibold border border-blue-200 shadow-sm">Nyitott</span>
                            @elseif($status === 'aktív')
                                <span class="text-xs px-3 py-1.5 rounded-full bg-gradient-to-r from-emerald-100 to-teal-100 text-emerald-700 font-semibold border border-emerald-200 shadow-sm">Aktív</span>
                            @else
                                <span class="text-xs px-3 py-1.5 rounded-full bg-gradient-to-r from-slate-100 to-gray-100 text-slate-700 font-semibold border border-slate-200 shadow-sm">Lezárt</span>
                            @endif


                        </div>
                        <div class="text-sm text-slate-600 flex items-center gap-4 flex-wrap">
                            <span class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>

                                {{ $contest->datum_kezdete }} – {{ $contest->datum_vege }}

                            </span>

                            <span class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $contest->helyszin }}
                            </span>

                            @if($contest->dij)
                                <span class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ number_format($contest->dij, 0, '.', ' ') }} Ft
                                </span>
                            @endif

                        </div>
                        <div class="flex gap-3 pt-2">
                            @auth

                                @if(!auth()->user()->isAdmin())
                                    @if($contest->canRegister())
                                        @php
                                            $isRegistered = \App\Models\Registration::where('contest_id', $contest->id)
                                                ->where('user_id', auth()->id())
                                                ->exists();
                                        @endphp
                                        @if(!$isRegistered)
                                            <form action="{{ route('contest.quickRegister', $contest) }}" method="POST">
                                                @csrf
                                               
                                                <button class="primary-button px-5 py-2 text-sm">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                                    </svg>
                                                    Nevezés
                                                </button>

                                            </form>
                                        @else
                                            <span class="secondary-button px-5 py-2 text-sm bg-green-50 text-green-700 border-green-200">
                                                Már neveztél
                                            </span>
                                        @endif
                                    @endif
                                @else



                                    <a href="{{ route('contests.edit', $contest) }}" class="secondary-button text-sm px-5 py-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Szerkesztés
                                    </a>

                                @endif
                            @endauth

                        </div>
                    </div>
                @empty

                    <p class="text-sm text-slate-500">Jelenleg nincs aktív verseny.</p>
                @endforelse
            </div>
        </div>

        <div class="page-section space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500">Heti legnagyobb fogás</p>
                    @if ($amIWeeklyTop) 
                        <p class="text-xl font-semibold">Gratulálunk a rekordhoz!</p>
                    @endif
                </div>
            </div>

            @if ($weeklyTopCatch)
                <div class="rounded-3xl bg-gradient-to-br from-sky-500 via-blue-500 to-indigo-600 text-white p-6 space-y-4 relative overflow-hidden glow-effect float-animation" style="background-size: 200% 200%; animation: gradient-shift 5s ease infinite, float 6s ease-in-out infinite;">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-16 -mt-16 blur-2xl"></div>
                    
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full -ml-12 -mb-12 blur-xl"></div>
                    <div class="relative z-10">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center border border-white/30">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                </svg>
                            </div>

                            <p class="text-lg font-semibold">Heti legjobb</p>
                        </div>
                        
                        @if($weeklyTopCatch->foto)
                            <div class="mb-4 rounded-2xl overflow-hidden shadow-2xl border-4 border-white/30 backdrop-blur-sm">
                                <img src="{{ asset($weeklyTopCatch->foto) }}" 
                                     alt="{{ $weeklyTopCatch->species->nev ?? 'Fogás kép' }}" 
                                     class="w-full h-48 object-cover">
                            </div>
                        @endif
                        

                        <p class="text-5xl font-bold drop-shadow-lg">{{ number_format($weeklyTopCatch->suly, 1) }} <span class="text-2xl">kg</span></p>
                        <p class="text-xl font-semibold mt-2 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            {{ $weeklyTopCatch->species->nev ?? 'Ismeretlen halfaj' }}
                        </p>

                        <p class="text-sm opacity-90 flex items-center gap-2 mt-3">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            {{ $weeklyTopCatch->water->nev ?? 'Ismeretlen víz' }}
                        </p>

                        <p class="text-sm opacity-90 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            {{ $weeklyTopCatch->user->name ?? 'Ismeretlen felhasználó' }}
                        </p>

                        <p class="text-sm opacity-90 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            {{ $weeklyTopCatch->datum }}
                        </p>
                        @if($weeklyTopCatch->megjegyzes)
                            <p class="text-sm opacity-90 mt-3 p-3 bg-white/10 rounded-xl backdrop-blur-sm border border-white/20">{{ $weeklyTopCatch->megjegyzes }}</p>
                        @endif

                    </div>
                </div>
            @else
                <p class="text-sm text-slate-500">Az elmúlt 1 hétben még nem fogott senki sem halat.</p>
            @endif

            <div class="rounded-2xl border border-slate-100 p-4 space-y-3">
                <p class="text-sm font-semibold text-slate-500">Kedvenc vizek</p>

                @forelse ($favoriteWaters as $water)
                    <div class="flex items-center justify-between text-sm">
                        <div>
                            <p class="font-semibold">{{ $water->nev }}</p>
                            <p class="text-slate-500">{{ $water->helyszin }}</p>
                        </div>
                        <span class="text-slate-500">{{ $water->catches_count ?? 0 }} fogás</span>
                    </div>

                @empty
                    <p class="text-sm text-slate-500">Még nincsenek kedvenc vizek.</p>
                @endforelse
            </div>
        </div>
    </section>



    <section class="page-section space-y-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-slate-500">Fogásnapló</p>
                <p class="text-xl font-semibold">Legutóbbi bejegyzések</p>
            </div>
            <a href="{{ route('catch-records.create') }}" class="primary-button px-4 py-2 text-sm">Új fogás</a>
        </div>


        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
            @forelse ($recentCatches as $catch)
                <div class="catch-card">

                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-sky-400 to-indigo-500 flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>


                            <p class="font-semibold text-slate-900">{{ $catch->species->nev ?? 'Halfaj' }}</p>
                        </div>
                        <span class="text-xs text-slate-500 bg-slate-100 px-2 py-1 rounded-lg">{{ $catch->datum }}</span>
                    </div>
                    <p class="text-3xl font-bold gradient-text">{{ number_format($catch->suly, 1) }} <span class="text-lg text-slate-600">kg</span></p>
                    <p class="text-sm text-slate-600 flex items-center gap-1">
                        <svg class="w-4 h-4 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>

                        {{ $catch->water->nev ?? 'Ismeretlen víz' }}
                    </p>
                    @if($catch->megjegyzes)
                        <p class="text-xs text-slate-500 mt-2 p-2 bg-slate-50 rounded-lg border border-slate-100">{{ $catch->megjegyzes }}</p>
                    @endif
                </div>
            @empty
                <p class="text-sm text-slate-500">Még nincs elérhető fogási adat.</p>
            @endforelse

        </div>
    </section>




    
</x-app-layout>
