<x-app-layout>
    <x-slot name="header">
        Profil beállítások
    </x-slot>

    <div class="space-y-6">

        <section class="grid gap-4 md:grid-cols-3">
            <div class="stat-card glow-effect">

                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sky-400 to-blue-500 flex items-center justify-center shadow-lg shadow-sky-200/50">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>

                    <p class="text-sm text-slate-500 font-medium">Összes fogás</p>
                </div>
                <p class="text-3xl font-bold gradient-text">{{ $totalCatches ?? 0 }}</p>
                <p class="text-xs text-slate-400 mt-1">halat fogtál</p>
            </div>

            <div class="stat-card glow-effect">
                <div class="flex items-center gap-3 mb-2">

                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center shadow-lg shadow-amber-200/50 float-animation">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                        </svg>

                    </div>
                    <p class="text-sm text-slate-500 font-medium">Összes súly</p>
                </div>

                <p class="text-3xl font-bold gradient-text">{{ number_format($totalWeight ?? 0, 1) }} <span class="text-lg text-slate-600">kg</span></p>
                <p class="text-xs text-slate-400 mt-1">halat fogtál</p>

            </div>
            <div class="stat-card glow-effect">

                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center shadow-lg shadow-emerald-200/50">
                      
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>

                    </div>
                    <p class="text-sm text-slate-500 font-medium">Kedvenc víz</p>
                </div>

                <p class="text-2xl font-bold gradient-text">{{ $favoriteWater->nev ?? 'Nincs adat' }}</p>
                <p class="text-xs text-slate-400 mt-1">legtöbbet itt horgásztál</p>
            </div>
        </section>

        <div class="space-y-6">

            <div class="page-section">
                <div class="max-w-2xl">
                    @include('profile.partials.update-profile-information-form')
                </div>

            </div>

            <div class="page-section">
                <div class="max-w-2xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="page-section">
                <div class="max-w-2xl">

                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>


</x-app-layout>