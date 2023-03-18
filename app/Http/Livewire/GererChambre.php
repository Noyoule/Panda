<?php

namespace App\Http\Livewire;

use App\Models\Hotel;
use App\Models\Chambre;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class GererChambre extends Component
{
    public $chambres;

    public function mount(){
       $this->chambres = auth()->user()->hotel->chambres()
       ->orderby('numero')
       ->get();
       Storage::disk('public')->delete('storage/images/WiIDQd7QI2CgvPlYMWXWIYs3NzF9i0IHQ5nQ3LhI.jpg');

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
