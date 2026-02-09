<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programme;
use App\Models\Segment;
use App\Models\Reservation;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'programme_id' => 'required|exists:programmes,id',
            'segment_id' => 'required|exists:segments,id',
            'nombre_voyageurs' => 'required|integer|min:1|max:10'
        ]);

        $programme = Programme::with('bus', 'route')->findOrFail($request->programme_id);
        $segment = Segment::with('etapeDepart', 'etapeArrivee')->findOrFail($request->segment_id);

        $placesReservees = Reservation::where('programme_id', $programme->id)->sum('nombre_voyageurs');
        $placesDisponibles = $programme->bus->capacite - $placesReservees;

        if ($placesDisponibles < $request->nombre_voyageurs) {
            return redirect()->back()->withErrors([
                'places' => "Désolé, il ne reste que $placesDisponibles places disponibles."
            ]);
        }

        $prixBase = $segment->tarif;
        $nombreVoyageurs = $request->nombre_voyageurs;

        return view('booking.create', compact(
            'programme',
            'segment',
            'prixBase',
            'nombreVoyageurs',
            'placesDisponibles'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'programme_id' => 'required|exists:programmes,id',
            'segment_id' => 'required|exists:segments,id',
            'nombre_voyageurs' => 'required|integer|min:1|max:10',

            'passagers' => 'required|array',
            'passagers.*.nom' => 'required|string|max:100',
            'passagers.*.cin' => 'required|string|max:20',
            'passagers.*.date_naissance' => 'required|date',
            'passagers.*.type' => 'required|in:adulte,enfant',

            'option_assurance' => 'nullable|boolean',
            'option_snack' => 'nullable|boolean',
            'option_premium' => 'nullable|boolean',
        ]);

        $programme = Programme::with('bus')->findOrFail($request->programme_id);
        $segment = Segment::findOrFail($request->segment_id);

        $placesReservees = Reservation::where('programme_id', $programme->id)->sum('nombre_voyageurs');
        $placesDisponibles = $programme->bus->capacite - $placesReservees;

        if ($placesDisponibles < $request->nombre_voyageurs) {
            return redirect()->back()->withErrors([
                'places' => "Il ne reste que $placesDisponibles places disponibles."
            ])->withInput();
        }

        $prixBase = $segment->tarif;
        $total = $prixBase * $request->nombre_voyageurs;

        if ($request->option_assurance) {
            $total += 25 * $request->nombre_voyageurs;
        }

        if ($request->option_snack) {
            $total += 15 * $request->nombre_voyageurs;
        }

        if ($request->option_premium) {
            $total += 30 * $request->nombre_voyageurs;
        }

        $reservation = Reservation::create([
            'date_reservation' => Carbon::now()->toDateString(),
            'status' => 'pending',
            'seat_number' => 0,
            'prix' => $total,
            'utilisateur_id' => null, // sans login
            'segment_id' => $segment->id,
            'programme_id' => $programme->id,
            'nombre_voyageurs' => $request->nombre_voyageurs,
        ]);

        return redirect()->route('search.index')->with('success', 'Réservation enregistrée avec succès !');
    }
}
