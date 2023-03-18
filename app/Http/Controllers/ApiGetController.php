<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiRequest;
use App\Models\Hotel;
use Illuminate\Http\Request;

class ApiGetController extends Controller
{
    public function getHotels(ApiRequest $request, $key){
       $hotel= Hotel::all();
       return response()->json($hotel);
    }

    public function getTarifs(ApiRequest $request,$id, $key){
        $hotel= Hotel::find($id);
        $tarifs = $hotel->tarifs;
        return response()->json($tarifs);
     }

     public function getspetialites(ApiRequest $request,$id, $key){
        $hotel= Hotel::find($id);
        $spetialite = $hotel->specialites;
        return response()->json($spetialite);
     }
}
