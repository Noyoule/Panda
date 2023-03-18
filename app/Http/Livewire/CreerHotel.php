<?php

namespace App\Http\Livewire;

use App\Models\Hotel;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreerHotel extends Component
{
   use WithFileUploads;
    public $file;
    public $name;
    public $type;

    protected $rules = [
        'file' => ['required','image'],
        'name' => ['required','min:3'],
        'type' => ['required', 'numeric','not_in:Sélectionner le type','in:1,2,3,4,5'],
      ];
    
      protected $messages = [
        'type.required' => 'Le champ de doit pas être vide',
        'name.min' => 'Le type doit contenir au moins 3 caractères',
        'file.image'=>'Le fichier doit être une image',
        'file.required'=>'L\'image est obligatoire',
        'name.required' =>'Le champ de doit pas être vide',
        'type.not_in' => 'Le champ de doit pas être vide',
        'type.in' => 'Entrez invalide',
      ];
    
      public function updated($propertyName)
      {
        $this->validateOnly($propertyName);
      }

    public function store(){
        $this->validate();
        $path = $this->file->store('images','public');
        Hotel::create([
            'nom'=>$this->name,
            'type'=>$this->type,
            'image_path'=> $path,
            'user_id'=> auth()->user()->id
        ]);
         return redirect()->route('my-dashboard');
    }

    public function render()
    {
        return view('livewire.creer-hotel');
    }
}
