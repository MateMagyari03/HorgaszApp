<x-app-layout>
    <x-slot name="header">
        Tilalmi idők
    </x-slot>

    <section class="page-section flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <p class="text-sm text-slate-500">Halfajok tilalmi időszakai</p>
            <p class="text-2xl font-semibold">Tilalmi idők</p>
        </div>

        @auth
            @if(auth()->user()->isAdmin())
                <a href="{{ route('bans.create') }}" class="primary-button px-4 py-2 text-sm">Új tilalmi idő hozzáadása</a>
            @endif
        @endauth

    </section>

    <section class="page-section space-y-4">


        <div class="flex items-center gap-3 bg-white rounded-2xl border border-slate-200 px-4 py-3">
            <svg class="w-5 h-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

            <p class="text-sm text-slate-600">
                <span class="font-semibold">Fontos:</span> A tilalmi idők betartása minden horgász felelőssége. A megadott időszakokban a halfajok védettek, fogásuk és megtartásuk tilos.
            </p>
        </div>



        <div class="flex items-center gap-2 bg-white rounded-2xl border border-slate-200 px-4 py-3">
            <input type="text" 
                   id="searchSpecies" 
                   placeholder="Halfaj keresése..." 
                   class="flex-1 border-0 focus:ring-0 text-sm"
                   onkeyup="filterTable()">

        </div>

        <div class="space-y-3" id="bansList">
            @forelse ($bans as $ban)


                <div class="rounded-2xl border border-slate-100 bg-white shadow-sm p-5 hover:shadow-md transition" data-species-name="{{ strtolower($ban->species->nev) }}">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-3">
                                <h3 class="text-xl font-semibold">{{ $ban->species->nev }}</h3>
                                <a href="{{ route('bans.show', $ban) }}" class="text-sm text-sky-600 font-semibold hover:text-sky-700">
                                    Részletek →
                                </a>


                            </div>
                            <div class="grid md:grid-cols-3 gap-4 text-sm">
                                <div class="flex items-center gap-2 text-slate-600">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path d="M8 2v4M16 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z" stroke-width="1.5"/>
                                    </svg>

                                    <span class="font-semibold">Kezdete:</span>
                                    <span>{{ \Carbon\Carbon::parse($ban->kezdete)->format('M d.') }}</span>
                                </div>


                                <div class="flex items-center gap-2 text-slate-600">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path d="M8 2v4M16 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z" stroke-width="1.5"/>
                                    </svg>

                                    <span class="font-semibold">Vége:</span>
                                    <span>{{ \Carbon\Carbon::parse($ban->vege)->format('M d.') }}</span>
                                </div>

                                <div class="flex items-center gap-2 text-slate-600">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z" stroke-width="1.5"/>
                                    </svg>
                                    <span>{{ $ban->megjegyzes ?? 'Országos' }}</span>
                                </div>
                            </div>
                        </div>


                        @auth

                            @if(auth()->user()->isAdmin())
                                <div class="flex gap-2">
                                    <a href="{{ route('bans.edit', $ban) }}" class="secondary-button text-sm px-3 py-2">
                                        Szerkesztés
                                    </a>
                                    <form action="{{ route('bans.destroy', $ban) }}" method="POST" onsubmit="return confirm('Biztosan törlöd?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="secondary-button text-sm px-3 py-2 text-red-600 border-red-200 hover:border-red-300">
                                            Törlés
                                        </button>
                                    </form>
                                </div>
                            @endif

                        @endauth
                    </div>
                </div>
            @empty


                <div class="page-section text-center py-12">
                    <p class="text-slate-500">Nincsenek tilalmi idők rögzítve.</p>
                </div>
            @endforelse
        </div>
    </section>



    <script>
        function filterTable() {
            const input = document.getElementById('searchSpecies');
            const filter = input.value.toLowerCase();
            const items = document.querySelectorAll('#bansList > div');

            items.forEach(item => {
                const speciesName = item.getAttribute('data-species-name');
                if (speciesName.includes(filter)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }

            });
        }
    </script>






</x-app-layout>