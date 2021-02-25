<?php

namespace App\Http\Controllers;

use App\Models\Souscribe;
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
}
