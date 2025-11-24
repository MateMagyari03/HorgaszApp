<x-guest-layout>
    <div class="space-y-6">
        <div>
            <h2 class="text-2xl font-semibold text-slate-900">Bejelentkezés</h2>
            <p class="text-sm text-slate-500 mt-1">Add meg az adataidat a folytatáshoz</p>
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
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

            <div class="form-field">
                <label for="password">Jelszó</label>

                <input 
                    id="password" 
                    class="px-4 py-3" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="current-password"
                    placeholder="••••••••">

                <x-input-error :messages="$errors->get('password')" />
            </div>

            <div class="flex items-center justify-between">

                <label for="remember_me" class="inline-flex items-center cursor-pointer">
                    <input 
                        id="remember_me" 
                        type="checkbox" 
                        class="rounded border-slate-300 text-sky-600 shadow-sm focus:ring-sky-500 w-4 h-4" 
                        name="remember">
                    <span class="ml-2 text-sm text-slate-600">Emlékezz rám</span>

                </label>

                @if (Route::has('password.request'))
                    <a 
                        class="text-sm text-sky-600 hover:text-sky-700 font-medium" 
                        href="{{ route('password.request') }}">
                        Elfelejtett jelszó?
                    </a>
                    

                @endif
            </div>

            <div class="pt-2">
                <button type="submit" class="primary-button w-full justify-center">
                    Bejelentkezés
                </button>

            </div>
        </form>

        <div class="pt-4 border-t border-slate-200">
            <p class="text-sm text-center text-slate-600">
                Még nincs fiókod?
                <a href="{{ route('register') }}" class="font-semibold text-sky-600 hover:text-sky-700">
                    Regisztrálj most
                </a>

            </p>

        </div>
    </div>
</x-guest-layout>