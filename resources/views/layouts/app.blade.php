<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'HorgászApp') }} - Horgászok közösségi platformja</title>

        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}?v=2">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="app-shell">
            @include('layouts.navigation')

            <div class="flex-1 flex flex-col">

                <header class="px-3 sm:px-4 lg:px-8 pt-4 sm:pt-6 pb-4 relative z-10">
                    <div class="flex flex-col gap-4 sm:gap-6 rounded-2xl sm:rounded-3xl bg-white/90 backdrop-blur-md border border-white/50 shadow-xl shadow-sky-200/20 p-4 sm:p-6 lg:p-8 relative overflow-hidden" style="animation: fadeIn 0.6s ease-out;">
                        
                        <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-sky-200/20 to-indigo-200/20 rounded-full blur-3xl -mr-32 -mt-32"></div>
                        <div class="absolute bottom-0 left-0 w-48 h-48 bg-gradient-to-tr from-blue-200/20 to-sky-200/20 rounded-full blur-2xl -ml-24 -mb-24"></div>
                        
                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 relative z-10">
                            <div class="flex-1 min-w-0">

                                @if (isset($header))
                                    <div class="flex items-center gap-2 sm:gap-3 mb-2">
                                        <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-gradient-to-br from-sky-400 to-indigo-500 flex items-center justify-center shadow-lg shadow-sky-200/50 float-animation flex-shrink-0">
                                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                            </svg>
                                        </div>
                                        <h1 class="text-xl sm:text-2xl font-bold gradient-text break-words">{{ $header }}</h1>
                                    </div>
                                @else
                                    <div class="flex items-center gap-2 sm:gap-3 mb-3">
                                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-gradient-to-br from-sky-400 via-blue-500 to-indigo-500 flex items-center justify-center shadow-lg shadow-sky-300/50 float-animation flex-shrink-0" style="animation: float 4s ease-in-out infinite;">
                                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                            </svg>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <div class="text-xs uppercase tracking-widest text-slate-400 font-bold">HorgászApp</div>
                                            <div class="text-2xl sm:text-3xl font-bold gradient-text mt-1 break-words">Üdv újra a fedélzeten!</div>
                                        </div>
                                    </div>
                                @endif
                                <p class="text-slate-600 mt-2 max-w-2xl text-sm sm:text-base leading-relaxed hidden lg:block">
                                    Tartsd egyben a fogásaid, versenyeid és kedvenc vizeid – minden egy modern felületen.
                                </p>
                            </div>
                            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 lg:flex-shrink-0">
                                <a href="{{ route('catch-records.create') }}"
                                   class="primary-button group justify-center sm:justify-start text-sm sm:text-base">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 transition-transform group-hover:rotate-90" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path d="M12 5v14M5 12h14" stroke-width="1.8" stroke-linecap="round" />
                                    </svg>
                                    <span class="hidden sm:inline">Új fogás</span>
                                    <span class="sm:hidden">Új</span>
                                </a>
                                <div class="hidden lg:flex items-center gap-3 px-4 py-3 rounded-2xl border-2 border-slate-200 bg-gradient-to-br from-white to-slate-50 shadow-md hover:shadow-lg transition-all duration-300 hover:border-sky-300 glow-effect">
                                    @php
                                        $user = Auth::user();
                                        $nameParts = array_filter(explode(' ', $user->name));
                                        $initials = '';
                                        foreach ($nameParts as $part) {
                                            $initials .= strtoupper(mb_substr($part, 0, 1));
                                            if (strlen($initials) === 2) {
                                                break;
                                            }
                                        }
                                    @endphp
                                    <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-sky-400 via-blue-500 to-indigo-500 text-white flex items-center justify-center font-bold shadow-lg shadow-sky-200/50 relative overflow-hidden">
                                        <span class="relative z-10">{{ $initials ?: 'HU' }}</span>
                                        <div class="absolute inset-0 bg-gradient-to-br from-white/20 to-transparent"></div>
                                    </div>
                                    <div class="min-w-0">
                                        <p class="text-sm font-bold text-slate-900 truncate">{{ $user->name }}</p>
                                        <p class="text-xs text-slate-500 truncate">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <main class="flex-1 px-3 sm:px-4 lg:px-8 pb-8 sm:pb-12">
                    <div class="mt-2 sm:mt-4 space-y-6 sm:space-y-8">
                {{ $slot }}
                    </div>
            </main>
            </div>
        </div>

        
    </body>
</html>
