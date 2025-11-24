<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Contest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::with('contest')
            ->where('user_id', Auth::id())
            ->get();

        return view('registrations.index', compact('registrations'));
    }

    public function create()
    {
        return redirect()->route('registrations.index');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
            'contest_id' => 'required|exists:contests,id',
            'megjegyzes' => 'nullable|string'
        ]);

        Registration::create([
            'user_id' => Auth::id(),
            'contest_id' => $request->contest_id,
            'megjegyzes' => $request->megjegyzes
        ]);

        return redirect()->route('registrations.index')->with('success', 'Sikeresen nevezett!');
    }

    public function quickRegister(Contest $contest)
    {
        if (!$contest->canRegister()) {

            return back()->with('error', 'Ez a verseny már nem fogad jelentkezéseket!');
        }

        $existingRegistration = Registration::where('contest_id', $contest->id)
            ->where('user_id', Auth::id())
            ->exists();

        if ($existingRegistration) {

            return back()->with('error', 'Már nevezett erre a versenyre!');
        }

        $current = Registration::where('contest_id', $contest->id)->count();

        if ($contest->max_letszam && $current >= $contest->max_letszam) {
            
            return back()->with('error', 'Már betelt a verseny!');
        }

        \DB::transaction(function () use ($contest) {
            Registration::create([
                'user_id' => Auth::id(),
                'contest_id' => $contest->id
            ]);
        });

        return back()->with('success', 'Nevezés sikeres!');
    }

    public function destroy(Registration $registration)
    {
        if ($registration->user_id !== Auth::id()) {
            abort(403); 
        }

        $registration->delete();

        return back()->with('success', 'Nevezés törölve.');
    }
}
