<section>
    <header>
        <h2 class="text-xl font-bold text-slate-900 gradient-text">
            Profil információk
        </h2>


        <p class="mt-2 text-sm text-slate-600">
            Frissítsd fiókod profil információit és email címét.
        </p>
    </header>


    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf

    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="form-field">

            <x-input-label for="name" value="Név" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="form-field">

            <x-input-label for="email" value="Email cím" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
             
            <div>
                    <p class="text-sm mt-2 text-slate-700">
                        Az email címed nincs megerősítve.


                        <button form="send-verification" class="underline text-sm text-sky-600 hover:text-sky-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                            Kattints ide az ellenőrző email újraküldéséhez.
                        </button>

                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-emerald-600">
                            Új ellenőrző linket küldtünk az email címedre.
                        </p>

                    @endif
                </div>
            @endif

        </div>

        <div class="form-field">
            <x-input-label for="engedelyszam" value="Horgászengedély száma" />
            <div class="mt-1 block w-full rounded-2xl border-2 border-slate-200 bg-slate-50 px-4 py-3 text-slate-700 cursor-not-allowed">
                {{ $user->engedelyszam ?? 'Nincs megadva' }}
            </div>
            <p class="mt-1 text-xs text-slate-500">
                Ez az információ csak tájékoztató jellegű, nem szerkeszthető.
            </p>
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>Mentés</x-primary-button>


            @if (session('status') === 'profile-updated')

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




