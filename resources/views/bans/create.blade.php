<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Új tilalmi idő felvétele</h1>

    <form action="{{ route('bans.store') }}" method="POST">
        @csrf

        <label>Halfaj</label>
        <select name="species_id" class="border p-2 w-full mb-2">
            @foreach($species as $s)
                <option value="{{ $s->id }}">{{ $s->nev }}</option>
            @endforeach
        </select>

        <label>Kezdete</label>
        <input type="date" name="kezdete" class="border p-2 w-full mb-2">

        <label>Vége</label>
        <input type="date" name="vege" class="border p-2 w-full mb-2">

        <label>Megjegyzés</label>
        <textarea name="megjegyzes" class="border p-2 w-full mb-2"></textarea>

        <button class="bg-green-600 text-white px-4 py-2 rounded">Mentés</button>
    </form>
</x-app-layout>
