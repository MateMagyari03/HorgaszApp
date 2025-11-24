<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use Illuminate\Http\Request;

class ContestController extends Controller
{

    public function index()
    {
        $contests = Contest::orderBy('datum_kezdete', 'desc')->get();
        return view('contests.index', compact('contests'));
    }


    public function show(Contest $contest)
    {

        $isRegistered = auth()->check() && \App\Models\Registration::where('contest_id', $contest->id)
            ->where('user_id', auth()->id())
            ->exists();
            

        return view('contests.show', compact('contest', 'isRegistered'));
    }

    public function create()
    {

    
     abort_unless(auth()->user()->isAdmin(), 403);
        
        return view('contests.create');
    }

    public function store(Request $request)
    {

    abort_unless(auth()->user()->isAdmin(), 403);
        
        $request->validate(
            [
            'nev' => 'required|string|max:255',
            'helyszin' => 'required|string|max:255',
            'datum_kezdete' => 'required|date',
            'datum_vege' => 'required|date|after_or_equal:datum_kezdete',
            'leiras' => 'nullable|string',
            'dij' => 'nullable|numeric',
            'max_letszam' => 'nullable|integer'
        ]);

        Contest::create($request->only(
            [
            'nev',
            'helyszin',
            'datum_kezdete',
            'datum_vege',
            'leiras',
            'dij',
            'max_letszam'
        ]));

        return redirect()->route('contests.index')->with('success', 'Verseny létrehozva!');
    }


    public function edit(Contest $contest)
    {
        abort_unless(auth()->user()->isAdmin(), 403);
        
        return view('contests.edit', compact('contest'));
    }

    public function update(Request $request, Contest $contest)
    {
        abort_unless(auth()->user()->isAdmin(), 403);
        
        $request->validate(
            [
            'nev' => 'required|string|max:255',
            'helyszin' => 'required|string|max:255',
            'datum_kezdete' => 'required|date',
            'datum_vege' => 'required|date|after_or_equal:datum_kezdete',
            'leiras' => 'nullable|string',
            'dij' => 'nullable|numeric',
            'max_letszam' => 'nullable|integer'
        ]);

        $contest->update($request->only(
            [
            'nev',
            'helyszin',
            'datum_kezdete',
            'datum_vege',
            'leiras',
            'dij',
            'max_letszam'
        ]));

        return redirect()->route('contests.index')->with('success', 'Verseny frissítve!');
    }


    public function destroy(Contest $contest)
    {
        abort_unless(auth()->user()->isAdmin(), 403);
        $contest->delete();

        return redirect()->route('contests.index')->with('success', 'Verseny törölve!');
    }
}


