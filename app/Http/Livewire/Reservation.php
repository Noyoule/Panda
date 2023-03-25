<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reservation as ReservationModel;

class Reservation extends Component
{
    public $reservations;
    public $query = '';

    public function mount(){
        $this->reservations = ReservationModel::where('payer',1)->orderby('id','desc')->get();
    }

    public function updatedQuery()
    {
        $words = '%' . $this->query . '%';
        if (strlen($this->query) >= 2 || strlen($this->query)==0) {
            $this->reservations = ReservationModel::where('nomCLient','like', $words)
                ->orwhere('PrenomClient','like', $words)
                ->orwhere('mailClient','like', $words)
                ->orwhere('code','like', $words)
                ->orwhere('updated_at','like', $words)
                ->orderby('id','desc')
                ->get();
        }
    }
    
    public function render()
    {
        return view('livewire.reservation');
    }
}
