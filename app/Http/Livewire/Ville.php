<?php

namespace App\Http\Livewire;

use App\Models\Ville as ModelsVille;
use Livewire\Component;

class Ville extends Component
{
    public $ville;
    public $villes;
    public $ville_id;
    public $isUpdated = false;

    protected $rules = [
        'ville' => 'required',
    ];

    public function save()
    {
       ModelsVille::create([
           'nom' => $this->ville
       ]);

       $this->ville = '';

       session()->flash('success', 'Ville enregistrée avec succès');
    }

    public function update()
    {
        $ville = $this->findVille($this->ville_id);
        
        if(!$ville){
            session()->flash('error', 'Impossible de mettre à jour la ville');
        }

        $ville->update([
            'nom' => $this->ville
        ]);

       $this->resetVille();

       session()->flash('success', 'Ville mise à jour avec succès');
    }

    public function edit($id)
    {
        $ville = $this->findVille($id);

        $this->isUpdated = true;
        $this->ville = $ville->nom;
        $this->ville_id = $ville->id;
    }

    public function delete($id)
    {
        $ville = $this->findVille($id);

        $ville->delete();

        session()->flash('error', 'Ville supprimée avec succès');
    }

    private function findVille($id)
    {
        return ModelsVille::findOrFail($id);
    }

    public function cancel()
    {
        $this->resetVille();
    }

    private function resetVille()
    {
        $this->ville_id = '';
        $this->ville = "";
        $this->isUpdated = false;
    }

    public function render()
    {
        $this->villes = ModelsVille::orderBy('created_at', 'desc')->get();
        return view('livewire.ville');
    }
}
