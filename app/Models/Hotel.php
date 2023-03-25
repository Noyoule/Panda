<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Hotel extends Model
{

    protected $fillable = [
        'nom',
        'type',
        'longitude',
        'latitude',
        'image_path',
        'user_id'
    ];
    use HasFactory;

    protected function imagePath(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => url(Storage::url($value)),
        );
    }

    public function types(){
        return $this->hasMany(Type::class);
    }
    public function specialites(){
        return $this->hasMany(Specialite::class);
    }

    public function chambres(){
        return $this->hasMany(Chambre::class);
    }

    public function tarifs(){
        return $this->hasMany(Tarif::class);
    }

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

}
