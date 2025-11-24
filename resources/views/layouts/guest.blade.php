<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">



        <title>{{ config('app.name', 'HorgászApp') }} - Horgászok közösségi platformja</title>

        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}?v=2">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="min-h-screen bg-gradient-to-br from-sky-50 via-white to-indigo-50 text-slate-900 antialiased">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">

            <div class="w-96 h-96 bg-sky-200/30 blur-3xl rounded-full absolute -top-20 -left-10"></div>
            <div class="w-[32rem] h-[32rem] bg-indigo-200/30 blur-[150px] rounded-full absolute bottom-0 right-0"></div>
        </div>

        <div class="relative z-10 min-h-screen flex flex-col items-center justify-center px-4 py-12">
            <div class="w-full max-w-md">

                <div class="mb-8 text-center">
                    <a href="/" class="inline-flex items-center gap-3">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-sky-400 to-indigo-500 flex items-center justify-center text-white text-2xl font-bold">
                            🎣
                        </div>
                        <div class="text-left">

                            <p class="text-2xl font-semibold text-slate-900">HorgászApp</p>
                            <p class="text-sm text-slate-500">Horgászok közösségi platformja</p>
                        </div>

                    </a>
                </div>

                <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-white p-8">
                    {{ $slot }}
                </div>


                <div class="mt-6 text-center">
                    <a href="/" class="text-sm text-slate-600 hover:text-slate-900 font-medium">
                        ← Vissza a főoldalra
                    </a>


                </div>
            </div>
        </div>


    </body>



</html>