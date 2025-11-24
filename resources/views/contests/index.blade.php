<x-app-layout>
    <x-slot name="header">
        Versenyek
    </x-slot>


    <section class="page-section flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <p class="text-sm text-slate-500">Aktív és lezárt versenyek</p>
            <p class="text-2xl font-semibold">Horgászversenyek</p>
        </div>
        @auth
            @if(auth()->user()->isAdmin())
                <a href="{{ route('contests.create') }}" class="primary-button px-4 py-2 text-sm">Új verseny létrehozása</a>
            @endif
        @endauth
    </section>
    <section class="grid gap-6 md:grid-cols-2">
        @forelse ($contests as $contest)

            <div class="rounded-3xl border border-slate-100 bg-white shadow-sm p-6 flex flex-col gap-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xl font-semibold">{{ $contest->nev }}</p>
                        <p class="text-sm text-slate-500 mt-1">{{ $contest->helyszin }}</p>
                    </div>


                    @php
                        $status = $contest->status;
                    @endphp


                    @if($status === 'nyitott')
                        <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">Nyitott</span>
                    @elseif($status === 'aktív')
                        <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">Aktív</span>
                    
                        @else
                        <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-700 text-xs font-semibold">Lezárt</span>
                    @endif

                </div>
                
                <div class="text-sm text-slate-600 space-y-2">
                    <p class="flex items-center gap-2">

                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M8 2v4M16 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                        {{ \Carbon\Carbon::parse($contest->datum_kezdete)->format('Y.m.d') }} – {{ \Carbon\Carbon::parse($contest->datum_vege)->format('Y.m.d') }}
                    </p>

                    @if($contest->dij)
                        <p class="flex items-center gap-2">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Nevezési díj: {{ number_format($contest->dij, 0, '.', ' ') }} Ft
                        </p>
                    @endif

                </div>



                @if($contest->leiras)
                    <p class="text-sm text-slate-600 line-clamp-2">{{ $contest->leiras }}</p>
                @endif

                <div class="flex gap-3 flex-wrap">
                    <a href="{{ route('contests.show', $contest) }}" class="secondary-button flex-1 text-center">
                        Részletek
                    </a>

                    @if($contest->canRegister())
                        @auth
                            @if(!auth()->user()->isAdmin())

                                @php
                                    $isRegistered = \App\Models\Registration::where('contest_id', $contest->id)
                                        ->where('user_id', auth()->id())
                                        ->exists();
                                @endphp

                                @if(!$isRegistered)
                                    <form action="{{ route('contest.quickRegister', $contest) }}" method="POST" class="flex-1">
                                        @csrf
                                        <button type="submit" class="primary-button w-full">
                                            Nevezés
                                        </button>
                                    </form>
                                @else
                                    <span class="secondary-button flex-1 text-center bg-green-50 text-green-700 border-green-200">
                                        Már neveztél
                                    </span>
                                @endif
                            @endif
                        @endauth
                    @endif




                    @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('contests.edit', $contest) }}" class="secondary-button">
                                Szerkesztés
                            </a>

                            <form action="{{ route('contests.destroy', $contest) }}" method="POST" onsubmit="return confirm('Biztosan törlöd?')">
                                
                            @csrf
                                @method('DELETE')
                                <button type="submit" class="secondary-button text-red-600 border-red-200 hover:border-red-300">
                                    Törlés
                                </button>
                            </form>
                        @endif
                    @endauth



                </div>
            </div>

        @empty
            <div class="col-span-full page-section text-center py-12">
                <p class="text-slate-500">Jelenleg nincs meghirdetett verseny.</p>
            </div>
        @endforelse
    </section>

    
</x-app-layout>