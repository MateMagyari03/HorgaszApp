<x-app-layout>
    <x-slot name="header">
        Fogási napló
    </x-slot>

    @auth
        @if(auth()->user()->isAdmin() && isset($users))

            <section class="page-section space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-500">Válassz egy felhasználót a fogásai megtekintéséhez</p>
                        <p class="text-2xl font-semibold">Felhasználók fogásai</p>
                    </div>
                    <a href="{{ route('catch-records.export') }}"
                       class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors shadow-md hover:shadow-lg">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3v12m0 0l-4-4m4 4l4-4M4 17h16" />
                        </svg>
                        CSV letöltése
                    </a>
                </div>


                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                    @forelse ($users as $user)
                        <a href="{{ route('catch-records.user', $user->id) }}" 
                           class="rounded-2xl border border-slate-100 bg-white shadow-sm p-6 hover:shadow-md transition">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-sky-400 to-indigo-500 text-white flex items-center justify-center font-semibold">
                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                </div>

                                <div>
                                    <p class="font-semibold">{{ $user->name }}</p>
                                    <p class="text-sm text-slate-500">{{ $user->catches_count ?? 0 }} fogás</p>
                                </div>
                            </div>
                        </a>
                    @empty

                        <p class="text-sm text-slate-500">Nincsenek felhasználók.</p>
                    @endforelse

                </div>
            </section>



        @elseif(isset($userCatches))
            <section class="page-section space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-500">Felhasználó fogásai</p>
                        <p class="text-2xl font-semibold">{{ $selectedUser->name }} fogásai</p>
                    </div>
                    <div class="flex items-center gap-3">
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('catch-records.export') }}"
                               class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors shadow-md hover:shadow-lg">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 3v12m0 0l-4-4m4 4l4-4M4 17h16" />
                                </svg>
                                CSV letöltése
                            </a>
                        @endif
                        <a href="{{ route('catch-records.index') }}" class="secondary-button">Vissza a listához</a>
                    </div>
                </div>


                <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                    @forelse ($userCatches as $catch)
                        <div class="rounded-2xl border border-slate-100 p-4 space-y-2">
                            <div class="flex items-center justify-between">
                                <p class="font-semibold">{{ $catch->species->nev ?? 'Halfaj' }}</p>
                                <span class="text-xs text-slate-500">{{ $catch->datum }}</span>
                            </div>
                            <p class="text-2xl font-semibold">{{ number_format($catch->suly, 1) }} kg</p>
                            <p class="text-sm text-slate-500">{{ $catch->water->nev ?? 'Ismeretlen víz' }}</p>
                            @if($catch->megjegyzes)

                                <p class="text-xs text-slate-400">{{ $catch->megjegyzes }}</p>
                            @endif
                        </div>
                    @empty
                        <p class="text-sm text-slate-500">Ennek a felhasználónak még nincs fogása.</p>
                    @endforelse


                </div>
            </section>
        @else
            <section class="page-section space-y-4">
                <div class="flex items-center justify-between">
                    <div>

                        <p class="text-sm text-slate-500">Összesen {{ $records->count() }} fogás rögzítve</p>
                        <p class="text-2xl font-semibold">Fogásaim</p>
                    </div>

                    <a href="{{ route('catch-records.create') }}" class="primary-button">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M12 5v14M5 12h14" stroke-width="1.6" stroke-linecap="round" />
                        </svg>
                        Új fogás rögzítése
                    </a>

                </div>

                <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">

                    @forelse ($records as $record)
                        <div class="rounded-2xl border border-slate-100 p-4 space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="px-3 py-1 rounded-full bg-sky-100 text-sky-700 text-xs font-semibold">
                                    {{ $record->species->nev ?? 'Halfaj' }}

                                </span>
                                <span class="text-xs text-slate-500">{{ $record->datum }}</span>
                            </div>
                            <p class="text-3xl font-semibold">{{ number_format($record->suly, 1) }} kg</p>
                          
                            <div class="text-sm text-slate-600 space-y-1">
                                <p class="flex items-center gap-2">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" stroke-width="1.5"/>
                                        <circle cx="12" cy="9" r="2.5" stroke-width="1.5"/>
                                    </svg>
                                    {{ $record->water->nev ?? 'Ismeretlen víz' }}
                                </p>

                                @if($record->hossz)
                                    <p class="text-xs text-slate-500">Hossz: {{ $record->hossz }} cm</p>
                                @endif

                            </div>

                            @if($record->megjegyzes)
                                <p class="text-xs text-slate-400">{{ $record->megjegyzes }}</p>
                            @endif

                            @if($record->foto)
                                <div class="rounded-xl overflow-hidden">
                                    <img src="{{ asset($record->foto) }}" alt="Fogás kép" class="w-full h-32 object-cover">
                                </div>
                            @endif
                        </div>
                    @empty


                        <div class="col-span-full page-section text-center py-12">
                            <p class="text-slate-500 mb-4">Még nincs rögzített fogásod.</p>
                            <a href="{{ route('catch-records.create') }}" class="primary-button inline-flex">
                                Első fogás rögzítése
                            </a>
                        </div>
                    @endforelse
                </div>
            </section>
        @endif

    @endauth

</x-app-layout>