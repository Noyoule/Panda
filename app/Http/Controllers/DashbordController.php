<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashbordController extends Controller
{
    public function index()
    {
        $hotel = User::find(Auth::user()->id)->hotel;
        if ($hotel) {
            $chambre_libre = $hotel->chambres->where('statut', 'libre')->count();
            $chambre = $hotel->chambres->count();
        } else {
            $chambre_libre = 0;
            $chambre = 0;
        }
        $reservation = auth()->user()->hotel->reservations()
        ->whereDate('updated_at', date('Y-m-d'))
        ->where('payer',1)
        ->get();
        return view('my-dashbord', [
            'reservations' => $reservation,
            'hotel' => $hotel,
            'libre' => $chambre_libre,
            'chambre' => $chambre
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'type' => 'required',
        ]);

        $request->user()->hotel()->save(new Hotel([
            'nom' => $request->input('name'),
            'type' => $request->input('type'),
        ]));
        return redirect()->back();
    }
}
