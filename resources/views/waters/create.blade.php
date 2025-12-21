<x-app-layout>
    <x-slot name="header">
        Új vízterület
    </x-slot>

    <form action="{{ route('waters.store') }}" method="POST" enctype="multipart/form-data" class="page-section space-y-6">
        @csrf

        <div class="grid md:grid-cols-2 gap-6">
            <div class="form-field">
                <label for="nev">Név</label>
                <input type="text" name="nev" id="nev" value="{{ old('nev') }}" required>
                <x-input-error :messages="$errors->get('nev')" />
            </div>


            <div class="form-field">
                <label for="helyszin">Helyszín</label>
                <input type="text" name="helyszin" id="helyszin" value="{{ old('helyszin') }}" required>
                <x-input-error :messages="$errors->get('helyszin')" />
            </div>
        </div>


        <div class="grid md:grid-cols-2 gap-6">
            <div class="form-field">

                <label for="tipus">Típus</label>
                <input type="text" name="tipus" id="tipus" value="{{ old('tipus') }}">
            </div>
            <div class="form-field">
                <label for="kep">Kép</label>
                <input type="file" name="kep" id="kep" class="file:mr-4 file:rounded-xl file:border-0 file:bg-sky-50 file:px-4 file:py-2 file:text-sky-700">
                <x-input-error :messages="$errors->get('kep')" />
        </div>

        </div>



        <div class="form-field">
            <label for="leiras">Leírás</label>

            <textarea 
                name="leiras" 
                id="leiras" 
                rows="4" 
                data-max-length="1000"
                placeholder="Részletes leírás a vízterületről (max. 1000 karakter)..."
            >{{ old('leiras') }}</textarea>
         </div>

        <div class="flex flex-col sm:flex-row gap-3">
            <button type="submit" class="primary-button w-full sm:w-auto">Vízterület mentése</button>
            <a href="{{ route('waters.index') }}" class="secondary-button w-full sm:w-auto text-center">Mégse</a>
        </div>
    </form>
    
</x-app-layout>
