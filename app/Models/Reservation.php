<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['nomClient', 'prenomClient', 'mailClient', 'hotel_id','payer', 'tarif_id'];

    use HasFactory;
}
