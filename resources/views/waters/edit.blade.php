<x-app-layout>
    <x-slot name="header">
        {{ $water->nev }} szerkesztése
    </x-slot>


    <form action="{{ route('waters.update', $water) }}" method="POST" enctype="multipart/form-data" class="page-section space-y-6">
      
    @csrf
        @method('PUT')

        <div class="grid md:grid-cols-2 gap-6">
            <div class="form-field">
                <label for="nev">Név</label>
                <input type="text" name="nev" id="nev" value="{{ old('nev', $water->nev) }}" required>
                <x-input-error :messages="$errors->get('nev')" />
            </div>

            <div class="form-field">
                <label for="helyszin">Helyszín</label>
                <input type="text" name="helyszin" id="helyszin" value="{{ old('helyszin', $water->helyszin) }}" required>
                <x-input-error :messages="$errors->get('helyszin')" />
            </div>
        </div>


        <div class="grid md:grid-cols-2 gap-6">
            <div class="form-field">
                <label for="tipus">Típus</label>
                <input type="text" name="tipus" id="tipus" value="{{ old('tipus', $water->tipus) }}">
            </div>

            <div class="form-field">
                <label for="kep">Új kép feltöltése</label>
                <input type="file" name="kep" id="kep" class="file:mr-4 file:rounded-xl file:border-0 file:bg-sky-50 file:px-4 file:py-2 file:text-sky-700">
                <x-input-error :messages="$errors->get('kep')" />
            </div>
        </div>


        @if ($water->kep)
            <div class="rounded-2xl border border-slate-200 overflow-hidden">
                <img src="{{ asset('storage/' . $water->kep) }}" alt="{{ $water->nev }}" class="w-full h-64 object-cover">
            </div>
        @endif

        <div class="form-field">
            <label for="leiras">Leírás</label>

            <textarea 
                name="leiras" 
                id="leiras" 
                rows="4" 
                data-max-length="1000"
                placeholder="Részletes leírás a vízterületről (max. 1000 karakter)..."
            >{{ old('leiras', $water->leiras) }}</textarea>

        </div>

        <div class="flex gap-3">

            <button type="submit" class="primary-button">Változtatások mentése</button>
            <a href="{{ route('waters.index') }}" class="secondary-button">Mégse</a>
        </div>
    </form>


    
</x-app-layout>
