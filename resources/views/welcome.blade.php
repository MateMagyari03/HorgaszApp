<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'HorgászApp') }} - Horgászok közösségi platformja</title>
    
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}?v=2">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>



<body class="min-h-screen bg-gradient-to-br from-sky-50 via-white to-indigo-50 text-slate-900">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
   
    <div class="w-96 h-96 bg-sky-200/30 blur-3xl rounded-full absolute -top-20 -left-10"></div>
        <div class="w-[32rem] h-[32rem] bg-indigo-200/30 blur-[150px] rounded-full absolute bottom-0 right-0"></div>
   
    </div>

    <div class="relative z-10 max-w-6xl mx-auto px-6 py-10 flex flex-col gap-16">
        <header class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-sky-400 to-indigo-500 flex items-center justify-center text-white text-xl font-bold">
                    🎣
            
                </div>
                <div>
                    <p class="text-lg font-semibold">HorgászApp</p>

                    <p class="text-sm text-slate-500">Horgászok közösségi platformja</p>
                </div>
            </div>


            @if (Route::has('login'))
                <div class="flex items-center gap-3">

                    @auth
                        <a href="{{ url('/dashboard') }}" class="secondary-button">
                            Vezérlőpult
                        </a>
                    @else

                        <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-700">Bejelentkezés</a>
                        @if (Route::has('register'))

                            <a href="{{ route('register') }}" class="primary-button px-6 py-2.5">
                                Regisztráció
                            </a>
                        @endif

                    @endauth

                </div>
            @endif
        </header>

        <main class="grid gap-12 md:grid-cols-2 items-center">
            <div class="space-y-8">
               
            <p class="text-sm uppercase tracking-[0.3em] text-sky-500 font-semibold">Digitális horgász napló</p>
                <h1 class="text-4xl sm:text-5xl font-semibold leading-tight">
                    Kövesd a fogásaid, versenyezz a barátokkal és fedezd fel a legjobb vizeket.
               
                </h1>
                <p class="text-lg text-slate-600">

                    Egyetlen platform a horgászoknak, ahol naplózhatod az eredményeidet, értesülhetsz a tilalmakról
                    és csatlakozhatsz a legizgalmasabb versenyekhez.
                </p>

                <div class="flex flex-col sm:flex-row gap-3">
                  
                <a href="{{ route('login') }}" class="primary-button text-base">

                        Bejelentkezés
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="secondary-button text-base bg-white">
                            Fiók létrehozása
                        </a>
                    @endif
                </div>


                <div class="rounded-3xl bg-white/80 backdrop-blur shadow-lg p-6 flex flex-wrap gap-6 border border-white">
                    <div>

                        <p class="text-3xl font-semibold">500+</p>
                       
                        <p class="text-sm text-slate-500">regisztrált horgász</p>
                    </div>

                    <div>
                        <p class="text-3xl font-semibold">1200+</p>
                        <p class="text-sm text-slate-500">naplózott fogás</p>
                    </div>


                    <div>
                        <p class="text-3xl font-semibold">48</p>
                        <p class="text-sm text-slate-500">kedvenc vízterület</p>
                    </div>
                </div>
        </div>

            <div class="relative">

                <div class="rounded-[2.5rem] bg-white/90 backdrop-blur border border-white shadow-2xl p-6 space-y-6">
                    <div class="rounded-3xl overflow-hidden">
                       
                    <img src="{{ asset($weeklyTopCatch->foto) }}"
                             alt="Horgász élmény"
                             class="w-full h-72 object-cover">
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-slate-500">Heti legnagyobb fogás</p>
                            <span class="text-xs font-semibold px-3 py-1 rounded-full bg-sky-100 text-sky-700">Ponty</span>
                        </div>

                        <p class="text-3xl font-semibold">{{ number_format($weeklyTopCatch->suly, 1) }}</p>

                        <p class="text-sm text-slate-500">{{ $weeklyTopCatch->water->nev }} | {{ $weeklyTopCatch->user->name }}</p>

                        <div class="grid grid-cols-2 gap-3">

                            <div class="rounded-2xl bg-slate-50 px-4 py-3">

                                <p class="text-xs uppercase tracking-wide text-slate-500">Következő verseny</p>
                                <p class="font-semibold">Tavaszi Pontyverseny</p>

                                <p class="text-sm text-slate-500">{{ $weeklyTopCatch->datum }}</p>
                            </div>



                            <div class="rounded-2xl bg-slate-50 px-4 py-3">
                                <p class="text-xs uppercase tracking-wide text-slate-500">Tilalmi emlékeztető</p>
                                <p class="font-semibold">Harcsa</p>
                                <p class="text-sm text-slate-500">Május 2. – június 15.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>


        <section class="grid md:grid-cols-3 gap-6">
            <div class="page-section bg-white/80">
                <p class="text-sm font-semibold text-sky-500">Fogási napló</p>
                <p class="mt-2 text-lg font-semibold">Rögzítsd, elemezd, fejlődj</p>
                <p class="text-sm text-slate-500 mt-3">Intelligens statisztikák a legjobb csalikról, napszakokról és helyszínekről.</p>
            </div>


            <div class="page-section bg-white/80">
                <p class="text-sm font-semibold text-indigo-500">Verseny modul</p>
                <p class="mt-2 text-lg font-semibold">Nevezés egy kattintással</p>
                <p class="text-sm text-slate-500 mt-3">Kövesd az aktív és lezárt fordulókat, nézd meg az eredménylistát.</p>
            </div>

            <div class="page-section bg-white/80">
                <p class="text-sm font-semibold text-emerald-500">Tilalmi figyelő</p>
                <p class="mt-2 text-lg font-semibold">Biztonság a vízen</p>
                <p class="text-sm text-slate-500 mt-3">Emlékeztetők és országos szabályzatok egy helyen, valós időben.</p>
            </div>
        </section>
    </div>
    </body>



    
</html>


