<?php

namespace App\Http\Livewire;

use App\Models\Agent as ModelsAgent;
use Livewire\Component;

class Agent extends Component
{
    public $matricule;
    public $nom;
    public $prenom;
    public $code;
    public $isUpdated = false;
    public $agents;

    protected $rules = [
        'matricule' => 'required|unique:agents,matricule',
        'nom' => 'required',
        'prenom' => 'required',
        'code' => 'required|unique:agents,code|size:6'
    ];

    public function save()
    {
        $this->validate();

        $agent = ModelsAgent::create([
            'matricule' => $this->matricule,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'code' => $this->code
        ]);

        if(! $agent){
            session()->flash('error', 'Une erreur est survenue lors de la création du compte agent');
        }
        
        $this->resetAgent();
        session()->flash('success', 'Agent enregistré avec succès');
    }


    private function resetAgent()
    {
        $this->matricule = "";
        $this->nom = "";
        $this->prenom = "";
        $this->code = '';
    }

    public function render()
    {
        $this->agents = ModelsAgent::orderBy('created_at', 'desc')->get();
        return view('livewire.agent');
    }
}
