<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashbordController extends Controller
{
    public function index(){
        $hotel= User::find(Auth::user()->id)->hotel()->first();
        return view('my-dashbord',[
            'hotel'=> $hotel,
        ]);
    }

    public function store(Request $request){
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
