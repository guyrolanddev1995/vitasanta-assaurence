<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Souscribe;
use App\Models\Transporteur;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function getVilles()
    {
        $villes = Ville::orderBy('nom', 'asc')->get();

        return response()->json($villes);
    }

    public function getTransporteurs()
    {
        $transporteurs = Transporteur::orderBy('nom', 'asc')->get();

        return response()->json($transporteurs);
    }

    public function souscribe(Request $request)
    {
    //    $this->validate($request, [
    //         'nom' => 'required',
    //         'phone' => 'required',
    //         'date_souc' => 'required|date',
    //         'heur_sousc' => 'required|date_format:H:i',
    //         'mont_sousc' => 'required',
    //         'ville_depart' => 'required',
    //         'ville_arrive' => 'required',
    //    ]);

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

       $souscribe = Souscribe::create([
           'num_sousc' => mt_rand(1000000, 9999999),
           'date_sousc' => $request->date_sousc,
           'nom' => $request->nom,
           'phone' => $request->phone,
           'heure_sousc' => $request->heure_sousc,
           'mont_sousc' => $request->mont_sousc,
           'ville_depart' => $request->ville_depart,
           'ville_arrive' => $request->ville_arrive,
           'transporteur_id' => $request->transporteur,
           'mode_paiement' => $request->mode_paiement,
           'ref_paiement' => $request->ref_paiement ? $request->ref_paiement : null,
           'code_agent' => $request->code_agent ? $request->code_agent : null
       ]);

       if(!$souscribe){
           return response()->json([
               'code' => 500,
               'message' => 'Erreur du serveur',
           ]);
       }

       $api = "kouassibrouricky@gmail.com";
                $secret = "bRRFsXLaosRJsg4si7*FISNOOM2kyBXGsCjeM1rl";
                $msg = "Votre souscription de " .$souscribe->mont_sousc."FCFA a ete effectue avec succes pour le trajet de ". Str::upper($souscribe->villeDepart->nom) ." a ". Str::upper($souscribe->villeArrivee->nom)." Bon voyage avec VITASANTE ASSURANCES"; // le message à envoyer à l'utilisateur
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
