<x-app-layout>
    <x-slot name="header">
        {{ $water->nev }}
    </x-slot>


    <section class="page-section space-y-6">
        <div class="flex items-start justify-between gap-4">
            <div>
                <p class="text-sm text-slate-500">Horgászvíz részletei</p>
                <h1 class="text-3xl font-semibold mt-1">{{ $water->nev }}</h1>
            </div>

            <a href="{{ route('waters.index') }}" class="secondary-button">
                Vissza a vizekhez
            </a>

        </div>

        <div class="grid lg:grid-cols-2 gap-6">
            <div class="space-y-6">

                @if($water->kep)
                    <div class="rounded-3xl overflow-hidden bg-slate-100">
                        <img src="{{ asset($water->kep) }}" 
                             alt="{{ $water->nev }}" 
                             class="w-full h-96 object-cover">
                    </div>
                @else

                    <div class="rounded-3xl bg-gradient-to-br from-sky-100 to-indigo-100 h-96 flex items-center justify-center">
                        <svg class="w-24 h-24 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                @endif



                <div class="rounded-2xl border border-slate-200 bg-white p-6 space-y-4">
                    <h3 class="text-lg font-semibold">Alapinformációk</h3>
                    <div class="space-y-3">

                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" stroke-width="1.5"/>
                                <circle cx="12" cy="9" r="2.5" stroke-width="1.5"/>
                            </svg>

                            <div>
                                <p class="text-sm text-slate-500">Helyszín</p>
                                <p class="font-semibold">{{ $water->helyszin }}</p>
                            </div>

                        </div>
                        @if($water->tipus)

                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path d="M4 12c3-6 13-6 16 0-3 6-13 6-16 0Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 5v14" stroke-width="1.5" stroke-linecap="round"/>
                                </svg>
                                <div>

                                    <p class="text-sm text-slate-500">Típus</p>
                                    <p class="font-semibold">{{ $water->tipus }}</p>
                                </div>
                            </div>

                        @endif
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 0 0 1.946-.806 3.42 3.42 0 0 1 4.438 0 3.42 3.42 0 0 0 1.946.806 3.42 3.42 0 0 1 3.138 3.138 3.42 3.42 0 0 0 .806 1.946 3.42 3.42 0 0 1 0 4.438 3.42 3.42 0 0 0-.806 1.946 3.42 3.42 0 0 1-3.138 3.138 3.42 3.42 0 0 0-1.946.806 3.42 3.42 0 0 1-4.438 0 3.42 3.42 0 0 0-1.946-.806 3.42 3.42 0 0 1-3.138-3.138 3.42 3.42 0 0 0-.806-1.946 3.42 3.42 0 0 1 0-4.438 3.42 3.42 0 0 0 .806-1.946 3.42 3.42 0 0 1 3.138-3.138z" stroke-width="1.5"/>
                            </svg>

                            <div>
                                <p class="text-sm text-slate-500">Rögzített fogások</p>
                                <p class="font-semibold">{{ $water->catches_count ?? 0 }} fogás</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="space-y-6">
                @if($water->leiras)

                    <div class="rounded-2xl border border-slate-200 bg-white p-6">
                        <h3 class="text-lg font-semibold mb-3">Leírás</h3>
                        <p class="text-slate-600 whitespace-pre-line">{{ $water->leiras }}</p>
                    </div>
                @endif

                <div class="rounded-2xl border border-sky-200 bg-sky-50 p-6">
                    <div class="flex items-start gap-3">

                        <svg class="w-6 h-6 text-sky-600 flex-shrink-0 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z" stroke-width="1.5"/>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-sky-900 mb-1">Horgászvíz információk</h4>
                            <p class="text-sm text-sky-800">
                                Ez a vízterület része a HorgászApp közösségi adatbázisának. Az információk a felhasználók által megosztott adatokból származnak.
                            </p>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        @auth
            @if(auth()->user()->isAdmin())
                <div class="flex gap-3 pt-4 border-t border-slate-200">
                    <a href="{{ route('waters.edit', $water) }}" class="secondary-button">
                        Vízterület szerkesztése
                    </a>
                </div>
            @endif

        @endauth
    </section>
    
</x-app-layout>