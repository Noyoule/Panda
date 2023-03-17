<?php

namespace App\Models;

use App\Models\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chambre extends Model
{
   protected $fillable = [
    'numero',
    'type_id',
    'statut',
    'hotel_id'
   ];

   public function hisType(){
    $type = Type::find($this->type_id);
    return $type;
   }
    use HasFactory;
}
