<?php

namespace App\Http\Livewire;

use App\Models\Tarif;
use Livewire\Component;

class GrilleDeTarifs extends Component
{
    public $durer;
    public $Chambre_type;
    public $prix;
    public $tarifs;

    protected $rules = [
        'durer' => ['required'],
        'Chambre_type' => ['required', 'not_in:Sélectionner le type'],
        'prix' => ['required', 'min:3'],
    ];

    protected $messages = [
        'durer.required' => 'Le champ de doit pas être vide',
        'iChambre_type.required' => 'Le champ de doit pas être vide',
        'Chambre_type.not_in' => 'Le champ de doit pas être vide',
        'prix.min' => 'Le prix doit contenir au moins 3 caractères',
        'prix.required' => 'Le champ de doit pas être vide',

    ];

     public function mount(){
        $this->tarifs = auth()->user()->hotel->tarifs()->get();
     }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {

        $this->validate();

         auth()->user()->hotel->tarifs()->save(new Tarif([
            'durer' => $this->durer,
            'Chambre_type' => $this->Chambre_type,
            'prix' => $this->prix,
        ]));
        $this->reset('durer');
        $this->reset('prix');
        $this->reset('Chambre_type');
        session()->flash('message', 'Chambre ajouter avec success');
        $this->tarifs = auth()->user()->hotel->tarifs()->get();
    }

    public function delete($id){
        $tarif = Tarif::find($id);
        $tarif->delete();
    
        $this->tarifs = auth()->user()->hotel->tarifs()->get();
    }

    public function render()
    {
        return view('livewire.grille-de-tarifs');
    }
}
