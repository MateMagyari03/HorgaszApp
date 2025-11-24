<x-guest-layout>
    <div class="space-y-6">
        <div>
            <h2 class="text-2xl font-semibold text-slate-900">Jelszó visszaállítása</h2>
            <p class="text-sm text-slate-500 mt-1">Add meg az email címed, és küldünk egy linket a jelszó visszaállításához</p>
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf

            <div class="form-field">

                <label for="email">Email cím</label>
                <input 
                    id="email" 
                    class="px-4 py-3" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autofocus 
                    autocomplete="username"
                    placeholder="pelda@email.com">
                <x-input-error :messages="$errors->get('email')" />

            </div>

            <div class="pt-2">

                <button type="submit" class="primary-button w-full justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>

                    Jelszó-visszaállító link küldése
                </button>
            </div>
        </form>

        <div class="pt-4 border-t border-slate-200">

            <p class="text-sm text-center text-slate-600">
                Emlékszel a jelszavadra?
                <a href="{{ route('login') }}" class="font-semibold text-sky-600 hover:text-sky-700">
                    Vissza a bejelentkezéshez
                </a>

            </p>
        </div>
    </div>


</x-guest-layout>


