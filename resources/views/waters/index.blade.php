<x-app-layout>
    <x-slot name="header">
        Horgászvizek
    </x-slot>


    <section class="page-section flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <p class="text-sm text-slate-500">Fedezd fel Magyarország kedvenc horgászhelyeit</p>
            <p class="text-2xl font-semibold">Vízterületek és leírások</p>
        </div>

        <div class="flex gap-3">
            <form method="GET" action="{{ route('waters.index') }}" class="flex items-center gap-2 bg-white rounded-2xl px-4 py-2 border border-slate-200 shadow-sm">
               
            <input type="text"
                       name="q"
                       value="{{ $search }}"
                       placeholder="Víz vagy helyszín keresése"
                       class="border-0 focus:ring-0 text-sm w-48 sm:w-64">
                @if($search)

                    <a href="{{ route('waters.index') }}" class="text-xs text-slate-500">Törlés</a>
                @endif
            </form>

            @auth
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('waters.create') }}" class="primary-button px-4 py-2 text-sm">Új vízterület</a>
                @endif
            @endauth

        </div>
    </section>



    <section class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @forelse ($waters as $water)

            <div class="rounded-3xl border border-slate-100 bg-white shadow-sm overflow-hidden flex flex-col">
                <div class="h-48 w-full overflow-hidden">
                    @if ($water->kep)
                        <img src="{{ asset('storage/' . $water->kep) }}" alt="{{ $water->nev }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-400 text-sm">Nincs feltöltött kép</div>
                    @endif

                </div>
                <div class="p-5 flex-1 flex flex-col gap-4">
                    <div>
                        <p class="text-sm text-slate-500">{{ $water->helyszin }}</p>
                        <p class="text-xl font-semibold">{{ $water->nev }}</p>

                    </div>

                    <p class="text-sm text-slate-600 h-16 overflow-hidden">{{ $water->leiras }}</p>
                    <div class="flex items-center justify-between text-sm">
                        <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-600">
                            {{ $water->tipus ?? 'Szabad víz' }}
                        </span>

                    </div>
                    <div class="flex gap-3 pt-2">
                        <a href="{{ route('waters.show', $water) }}" class="secondary-button flex-1 text-center text-sm">
                            Részletek
                        </a>


                        @auth
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('waters.edit', $water) }}" class="secondary-button text-sm px-3">
                                    Szerkesztés
                                </a>
                                <form action="{{ route('waters.destroy', $water) }}" method="POST" onsubmit="return confirm('Biztosan törlöd?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="secondary-button text-sm px-3 text-red-600 border-red-200 hover:border-red-300">
                                        Törlés
                                    </button>
                                </form>
                            @endif
                        @endauth

                    </div>
                </div>
            </div>

        @empty
            <p class="text-sm text-slate-500">Nincs a keresésnek megfelelő vízterület.</p>
        @endforelse
    </section>

    
</x-app-layout>
