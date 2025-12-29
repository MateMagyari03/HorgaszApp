<?php

namespace App\Http\Controllers;

use App\Models\CatchRecord;
use App\Models\Species;
use App\Models\Water;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\StreamedResponse;


class CatchRecordController extends Controller
{
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $users = User::withCount('catches')
                ->has('catches')
                ->get();

            return view('catch_records.index', compact('users'));
        }



        $records = CatchRecord::with(['species', 'water'])
            ->where('user_id', Auth::id())
            ->orderBy('datum', 'desc')
            ->get();
        return view('catch_records.index', compact('records'));
    }
    public function exportCsv(): StreamedResponse
    {
        abort_unless(Auth::user()->isAdmin(), 403, 'Nincs jogosultságod a CSV letöltéséhez.');

        $filename = 'fogasok_' . now()->format('Y-m-d_H-i') . '.csv';

        return response()->streamDownload(function () {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, [
                'Felhasználó',
                'Halfaj',
                'Víz',
                'Dátum',
                'Súly (kg)',
                'Hossz (cm)',
                'Megjegyzés',
            ], ';');

            $records = CatchRecord::with(['user', 'species', 'water'])->get();

            foreach ($records as $record) {
                fputcsv($handle, [
                    $record->user->name ?? '',
                    $record->species->nev ?? '',
                    $record->water->nev ?? '',
                    $record->datum,
                    $record->suly,
                    $record->hossz,
                    $record->megjegyzes,
                ], ';');
            }

            fclose($handle);

        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }

    public function userCatches($userId)
    {
        abort_unless(Auth::user()->isAdmin(), 403);

        $selectedUser = User::findOrFail($userId);
        $userCatches = CatchRecord::with(['species', 'water'])
            ->where('user_id', $userId)
            ->orderBy('datum', 'desc')
            ->get();
        return view('catch_records.index', compact('userCatches', 'selectedUser'));
    }



    public function create()
    {

        $species = Species::all();
        $waters = Water::all();

        return view('catch_records.create', compact('species', 'waters'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
            'species_id' => 'required|exists:species,id',
            'water_id' => 'required|exists:waters,id',
            'datum' => 'required|date',
            'suly' => 'nullable|numeric',
            'hossz' => 'nullable|numeric',
            'foto' => 'nullable|image',
            'megjegyzes' => 'nullable|string'
        ]);

        
        $path = null;
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('fogasok', 'public');
        }

        CatchRecord::create([
            'user_id' => Auth::id(),
            'species_id' => $request->species_id,
            'water_id' => $request->water_id,
            'datum' => $request->datum,
            'suly' => $request->suly,
            'hossz' => $request->hossz,
            'foto' => 'storage/'.$path,
            'megjegyzes' => $request->megjegyzes,
        ]);


        return redirect()->route('catch-records.index')->with('success', 'Fogás hozzáadva!');
    }


    public function update(Request $request, CatchRecord $catchRecord)
    {
        $this->authorize('update', $catchRecord);


        $request->validate([
            'species_id' => 'required|exists:species,id',
            'water_id' => 'required|exists:waters,id',
            'datum' => 'required|date',
            'suly' => 'nullable|numeric',
            'hossz' => 'nullable|numeric',
            'foto' => 'nullable|image',
            'megjegyzes' => 'nullable|string'
        ]);


        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('fogasok', 'public');
            $catchRecord->foto = $path;
        }

        $catchRecord->update($request->except('foto'));
        return redirect()->route('catch-records.index')->with('success', 'Fogás frissítve!');
    }

    public function destroy(CatchRecord $catchRecord)
    {
        $this->authorize('delete', $catchRecord);

        $catchRecord->delete();

        return redirect()->route('catch-records.index')->with('success', 'Fogás törölve!');
    }

}