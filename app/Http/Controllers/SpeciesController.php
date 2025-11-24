<?php

namespace App\Http\Controllers;

use App\Models\Species;
use Illuminate\Http\Request;

class SpeciesController extends Controller
{
    public function index()
    {
        $species = Species::all();
        return view('species.index', compact('species'));
    }

    public function create()
    {
        return view('species.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nev' => 'required|string|max:255',
            'leiras' => 'nullable|string'
        ]);

        Species::create($request->only('nev', 'leiras'));

        return redirect()->route('species.index')->with('success', 'Halfaj sikeresen hozzáadva!');
    }

    public function edit(Species $species)
    {
        return view('species.edit', compact('species'));
    }

    public function update(Request $request, Species $species)
    {
        $request->validate([
            'nev' => 'required|string|max:255',
            'leiras' => 'nullable|string'
        ]);

        $species->update($request->only('nev', 'leiras'));

        return redirect()->route('species.index')->with('success', 'Halfaj módosítva!');
    }

    public function destroy(Species $species)
    {
        $species->delete();

        return redirect()->route('species.index')->with('success', 'Halfaj törölve!');
    }
}
