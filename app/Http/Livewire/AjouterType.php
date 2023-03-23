<?php

namespace App\Http\Livewire;

use App\Models\Type;
use Livewire\Component;
use App\Rules\AlphaNumeric;

class AjouterType extends Component
{
  public $type;



  protected $rules = [
    'type' => ['required', 'min:8'],
  ];

  protected $messages = [
    'type.required' => 'Le champ de doit pas être vide',
    'type.min' => 'Le type doit contenir au moins 8 caractères',
  ];

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }

  public function store()
  {
    $this->validate();
   $type = Type::create([
      'nom' => $this->type,
      'hotel_id' => auth()->user()->hotel->id,
    ]);

    $this->emit('typeCreated');
    $this->reset('type');
    session()->flash('message', 'Type ajouter avec success');
  }
  public function render()
  {
    return view('livewire.ajouter-type');
  }
}
