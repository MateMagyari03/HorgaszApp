<x-app-layout>
    <x-slot name="header">
        {{ $ban->species->nev }} - Tilalmi idő
    </x-slot>

    
    <section class="page-section space-y-6">
        <div class="flex items-start justify-between gap-4">
            <div>

                <p class="text-sm text-slate-500">Halfaj részletei</p>
                <h1 class="text-3xl font-semibold mt-1">{{ $ban->species->nev }}</h1>
            </div>
            <a href="{{ route('bans.index') }}" class="secondary-button">
                Vissza a tilalmi időkhez
            </a>

        </div>

        <div class="grid lg:grid-cols-2 gap-6">
            <div class="space-y-6">
                @if($ban->species->kep)
                    <div class="rounded-3xl overflow-hidden bg-slate-100">
                        <img src="{{ asset($ban->species->kep) }}" 
                             alt="{{ $ban->species->nev }}" 
                             class="w-full h-96 object-cover">
                    </div>
                @else
                    <div class="rounded-3xl bg-gradient-to-br from-sky-100 to-indigo-100 h-96 flex items-center justify-center">
                        <svg class="w-24 h-24 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d=
                            "M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                    </div>
                @endif


                <div class="rounded-2xl border border-slate-200 bg-white p-6 space-y-4">
                    <h3 class="text-lg font-semibold">Tilalmi időszak</h3>
                    <div class="space-y-3">

                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M8 2v4M16 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z" stroke-width="1.5"/>
                            </svg>
                            <div>

                                <p class="text-sm text-slate-500">Kezdete</p>
                                <p class="font-semibold">{{ \Carbon\Carbon::parse($ban->kezdete)->format('Y. F j.') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">

                            <svg class="w-5 h-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M8 2v4M16 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z" stroke-width="1.5"/>
                            </svg>
                            <div>
                                <p class="text-sm text-slate-500">Vége</p>
                                <p class="font-semibold">{{ \Carbon\Carbon::parse($ban->vege)->format('Y. F j.') }}</p>
                            </div>

                        </div>


                        @if($ban->megjegyzes)
                            <div class="pt-3 border-t border-slate-200">
                                <p class="text-sm text-slate-500 mb-1">Megjegyzés</p>
                                <p class="text-slate-700">{{ $ban->megjegyzes }}</p>
                            </div>
                        @endif

                    </div>
                </div>
            </div>



            <div class="space-y-6">

                @if($ban->species->leiras)
                    <div class="rounded-2xl border border-slate-200 bg-white p-6">
                        <h3 class="text-lg font-semibold mb-3">Leírás</h3>
                        <p class="text-slate-600 whitespace-pre-line">{{ $ban->species->leiras }}</p>
                    </div>
                @endif

                @if($ban->species->előhely)
                    <div class="rounded-2xl border border-slate-200 bg-white p-6">
                        <h3 class="text-lg font-semibold mb-3 flex items-center gap-2">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" stroke-width="1.5"/>
                                <circle cx="12" cy="9" r="2.5" stroke-width="1.5"/>
                            </svg>
                            Hol él
                        </h3>
                        <p class="text-slate-600 whitespace-pre-line">{{ $ban->species->előhely }}</p>
                    </div>
                @endif

                <div class="rounded-2xl border border-amber-200 bg-amber-50 p-6">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-amber-600 flex-shrink-0 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                        <div>
                            <h4 class="font-semibold text-amber-900 mb-1">Fontos információ</h4>
                            <p class="text-sm text-amber-800">
                                A tilalmi időszakban a halfaj fogása és megtartása tilos. A szabályok betartása minden horgász felelőssége.
                            </p>

                        </div>
                    </div>
                </div>
            </div>


        </div>

        @auth
            @if(auth()->user()->isAdmin())
                <div class="flex gap-3 pt-4 border-t border-slate-200">
                    <a href="{{ route('bans.edit', $ban) }}" class="secondary-button">
                        Tilalmi idő szerkesztése
                    </a>
                </div>
            @endif
        @endauth
    </section>
    
</x-app-layout>




