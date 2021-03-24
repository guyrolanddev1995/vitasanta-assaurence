<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiculeSouscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'immatriculation',
        'num_sousc',
        'date_sousc',
        'montant',
        'mode_paiement',
        'ref_paiement',
        'code_encaisseur'
    ];
}
