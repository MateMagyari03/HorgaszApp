<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatchRecord;
use Carbon\Carbon;

class WelcomeController extends Controller
{
     public function welcome(Request $request) {
        $weeklyTopCatch = CatchRecord::with(['species', 'water', 'user'])
            ->whereBetween('datum', [Carbon::now()->subDays(7), Carbon::now()])
            ->orderByDesc('suly')
            ->first();
        return view('welcome',compact ('weeklyTopCatch'));

     }
     
}
