<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiRequest;
use App\Models\Hotel;
use App\Models\Reservation;
use App\Models\Type;
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
        return response()->json(['message' => 'Reservation effectué avec succès', 'id' => $reservation->id]);
    }

    public function validerReservation(ApiRequest $request, $id, $key)
    {
         /* Nous allons attribuer une chambre au client */
         $chambre_type = Reservation::find($id)->tarif->Chambre_type;
         $type_id = Type::where('nom', $chambre_type)->first('id');
         $chambre = Reservation::find($id)->hotel->chambres
             ->where('type_id', $type_id->id)
             ->where('statut', 'libre')
             ->first();
            if($chambre!=null){
                $reservation = Reservation::find($id);
                if ($reservation->payer == 0) {
                    /* Nous allons modifier le statut choisi par le système */
                    $chambre->update(['statut'=>'occupé']);
                    /* Génération du code aléatoirement */
                    $min = 1000000;
                    $max = 9999999;
                    $timestamp = time();
                    $pre_code = rand($min, $max);
                    $code = $timestamp . '' . $pre_code;
                    $reservation = Reservation::find($id);
                    $reservation->update(['payer' => 1, 'code' => $code,'chambre'=>$chambre->numero]);
                    return response()->json(['code' => $code]);
                } else {
                    return response()->json(['erreur' => 'Vous avez deja payer cette reservation']);
                }
            }else{
                return response()->json(['message' => 'Désolé les chambre de ce type ne sont pas disponibles']);

            }
    }
}
