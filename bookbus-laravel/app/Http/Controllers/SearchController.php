<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ville;
use App\Models\Route;
use App\Models\Programme;
use App\Models\Segment;

class SearchController extends Controller
{
    public function index(){
        $villes=Ville::orderBy('nom_ville')->get();
        return view('search.index', ['villes' => $villes]);
    }
    public function search(Request $request){
        $request->validate([
            'ville_depart'=> 'required',
            'ville_arrivee'=> 'required',
            'date_depart'=> 'required|date',
            'nombre_voyageurs'=> 'required|integer|min:1|max:10',

        ]);

        $villeDepartId = $request->ville_depart;
        $villeArriveeId = $request->ville_arrivee;
        $dateDepart = $request->date_depart;
        $nombreVoyageurs = $request->nombre_voyageurs;

        $villeDepart = Ville::find($villeDepartId);
        $villeArrivee = Ville::find($villeArriveeId);

        $trajets = Programme::whereDate('date_depart', $dateDepart)
            ->where('status', 'planifie')
            ->with('bus', 'route')
            ->get();

        return view('search.results', [
            'trajets' => $trajets,
            'villeDepart' => $villeDepart,
            'villeArrivee' => $villeArrivee,
            'dateDepart' => $dateDepart,
            'nombreVoyageurs' => $nombreVoyageurs,
        ]);
    
    }

    
}
