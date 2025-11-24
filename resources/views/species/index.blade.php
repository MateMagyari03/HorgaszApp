<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Halfajok</h1>

    <a href="{{ route('species.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Új halfaj</a>

    <table class="mt-4 w-full border">
        <tr class="bg-gray-100">
            <th class="p-2 border">Név</th>
            <th class="p-2 border">Leírás</th>
            <th class="p-2 border">Műveletek</th>
        </tr>
        @foreach ($species as $item)
        <tr>
            <td class="p-2 border">{{ $item->nev }}</td>
            <td class="p-2 border">{{ $item->leiras }}</td>
            <td class="p-2 border">
                <a href="{{ route('species.edit', $item) }}" class="text-yellow-600">Szerkesztés</a>
                <form action="{{ route('species.destroy', $item) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 ml-2">Törlés</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</x-app-layout>
