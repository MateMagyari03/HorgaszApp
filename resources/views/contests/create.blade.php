<x-app-layout>
    <x-slot name="header">
        Új verseny létrehozása
    </x-slot>

    <form action="{{ route('contests.store') }}" method="POST" class="page-section space-y-6">
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

                <label for="datum_kezdete">Kezdés dátuma</label>
                <input type="date" name="datum_kezdete" id="datum_kezdete" value="{{ old('datum_kezdete') }}" required>
                <x-input-error :messages="$errors->get('datum_kezdete')" />
            </div>
            <div class="form-field">

                <label for="datum_vege">Vége dátuma</label>
                <input type="date" name="datum_vege" id="datum_vege" value="{{ old('datum_vege') }}" required>
                <x-input-error :messages="$errors->get('datum_vege')" />
            </div>

        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div class="form-field">
                <label for="dij">Nevezési díj (Ft)</label>
                <input type="number" name="dij" id="dij" value="{{ old('dij') }}" min="0" placeholder="Opcionális">
                <x-input-error :messages="$errors->get('dij')" />
            </div>

            <div class="form-field">
                <label for="max_letszam">Maximális létszám</label>
                <input type="number" name="max_letszam" id="max_letszam" value="{{ old('max_letszam') }}" min="1" placeholder="Opcionális">
                <x-input-error :messages="$errors->get('max_letszam')" />
            </div>
        </div>

        <div class="form-field">

            <label for="leiras">Leírás</label>
            <textarea 
                name="leiras" 
                id="leiras" 
                rows="4" 
                data-max-length="1000"
                placeholder="Részletes leírás a versenyről (max. 1000 karakter)..."
            >{{ old('leiras') }}</textarea>
            <x-input-error :messages="$errors->get('leiras')" />
        </div>

        <div class="flex gap-3">
            <button type="submit" class="primary-button">Verseny létrehozása</button>
            <a href="{{ route('contests.index') }}" class="secondary-button">Mégse</a>
        </div>
    </form>



</x-app-layout>


