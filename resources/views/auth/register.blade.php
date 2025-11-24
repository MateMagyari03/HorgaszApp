<x-guest-layout>
    <div class="space-y-6">
        <div>
            <h2 class="text-2xl font-semibold text-slate-900">Regisztráció</h2>
            <p class="text-sm text-slate-500 mt-1">Hozd létre az új fiókodat</p>
        </div>


        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div class="form-field">
                <label for="name">Név</label>

                <input 
                    id="name" 
                    class="px-4 py-3" 
                    type="text" 
                    name="name" 
                    value="{{ old('name') }}" 
                    required 
                    autofocus 
                    autocomplete="name"
                    placeholder="Teljes neved">
                <x-input-error :messages="$errors->get('name')" />
            </div>


            <div class="form-field">

                <label for="email">Email cím</label>
                <input 
                    id="email" 
                    class="px-4 py-3" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autocomplete="username"
                    placeholder="pelda@email.com">
                <x-input-error :messages="$errors->get('email')" />

            </div>

            <div class="form-field">
                <label for="engedelyszam">

                    Engedélyszám <span class="text-red-500">*</span>
                </label>
                <input 
                    id="engedelyszam" 
                    class="px-4 py-3" 
                    type="text" 
                    name="engedelyszam" 
                    value="{{ old('engedelyszam') }}" 
                    required 
                    placeholder="Horgász engedély száma (pl. HU-2024-12345)">
                <p class="text-xs text-slate-500">A horgászengedély száma kötelező a regisztrációhoz</p>
                <x-input-error :messages="$errors->get('engedelyszam')" />
            </div>

            <div class="form-field">
                <label for="password">Jelszó</label>
                <input 
                    id="password" 
                    class="px-4 py-3" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="new-password"
                    placeholder="Minimum 8 karakter">
                <x-input-error :messages="$errors->get('password')" />

            </div>

            <div class="form-field">
                <label for="password_confirmation">Jelszó megerősítése</label>
                <input 
                    id="password_confirmation" 
                    class="px-4 py-3" 
                    type="password" 
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password"
                    placeholder="Add meg újra a jelszót">
                <x-input-error :messages="$errors->get('password_confirmation')" />
            </div>


            <div class="pt-2">
                <button type="submit" class="primary-button w-full justify-center">
                    Regisztráció
                </button>
            </div>

        </form>

        <div class="pt-4 border-t border-slate-200">
            <p class="text-sm text-center text-slate-600">
                Már van fiókod?
                <a href="{{ route('login') }}" class="font-semibold text-sky-600 hover:text-sky-700">
                    Bejelentkezés
                </a>

            </p>
        </div>
    </div>



    
</x-guest-layout>
