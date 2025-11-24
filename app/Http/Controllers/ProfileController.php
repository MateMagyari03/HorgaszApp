<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\CatchRecord;
use App\Models\Water;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        $user = $request->user();
        
        $totalCatches = CatchRecord::where('user_id', $user->id)->count();
        $totalWeight = CatchRecord::where('user_id', $user->id)->sum('suly') ?? 0;
        
        $favoriteWaterData = CatchRecord::where('user_id', $user->id)
            ->select('water_id', DB::raw('COUNT(*) as catches_count'))
            ->groupBy('water_id')
            ->orderByDesc('catches_count')
            ->first();
        
        $favoriteWater = null;
        if ($favoriteWaterData && $favoriteWaterData->water_id) {
            $favoriteWater = Water::find($favoriteWaterData->water_id);
        }
        
        return view('profile.edit', [
            'user' => $user,
            'totalCatches' => $totalCatches,
            'totalWeight' => $totalWeight,
            'favoriteWater' => $favoriteWater,
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());


        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();


        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [

            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return Redirect::to('/');
    }
}