<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Tilalmi idő módosítása</h1>

    <form action="{{ route('bans.update', $ban) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Halfaj</label>
        <select name="species_id" class="border p-2 w-full mb-2">
            @foreach($species as $s)
                <option value="{{ $s->id }}" @selected($s->id == $ban->species_id)>{{ $s->nev }}</option>
            @endforeach
        </select>

        <label>Kezdete</label>
        <input type="date" value="{{ $ban->kezdete }}" name="kezdete" class="border p-2 w-full mb-2">

        <label>Vége</label>
        <input type="date" value="{{ $ban->vege }}" name="vege" class="border p-2 w-full mb-2">

        <label>Megjegyzés</label>
        <textarea name="megjegyzes" class="border p-2 w-full mb-2">{{ $ban->megjegyzes }}</textarea>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Mentés</button>
    </form>
</x-app-layout>
