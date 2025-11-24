<x-app-layout>
    <x-slot name="header">
        Versenyeim
    </x-slot>

    <section class="page-section space-y-4">
        <div>
            <p class="text-sm text-slate-500">A versenyek, amelyekre neveztél</p>
            <p class="text-2xl font-semibold">Jelentkezéseim</p>
        </div>

        @forelse ($registrations as $registration)

            <div class="rounded-3xl border border-slate-100 bg-white shadow-sm p-6 flex flex-col gap-4">
                <div class="flex items-center justify-between">
                    <div>

                        <p class="text-xl font-semibold">{{ $registration->contest->nev }}</p>
                        <p class="text-sm text-slate-500 mt-1">{{ $registration->contest->helyszin }}</p>
                    </div>
                    <span class="px-4 py-2 rounded-full bg-sky-100 text-sky-700 text-sm font-semibold">Nevezett</span>
                </div>
                

                <div class="text-sm text-slate-600 flex items-center gap-4 flex-wrap">
                    <span class="flex items-center gap-2">
                      
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M8 2v4M16 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        {{ \Carbon\Carbon::parse($registration->contest->datum_kezdete)->format('Y.m.d') }} – {{ \Carbon\Carbon::parse($registration->contest->datum_vege)->format('Y.m.d') }}
                    </span>

                    @if($registration->contest->dij)
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            {{ number_format($registration->contest->dij, 0, '.', ' ') }} Ft nevezési díj
                        </span>
                    @endif


                </div>

                @if($registration->contest->leiras)
                    <p class="text-sm text-slate-600">{{ $registration->contest->leiras }}</p>
                @endif


                <div class="flex gap-3">
                    <form action="{{ route('registrations.destroy', $registration) }}" method="POST" onsubmit="return confirm('Biztosan visszavonod a nevezésedet?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="secondary-button text-red-600 border-red-200 hover:border-red-300 hover:bg-red-50">
                            Nevezés visszavonása
                        </button>
                    </form>

                    <a href="{{ route('contests.show', $registration->contest) }}" class="secondary-button">
                        Verseny részletei
                    </a>
                </div>
            </div>

        @empty
            <div class="page-section text-center py-12">
                <p class="text-slate-500 mb-4">Még nincs aktív nevezésed.</p>
                <a href="{{ route('contests.index') }}" class="primary-button inline-flex">
                    Versenyek böngészése
                </a>
            </div>
        @endforelse

    </section>


</x-app-layout>

