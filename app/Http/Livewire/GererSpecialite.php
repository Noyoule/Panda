<?php

namespace App\Http\Livewire;

use App\Models\Specialite;
use Livewire\Component;
use Livewire\WithFileUploads;

class GererSpecialite extends Component
{
    use WithFileUploads;
    public $file;
    public $name;
    public $prix;
    public $specialites;

    protected $rules = [
        'file' => ['required','image'],
        'name' => ['required', 'min:5'],
        'prix' => ['required', 'min:3'],
    ];

    protected $messages = [
        'file.image' => 'Le fichier doit être une image',
        'file.required' => 'L\'image est obligatoire',
        'name.required' => 'Le champ de doit pas être vide',
        'name.min' => 'Le type doit contenir au moins 5 caractères',
        'prix.min' => 'Le prix doit avoir au moin 3 caractères',
        'prix.required' => 'Le champ de doit pas être vide',

    ];

    public function mount(){
        $this->specialites = auth()->user()->hotel->specialites()->get();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function store()
    {

        $this->validate();

        $path = $this->file->store('specialite-images', 'public');
        Specialite::create([
            'nom' => $this->name,
            'prix' => $this->prix,
            'image_path' => $path,
            'hotel_id' => auth()->user()->hotel->id,
        ]);

        $this->reset('name');
        $this->reset('prix');
        $this->reset('file');
        $this->specialites = auth()->user()->hotel->specialites()->get();
        session()->flash('message', 'Spécialité ajouter avec success');
    }

    public function delete($id){
        $specialite = Specialite::find($id);
        $specialite->delete();
    
        $this->specialites = auth()->user()->hotel->specialites()->get();
    }


    public function render()
    {
        return view('livewire.gerer-specialite');
    }
}
