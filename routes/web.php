<?php

use App\Http\Controllers\DashbordController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/my-dashboard',[DashbordController::class,'index'])->name('my-dashboard')->middleware('auth');
Route::post('/hotel-post',[DashbordController::class,'store'])->name('store-hotel')->middleware('auth');

Route::get('/gerez-chambre', function () {
    return view('gerer-chambre');
})->name('gerer-chambre');

Route::get('/gerez-specialite', function () {
    return view('gerer-specialite');
})->name('gerer-specialite');

Route::get('/gerez-grille-de-reservation', function () {
    return view('ajouter-grille-de-reservation');
})->name('gerer-grille-de-reservations');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
