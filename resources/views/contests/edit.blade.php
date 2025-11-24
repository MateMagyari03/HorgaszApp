<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Verseny módosítása</h1>

    <form action="{{ route('contests.update', $contest) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Név</label>
        <input type="text" name="nev" value="{{ $contest->nev }}" class="border p-2 w-full mb-2">

        <label>Helyszín</label>
        <input type="text" name="helyszin" value="{{ $contest->helyszin }}" class="border p-2 w-full mb-2">

        <label>Kezdés dátuma</label>
        <input type="date" name="datum_kezdete" value="{{ $contest->datum_kezdete }}" class="border p-2 w-full mb-2">

        <label>Vége</label>
        <input type="date" name="datum_vege" value="{{ $contest->datum_vege }}" class="border p-2 w-full mb-2">

        <label>Díj (Ft)</label>
        <input type="number" name="dij" value="{{ $contest->dij }}" class="border p-2 w-full mb-2">

        <label>Maximális létszám</label>
        <input type="number" name="max_letszam" value="{{ $contest->max_letszam }}" class="border p-2 w-full mb-2">

        <label>Leírás</label>
        <textarea name="leiras" class="border p-2 w-full mb-2">{{ $contest->leiras }}</textarea>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Mentés</button>
    </form>
</x-app-layout>
