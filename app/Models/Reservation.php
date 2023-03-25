<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['nomClient', 'prenomClient', 'mailClient', 'hotel_id','payer','code','chambre', 'tarif_id'];

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

    public function tarif(){
        return $this->belongsTo(Tarif::class);
    }

    use HasFactory;
}
