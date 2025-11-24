<x-app-layout>
    <x-slot name="header">
        Új fogás felvétele
    </x-slot>

    <form action="{{ route('catch-records.store') }}" method="POST" enctype="multipart/form-data" class="page-section space-y-6">
        @csrf


        <div class="grid md:grid-cols-2 gap-6">
            <div class="form-field">
                <label for="species_id">Halfaj</label>

                <select name="species_id" id="species_id" required>
                    <option value="">Válassz halfajt</option>

                    @foreach($species as $s)
                        <option value="{{ $s->id }}" {{ old('species_id') == $s->id ? 'selected' : '' }}>
                            {{ $s->nev }}
                        </option>
                    @endforeach


                </select>
                <x-input-error :messages="$errors->get('species_id')" />
            </div>

            <div class="form-field">
                <label for="water_id">Vízterület</label>
                <select name="water_id" id="water_id" required>
                    <option value="">Válassz vízterületet</option>

                    @foreach($waters as $w)
                        <option value="{{ $w->id }}" {{ old('water_id') == $w->id ? 'selected' : '' }}>
                            {{ $w->nev }}
                        </option>
                    @endforeach


                </select>
                <x-input-error :messages="$errors->get('water_id')" />
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-6">

            <div class="form-field">
                <label for="datum">Dátum</label>
                <input type="date" name="datum" id="datum" value="{{ old('datum', date('Y-m-d')) }}" required>
                <x-input-error :messages="$errors->get('datum')" />
            </div>

            <div class="form-field">

                <label for="suly">Súly (kg)</label>
                <input type="number" step="0.01" name="suly" id="suly" value="{{ old('suly') }}" min="0" placeholder="0.00">
                <x-input-error :messages="$errors->get('suly')" />
            </div>

            <div class="form-field">

                <label for="hossz">Hossz (cm)</label>
                <input type="number" name="hossz" id="hossz" value="{{ old('hossz') }}" min="0" placeholder="0">
                <x-input-error :messages="$errors->get('hossz')" />
            </div>
        </div>

        <div class="form-field">

            <label for="foto">Kép</label>
            <input type="file" name="foto" id="foto" accept="image/*" class="file:mr-4 file:rounded-xl file:border-0 file:bg-sky-50 file:px-4 file:py-2 file:text-sky-700">
            <x-input-error :messages="$errors->get('foto')" />
        </div>

        <div class="form-field">

            <label for="megjegyzes">Megjegyzés</label>
            <textarea 
                name="megjegyzes" 
                id="megjegyzes" 
                rows="4" 
                data-max-length="500"
                placeholder="Opcionális megjegyzés a fogásról (max. 500 karakter)..."
            >{{ old('megjegyzes') }}</textarea>



            <x-input-error :messages="$errors->get('megjegyzes')" />
        </div>

        <div class="flex gap-3">
            <button type="submit" class="primary-button">Fogás mentése</button>
            <a href="{{ route('catch-records.index') }}" class="secondary-button">Mégse</a>
        </div>
    </form>


    
</x-app-layout>




