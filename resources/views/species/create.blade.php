<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Új halfaj felvétele</h1>

    <form action="{{ route('species.store') }}" method="POST">
        @csrf

        <label>Név</label>
        <input type="text" name="nev" class="border p-2 w-full mb-2">

        <label>Leírás</label>
        <textarea name="leiras" class="border p-2 w-full mb-2"></textarea>

        <button class="bg-green-600 text-white px-4 py-2 rounded">Mentés</button>
    </form>
</x-app-layout>
