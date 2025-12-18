<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpeciesController;
use App\Http\Controllers\WaterController;
use App\Http\Controllers\BanController;
use App\Http\Controllers\CatchRecordController;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\WelcomeController;



Route::get('/', [WelcomeController::class, 'welcome'])
    ->name('welcome');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])

    ->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
   
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('species', SpeciesController::class)->middleware('auth');
Route::resource('waters', WaterController::class)->middleware('auth');
Route::resource('bans', BanController::class)->middleware('auth');
Route::middleware('auth')->group(function () {
   
    Route::get('/catch-records/user/{userId}', [CatchRecordController::class, 'userCatches'])->name('catch-records.user');
});

Route::resource('contests', ContestController::class)->middleware('auth');
Route::middleware('auth')->group(function () {
    
    Route::get('/versenyeim', [RegistrationController::class, 'index'])->name('registrations.index');
    
    Route::delete('/versenyeim/{registration}', [RegistrationController::class, 'destroy'])->name('registrations.destroy');
});

Route::middleware('auth')->resource('catch-records', CatchRecordController::class)
    ->parameters([
        'catch-records' => 'catchRecord'
]);


Route::post('/contest/{contest}/register', [RegistrationController::class, 'quickRegister'])
   
->name('contest.quickRegister')

->middleware('auth');



require __DIR__.'/auth.php';
