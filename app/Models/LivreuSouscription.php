<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivreuSouscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_sousc',
        'date_sousc',
        'nom',
        'telephone',
        'montant',
        'mode_paiement',
        'ref_paiement',
        'code_encaisseur'
    ];
}
