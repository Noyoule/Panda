<?php

namespace App\Http\Livewire;

use App\Models\Chambre;
use Livewire\Component;

class AjouterChambre extends Component
{
  public $types;
  public $numero;
  public $imputType;


  public function mount()
  {
    $this->types = auth()->user()->hotel->types;
  }

  protected $rules = [
    'numero' => ['required', 'min:2', 'numeric'],
    'imputType' => ['required', 'not_in:0', 'numeric'],
  ];

  protected $messages = [
    'numero.required' => 'Le champ de doit pas être vide',
    'numero.min' => 'Le numero doit contenir au moins 2 caractères',
    'numero.numeric' => 'Le numero doit être un nombre',
    'imputType.required' => 'Le champ de doit pas être vide',
    'imputType.numeric' => 'Entrée invalide',
    'imputType.not_in' => 'Le champ de doit pas être vide'
  ];

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }


  public function store()
  {

    $this->validate();

    Chambre::create([
      'numero' => $this->numero,
      'type_id' => $this->imputType,
      'statut' => 'libre',
      'hotel_id' => auth()->user()->hotel()->first()->id,
    ]);
    $this->reset('numero');
    $this->reset('imputType');
    session()->flash('message', 'Chambre ajouter avec success');
  }

  public function render()
  {
    return view('livewire.ajouter-chambre');
  }
}
