<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\VehiculeSouscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VehiculeController extends Controller
{
    public function souscribe(Request $request)
    {
        if($request->mode_paiement == 'espece'){
            if(empty($request->code_agent)){
                return response()->json([
                    'code' => 403,
                    'message' => 'Veillez saisir votre code agent'
                ]);
            }

            $user = Agent::where('code', $request->code_agent)->exists();

            if(!$user){
                return response()->json([
                    'code' => 403,
                    'message' => 'Vous avez saisi un code incorrect'
                ]);
            }
        }

        $souscribe = VehiculeSouscription::create([
            'num_sousc' => mt_rand(1000000, 9999999),
            'date_sousc' => $request->date_sousc,
            'immatriculation' => $request->immatriculation,
            'montant' => $request->mont_sousc,
            'mode_paiement' => $request->mode_paiement,
            'ref_paiement' => $request->ref_paiement ? $request->ref_paiement : null,
            'code_encaisseur' => $request->code_agent ? $request->code_agent : null
        ]);

        if(!$souscribe){
            return response()->json([
                'code' => 500,
                'message' => 'Erreur du serveur',
            ]);
        }

        $api = "kouassibrouricky@gmail.com";
                $secret = "bRRFsXLaosRJsg4si7*FISNOOM2kyBXGsCjeM1rl";
                $msg = "Votre souscription de " .$souscribe->mont_sousc."FCFA a ete effectue avec succes. Bon voyage avec VITASANTE ASSURANCES"; // le message à envoyer à l'utilisateur
                $receiver = "225".$souscribe->phone;// le numero de l'utilisateur
                $sender = "VITASANTE"; // le nom à afficher sur la messagerie d'utilisateur
                $cltmsgid = 1;

                $url = "http://www.letexto.com/send_message/user/$api/secret/$secret/msg/$msg/receiver/$receiver/sender/$sender/cltmsgid/$cltmsgid";

                $response = Http::get($url);

       return response()->json([
           'code' => '201',
           'message' => 'Souscription éffectuée avec succès'
       ]);
    }
}
