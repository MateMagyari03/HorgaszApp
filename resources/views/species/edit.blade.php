<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Halfaj módosítása</h1>

    <form action="{{ route('species.update', $species) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Név</label>
        <input type="text" name="nev" value="{{ $species->nev }}" class="border p-2 w-full mb-2">

        <label>Leírás</label>
        <textarea name="leiras" class="border p-2 w-full mb-2">{{ $species->leiras }}</textarea>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Mentés</button>
    </form>
</x-app-layout>
