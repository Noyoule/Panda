<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{

    protected $fillable = [
        'nom',
        'type',
        'image_path',
        'user_id'
    ];
    use HasFactory;

    public function types(){
        return $this->hasMany(Type::class);
    }
    public function specialites(){
        return $this->hasMany(Specialite::class);
    }

    public function chambres(){
        return $this->hasMany(Chambre::class);
    }

}
