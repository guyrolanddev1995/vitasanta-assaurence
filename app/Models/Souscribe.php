<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Souscribe extends Model
{
    use HasFactory;

    protected $fillable = [
        "num_sousc",
        "date_sousc",
        "heure_sousc",
        'nom',
        'phone',
        "mont_sousc",
        "ville_depart",
        'transporteur_id',
        'mode_paiement',
        "ville_arrive",
        "ref_paiement",
        "code_agent"
    ];

    public function villeDepart(){
        return $this->belongsTo(Ville::class, 'ville_depart', 'id');
    }

    public function villeArrivee(){
        return $this->belongsTo(Ville::class, 'ville_arrive', 'id');
    }

    public function transporteur(){
        return $this->belongsTo(Transporteur::class, 'transporteur_id', 'id');
    }

}
