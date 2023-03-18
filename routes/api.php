<?php

use App\Http\Controllers\ApiGetController;
use App\Http\Controllers\ReservationCOntroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('reserve/{nom}/{prenom}/{mail}/{id_hotel}/{id_tarif}/{key}',[ReservationCOntroller::class,'storereservation'])->name('reserve');

Route::post('valider/{id}/{key}',[ReservationCOntroller::class,'validerReservation'])->name('validerReservation');

Route::get('hotel/{key}',[ApiGetController::class,'getHotels'])->name('get_hotel');

Route::get('tarif/{id}/{key}',[ApiGetController::class,'getTarifs'])->name('get_tarifs');

Route::get('spetialite/{id}/{key}',[ApiGetController::class,'getspetialites'])->name('get_spetialite');