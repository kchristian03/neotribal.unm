<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('tribal-x', \App\Http\Livewire\TribalXAi::class)->name('tribal-x');
    Route::get('/builder/{location}', \App\Http\Controllers\PlaceController::class)->name('builder');
    Route::get('buy-experience', \App\Http\Livewire\BuyExperience::class)->name('buy-experience');
    Route::get('buy-coin', \App\Http\Livewire\BuyCoin::class)->name('buy-coin');
    Route::get('experience/{location}', \App\Http\Livewire\Experience::class)->name('experience-location');
});

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
