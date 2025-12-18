<?php

namespace App\Http\Controllers;

use App\Models\Water;
use Illuminate\Http\Request;

class WaterController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('q');

        $waters = Water::when($search, function ($query, $search) {
                $query->where('nev', 'like', "%{$search}%")
                    ->orWhere('helyszin', 'like', "%{$search}%");
            })
            ->orderBy('nev')
            ->get();

        return view('waters.index', [
            'waters' => $waters,
            'search' => $search,
        ]);
    }

    public function show(Water $water)
    {
        $water->loadCount('catches');
        return view('waters.show', compact('water'));
    }

    public function create()
    {
        abort_unless(auth()->user()->isAdmin(), 403);
        
        return view('waters.create');
    }

    public function store(Request $request)
    {
        abort_unless(auth()->user()->isAdmin(), 403);
        
        $request->validate([
            'nev' => 'required|string|max:255',
            'helyszin' => 'required|string|max:255',
            'tipus' => 'nullable|string|max:100',
            'leiras' => 'nullable|string',
            'kep' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $path = null;
        if ($request->hasFile('kep')) {
            $path = $request->file('kep')->store('waters', 'public');
        }

        Water::create([
            'nev' => $request->nev,
            'helyszin' => $request->helyszin,
            'tipus' => $request->tipus,
            'leiras' => $request->leiras,
            'kep' => 'storage/'.$path,
        ]);

        return redirect()->route('waters.index')->with('success', 'Vízterület sikeresen hozzáadva!');
    }

    public function edit(Water $water)
    {
        abort_unless(auth()->user()->isAdmin(), 403);
        
        return view('waters.edit', compact('water'));
    }

    public function update(Request $request, Water $water)
    {
        abort_unless(auth()->user()->isAdmin(), 403);


        
        $request->validate([
            'nev' => 'required|string|max:255',
            'helyszin' => 'required|string|max:255',
            'tipus' => 'nullable|string|max:100',
            'leiras' => 'nullable|string',
            'kep' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);



        $data = $request->only('nev', 'helyszin', 'tipus', 'leiras');

        if ($request->hasFile('kep')) {
            $data['kep'] = $request->file('kep')->store('waters', 'public');
        }

        $water->update($data);

        return redirect()->route('waters.index')->with('success', 'Vízterület frissítve!');
    }


    public function destroy(Water $water)
    
    {
        abort_unless(auth()->user()->isAdmin(), 403);
        
        $water->delete();

        return redirect()->route('waters.index')->with('success', 'Vízterület törölve!');
    }
}
