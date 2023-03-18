<?php

namespace App\Models;

use App\Models\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tarif extends Model
{
    protected $fillable = [
        'durer',
        'Chambre_type',
        'prix',
        'hotel_id',
    ];

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

     public function tarifType(){
        $type = Type::find($this->Chambre_type);
        return $type;
     }

    use HasFactory;
}
