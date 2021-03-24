<?php

namespace App\Http\Controllers;

use App\Models\LivreuSouscription;
use App\Models\Souscribe;
use App\Models\VehiculeSouscription;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.home');
    }

    public function getSouscribe()
    {
        $souscribes = Souscribe::with('villeDepart', 'villeArrivee', 'transporteur')->orderBy('created_at', 'desc')->get();
      
        return view('pages.souscribe.index', compact('souscribes'));
    }

    public function getLivreurSouscribe()
    {
        $souscribes = LivreuSouscription::orderBy('created_at', 'desc')->get();
      
        return view('pages.souscribe.livreur', compact('souscribes'));
    }

    public function getVehiculeSouscribe()
    {
        $souscribes = VehiculeSouscription::orderBy('created_at', 'desc')->get();
      
        return view('pages.souscribe.vehicule', compact('souscribes'));
    }
}
