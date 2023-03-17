<?php

namespace App\Http\Livewire;

use App\Models\Chambre;
use Livewire\Component;

class GererChambre extends Component
{
    public $chambres;

    public function mount(){
       $this->chambres = auth()->user()->hotel->chambres()
       ->orderby('numero')
       ->get();
    }

    public function ChangerStatut($id,$statut){
        $chambre = Chambre::find($id);
        $chambre->update([
            'statut' => $statut
        ]);
    }
    public function render()
    {
        return view('livewire.gerer-chambre');
    }
}
