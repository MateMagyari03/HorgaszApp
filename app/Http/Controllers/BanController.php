<?php

namespace App\Http\Controllers;

use App\Models\Ban;
use App\Models\Species;
use Illuminate\Http\Request;

class BanController extends Controller
{
    public function index()
    {
        $bans = Ban::with('species')->orderBy('kezdete')->get();
        return view('bans.index', compact('bans'));
    }


    public function show(Ban $ban)
    {

        $ban->load('species');
        return view('bans.show', compact('ban'));
    }

    public function create()
    {

        abort_unless(auth()->user()->isAdmin(), 403);
        $species = Species::all();

        return view('bans.create', compact('species'));
    }

    public function store(Request $request)
    {
        abort_unless(auth()->user()->isAdmin(), 403);
        
        $request->validate(
            [
            'species_id' => 'required|exists:species,id',
            'kezdete' => 'required|date',
            'vege' => 'required|date|after_or_equal:kezdete',
            'megjegyzes' => 'nullable|string'
        ]);

        Ban::create($request->all());

        return redirect()->route('bans.index')->with('success', 'Tilalmi idő hozzáadva!');
    }




    public function edit(Ban $ban)
    {
        abort_unless(auth()->user()->isAdmin(), 403);
        
        $species = Species::all();
        return view('bans.edit', compact('ban', 'species'));
    }

    public function update(Request $request, Ban $ban)
    {
        abort_unless(auth()->user()->isAdmin(), 403);
        

        $request->validate([

            'species_id' => 'required|exists:species,id',
            'kezdete' => 'required|date',
            'vege' => 'required|date|after_or_equal:kezdete',
            'megjegyzes' => 'nullable|string'
        ]);

        $ban->update([
        'species_id' => $request->species_id,
        'kezdete' => $request->kezdete,
        'vege' => $request->vege,
        'megjegyzes' => $request->megjegyzes,
        ]);



        return redirect()->route('bans.index')->with('success', 'Tilalmi idő módosítva!');
    }


    

    public function destroy(Ban $ban)
    {
        
        abort_unless(auth()->user()->isAdmin(), 403);
        
        $ban->delete();
        return redirect()->route('bans.index')->with('success', 'Tilalmi idő törölve!');
    }
}


