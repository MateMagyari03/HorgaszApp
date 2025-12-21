<?php

namespace App\Http\Controllers;

use App\Models\CatchRecord;
use App\Models\Contest;
use App\Models\Water;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function __invoke()
    {

        
        return $this->index();

    }

    public function index()
    {
        $user = Auth::user();

        $upcomingContests = Contest::orderBy('datum_kezdete')
            ->take(4)
            ->get();


        $recentCatches = CatchRecord::with(['species', 'water'])
            ->where('user_id', $user->id)
            ->latest('datum')
            ->take(8)
            ->get();


        $weeklyTopCatch = CatchRecord::with(['species', 'water', 'user'])
            ->whereBetween('datum', [Carbon::now()->subDays(7), Carbon::now()])
            ->orderByDesc('suly')
            ->first();
            $amIWeeklyTop=$weeklyTopCatch ?->user_id == Auth::user()?->id;

        $biggestCatch = CatchRecord::with(['species', 'water'])
            ->where('user_id', $user->id)
            ->orderByDesc('suly')
            ->first();


        $favoriteWaters = Water::withCount(['catches' => function ($query) use ($user) {
                $query->where('user_id', $user->id);
            }])
            ->orderByDesc('catches_count')
            ->take(3)
            ->get();


        if ($favoriteWaters->isEmpty()) {
            $favoriteWaters = Water::orderBy('nev')->take(3)->get()->map(function ($water) {
                $water->catches_count = 0;
                return $water;
            });
        }




        $stats = [
            'totalCatches' => CatchRecord::where('user_id', $user->id)->count(),
            'yearCatch' => CatchRecord::where('user_id', $user->id)
                ->whereYear('datum', Carbon::now()->year)
                ->count(),
            'biggestCatch' => $biggestCatch?->suly,
            'favoriteWater' => $favoriteWaters->first()?->nev,
        ];


        return view('dashboard', compact(
            'upcomingContests',
            'recentCatches',
            'weeklyTopCatch',
            'favoriteWaters',
            'stats',
            'biggestCatch',
            'amIWeeklyTop'
        ));

        
    }
}





