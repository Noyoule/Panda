<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiRequest;
use App\Models\Hotel;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationCOntroller extends Controller
{
    public function storereservation(ApiRequest $request, $nom, $prenom, $mail, $id_hotel, $id_tarif, $key)
    {
       /*  Hotel::factory()->count(30)->create(); */
       $reservation = Reservation::create([
            'nomClient' => $nom,
            'prenomClient' => $prenom,
            'mailClient' => $mail,
            'hotel_id' => $id_hotel,
            'tarif_id' => $id_tarif,
        ]);
        return response()->json(['message' => 'Reservation effectué avec succès','id'=> $reservation->id]); 
    }

    public function validerReservation(ApiRequest $request, $id, $key)
    {
        $min = 1000000;
        $max = 9999999;
        $timestamp = time();
        $pre_code = rand($min, $max);
        $code = $timestamp.''.$pre_code;
        $reservation = Reservation::find($id);
        $reservation->update(['payer' => 1,'code' => $code]);

        return response()->json(['code' => $code]);
    }
}
