<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ville;
use App\Models\Programme;
use App\Models\Segment;
use App\Models\Etape;
use App\Models\Route;

class SearchController extends Controller
{
    public function index()
    {
        $villes = Ville::orderBy('nom_ville')->get();
        return view('search.index', compact('villes'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'ville_depart' => 'required',
            'ville_arrivee' => 'required|different:ville_depart',
            'date_depart' => 'required|date|after_or_equal:today',
            'nombre_voyageurs' => 'required|integer|min:1|max:10',
        ], [
            'ville_arrivee.different' => 'La ville d\'arrivée doit être différente',
            'date_depart.after_or_equal' => 'La date ne peut pas être dans le passé',
        ]);

        $villeDepart = Ville::find($request->ville_depart);
        $villeArrivee = Ville::find($request->ville_arrivee);
        $dateDepart = $request->date_depart;
        $nombreVoyageurs = $request->nombre_voyageurs;

        $trajets = $this->rechercherTrajets(
            $villeDepart,
            $villeArrivee,
            $dateDepart,
            $nombreVoyageurs
        );

        return view('search.results', compact(
            'trajets',
            'villeDepart',
            'villeArrivee',
            'dateDepart',
            'nombreVoyageurs'
        ));
    }


    private function rechercherTrajets($villeDepart, $villeArrivee, $date, $nombreVoyageurs)
    {
        $segments = $this->trouverSegments($villeDepart, $villeArrivee);

        if ($segments->isEmpty()) {
            return collect([]); 
        }

        $resultats = collect([]);

        foreach ($segments as $segment) {
            $programmes = Programme::where('route_id', $segment->route_id)
                ->whereDate('date_depart', $date)
                ->where('status', 'planifie')
                ->with('bus', 'route')
                ->get();

            foreach ($programmes as $programme) {
                if ($this->verifierDisponibilite($programme, $nombreVoyageurs)) {
                    $resultats->push([
                        'programme' => $programme,
                        'segment' => $segment,
                        'tarif' => $segment->tarif,
                        'duree' => $segment->duree_estimee,
                        'distance' => $segment->distance_km,
                    ]);
                }
            }
        }

        return $resultats->sortBy('programme.heure_depart');
    }

    private function trouverSegments($villeDepart, $villeArrivee)
{
    return Segment::with(['etapeDepart', 'etapeArrivee', 'route'])->get();
}


    
    private function verifierDisponibilite($programme, $nombreVoyageurs)
    {
        $placesReservees = $programme->reservations()->sum('nombre_voyageurs');        
        if (!$placesReservees) {
            $placesReservees = 0;
        }

        $placesDisponibles = $programme->bus->capacite - $placesReservees;
        return $placesDisponibles >= $nombreVoyageurs;
    }
}