<?php

namespace App\Http\Livewire;

use App\Models\Hotel;
use Livewire\Component;

class Reservation extends Component
{
    public $reservations;
    public $query = '';

    public function mount(){
        $this->reservations = auth()->user()->hotel->reservations()->where('payer',1)->orderby('id','desc')->get();
    }

    public function updatedQuery()
    {
        $words = '%' . $this->query . '%';
        if (strlen($this->query) >= 2 || strlen($this->query)==0) {
            $this->reservations =auth()->user()->hotel->reservations()
                ->where('payer',1)
                ->where(function($query) use ($words){
                  $query ->where('nomCLient','like', $words)
                    ->orwhere('PrenomClient','like', $words)
                    ->orwhere('mailClient','like', $words)
                    ->orwhere('code','like', $words)
                    ->orwhere('updated_at','like', $words)
                    ->orderby('id','desc');
                })
                ->get();
        }
    }
    
    public function render()
    {
        return view('livewire.reservation');
    }
}
