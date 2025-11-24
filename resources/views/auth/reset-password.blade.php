<x-guest-layout>
    <div class="space-y-6">
        <div>
            <h2 class="text-2xl font-semibold text-slate-900">Új jelszó beállítása</h2>
            <p class="text-sm text-slate-500 mt-1">Add meg az új jelszavadat</p>
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="form-field">
                <label for="email">Email cím</label>

                <input 
                    id="email" 
                    class="px-4 py-3" 
                    type="email" 
                    name="email" 
                    value="{{ old('email', $request->email) }}" 
                    required 
                    autofocus 
                    autocomplete="username"
                    placeholder="pelda@email.com">
                <x-input-error :messages="$errors->get('email')" />

            </div>



            <div class="form-field">
                <label for="password">Új jelszó</label>

                <input 
                    id="password" 
                    class="px-4 py-3" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="new-password"
                    placeholder="••••••••">
                <x-input-error :messages="$errors->get('password')" />

            </div>

            <div class="form-field">
                <label for="password_confirmation">Új jelszó megerősítése</label>

                <input 
                    id="password_confirmation" 
                    class="px-4 py-3" 
                    type="password" 
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password"
                    placeholder="••••••••">
                <x-input-error :messages="$errors->get('password_confirmation')" />
            </div>



            <div class="pt-2">
                <button type="submit" class="primary-button w-full justify-center">
                   
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                    Jelszó visszaállítása
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