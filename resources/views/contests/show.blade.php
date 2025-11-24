<x-app-layout>
    <x-slot name="header">
        {{ $contest->nev }}
    </x-slot>


    <section class="page-section space-y-6">
        <div class="flex items-start justify-between gap-4">
            <div>

                <p class="text-sm text-slate-500">Verseny részletei</p>
                <h1 class="text-3xl font-semibold mt-1">{{ $contest->nev }}</h1>
            </div>


            @php
                $status = $contest->status;
            @endphp

            @if($status === 'nyitott')
                <span class="px-4 py-2 rounded-full bg-blue-100 text-blue-700 font-semibold">Nyitott</span>
            @elseif($status === 'aktív')
                <span class="px-4 py-2 rounded-full bg-green-100 text-green-700 font-semibold">Aktív</span>
            @else

                <span class="px-4 py-2 rounded-full bg-slate-100 text-slate-700 font-semibold">Lezárt</span>
            @endif


        </div>


        <div class="grid md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div class="flex items-center gap-3 text-slate-600">
                   
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" stroke-width="1.5"/>
                        <circle cx="12" cy="9" r="2.5" stroke-width="1.5"/>
                    </svg>

                    <span class="font-semibold">Helyszín:</span>
                    <span>{{ $contest->helyszin }}</span>
                </div>



                <div class="flex items-center gap-3 text-slate-600">
                    
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M8 2v4M16 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    <span class="font-semibold">Dátum:</span>
                    <span>{{ \Carbon\Carbon::parse($contest->datum_kezdete)->format('Y.m.d') }} – {{ \Carbon\Carbon::parse($contest->datum_vege)->format('Y.m.d') }}</span>
                </div>


                @if($contest->dij)
                    <div class="flex items-center gap-3 text-slate-600">
                       
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                        <span class="font-semibold">Nevezési díj:</span>
                        <span>{{ number_format($contest->dij, 0, '.', ' ') }} Ft</span>
                    </div>
                @endif



                @if($contest->max_letszam)
                    <div class="flex items-center gap-3 text-slate-600">
                       
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="9" cy="7" r="4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                        <span class="font-semibold">Maximum létszám:</span>
                        <span>{{ $contest->max_letszam }} fő</span>
                    </div>
                @endif
            </div>


            <div class="space-y-4">
                @if($contest->leiras)
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Részletes leírás</h3>
                        <p class="text-slate-600 whitespace-pre-line">{{ $contest->leiras }}</p>
                    </div>
                @endif

            </div>
        </div>

        @auth

            <div class="flex gap-3 pt-4 border-t border-slate-200">
                @if($contest->canRegister())
                    @if($isRegistered)
                        <span class="secondary-button bg-green-50 text-green-700 border-green-200">
                            Már neveztél erre a versenyre
                        </span>
                    @else

                        <form action="{{ route('contest.quickRegister', $contest) }}" method="POST">
                            @csrf
                            <button type="submit" class="primary-button">
                                Nevezés a versenyre
                            </button>
                        </form>
                    @endif

                @elseif($isRegistered && $status === 'aktív')
                    <span class="secondary-button bg-green-50 text-green-700 border-green-200">
                        Neveztél - verseny folyamatban
                    </span>
                @elseif($status === 'aktív')
                    <span class="secondary-button bg-amber-50 text-amber-700 border-amber-200">
                        Verseny folyamatban - nem lehet már jelentkezni
                    </span>
                @elseif($status === 'lezárt')


                    <span class="secondary-button bg-slate-50 text-slate-600 border-slate-200">
                        Verseny lezárt
                    </span>
                @endif
                <a href="{{ route('contests.index') }}" class="secondary-button">
                    Vissza a versenyekhez
                </a>
                @if(auth()->user()->isAdmin())

                    <a href="{{ route('contests.edit', $contest) }}" class="secondary-button">
                        Szerkesztés
                    </a>
                @endif

            </div>
        @endauth
    </section>
    
</x-app-layout>




