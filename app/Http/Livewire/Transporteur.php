<?php

namespace App\Http\Livewire;

use App\Models\Transporteur as ModelsTransporteur;
use Livewire\Component;

class Transporteur extends Component
{
    public $transporteur;
    public $transporteurs;
    public $transporteur_id;
    public $isUpdated = false;

    protected $rules = [
        'transporteur' => 'required',
    ];

    public function save()
    {
        ModelsTransporteur::create([
           'nom' => $this->transporteur
       ]);

       $this->transporteur = '';

       session()->flash('success', 'Transporteur enregistré avec succès');
    }

    public function edit($id)
    {
        $transporteur = $this->findTransporteur($id);

        $this->isUpdated = true;
        $this->transporteur = $transporteur->nom;
        $this->transporteur_id = $transporteur->id;
    }

    public function delete($id)
    {
        $transporteur = $this->findTransporteur($id);

        $transporteur->delete();

        session()->flash('error', 'Transporteur supprimée avec succès');
    }

    public function update()
    {
        $transporteur = $this->findTransporteur($this->transporteur_id);
        
        if(!$transporteur){
            session()->flash('error', 'Impossible de mettre à jour le transporteur');
        }
        
        $transporteur->update([
            'nom' => $this->transporteur
        ]);

       $this->resetTransporteur();

       session()->flash('success', 'Transporteur mise à jour avec succès');
    }

    private function findTransporteur($id)
    {
        return ModelsTransporteur::findOrFail($id);
    }

    public function cancel()
    {
        $this->resetTransporteur();
    }

    private function resetTransporteur()
    {
        $this->transporteur_id = '';
        $this->transporteur = "";
        $this->isUpdated = false;
    }

    public function render()
    {
        $this->transporteurs = ModelsTransporteur::orderBy('created_at', 'desc')->get();
        return view('livewire.transporteur');
    }
}
