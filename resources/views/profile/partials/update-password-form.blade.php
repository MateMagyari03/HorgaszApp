<section>
    <header>
        <h2 class="text-xl font-bold text-slate-900 gradient-text">
            Jelszó módosítása
        </h2>


        <p class="mt-2 text-sm text-slate-600">
            Biztosítsd, hogy fiókod hosszú, véletlenszerű jelszót használ a biztonság érdekében.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')



        <div class="form-field">
            <x-input-label for="update_password_current_password" value="Jelenlegi jelszó" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>


        <div class="form-field">
            <x-input-label for="update_password_password" value="Új jelszó" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="form-field">
            <x-input-label for="update_password_password_confirmation" value="Új jelszó megerősítése" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>Mentés</x-primary-button>

            @if (session('status') === 'password-updated')

                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-emerald-600 font-medium"
                >Mentve!</p>
            @endif
        </div>
    </form>


    
</section>
