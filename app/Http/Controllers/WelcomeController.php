<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatchRecord;
use App\Models\Contest;
use App\Models\Ban;
use Carbon\Carbon;

class WelcomeController extends Controller
{
     public function welcome(Request $request) {
        $weeklyTopCatch = CatchRecord::with(['species', 'water', 'user'])
            ->whereBetween('datum', [Carbon::now()->subDays(7), Carbon::now()])
            ->orderByDesc('suly')
            ->first();

        $upcomingContest = Contest::where('datum_kezdete', '>=', Carbon::now()->toDateString())
            ->orderBy('datum_kezdete', 'asc')
            ->first();

        $now = Carbon::now()->toDateString();
        
        $activeBan = Ban::with('species')
            ->where('kezdete', '<=', $now)
            ->where('vege', '>=', $now)
            ->orderBy('kezdete', 'asc')
            ->first();
        
        if (!$activeBan) {
            $activeBan = Ban::with('species')
                ->where('kezdete', '>=', $now)
                ->orderBy('kezdete', 'asc')
                ->first();
        }

        return view('welcome', compact('weeklyTopCatch', 'upcomingContest', 'activeBan'));
     }
     
}
