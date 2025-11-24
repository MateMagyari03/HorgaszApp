<section class="space-y-6">
    <header>
        <h2 class="text-xl font-bold text-slate-900">
            Fiók törlése
        </h2>


        <p class="mt-2 text-sm text-slate-600">
            Ha törlöd a fiókodat, az összes adatod és erőforrásod véglegesen törlődik. A fiók törlése előtt töltsd le azokat az adatokat vagy információkat, amelyeket meg szeretnél tartani.
        </p>

    </header>

    <x-danger-button

        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >Fiók törlése</x-danger-button>


    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')


            <h2 class="text-lg font-bold text-slate-900">
                Biztosan törölni szeretnéd a fiókodat?
            </h2>


            <p class="mt-2 text-sm text-slate-600">
                A fiók törlése után az összes adatod és erőforrásod véglegesen törlődik. Add meg a jelszavad a fiók végleges törlésének megerősítéséhez.
            </p>

            <div class="mt-6">

                <x-input-label for="password" value="Jelszó" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="Jelszó"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end gap-3">

                <x-secondary-button x-on:click="$dispatch('close')">
                    Mégse
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    Fiók törlése
                </x-danger-button>

            </div>
        </form>
    </x-modal>



</section>




