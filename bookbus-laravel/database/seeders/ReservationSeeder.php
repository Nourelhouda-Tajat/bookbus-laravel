<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;
use App\Models\Utilisateur;
use App\Models\Segment;
use App\Models\Programme;

class ReservationSeeder extends Seeder
{
    public function run(): void
    {
        $utilisateurs = Utilisateur::where('role', 'client')->get();
        $segments = Segment::all();
        $programmes = Programme::all();

    

        // Créer les réservations
        Reservation::create([
            'date_reservation' => '2026-01-28',
            'status' => 'confirme',
            'seat_number' => 12,
            'prix' => 120.00,
            'utilisateur_id' => $utilisateurs->first()->id,
            'segment_id' => $segments->first()->id,
            'programme_id' => $programmes->first()->id,
        ]);

        Reservation::create([
            'date_reservation' => '2026-01-30',
            'status' => 'confirme',
            'seat_number' => 8,
            'prix' => 50.00,
            'utilisateur_id' => $utilisateurs->first()->id,
            'segment_id' => $segments->first()->id,
            'programme_id' => $programmes->first()->id,
        ]);

        Reservation::create([
            'date_reservation' => '2026-02-02',
            'status' => 'pending',
            'seat_number' => 15,
            'prix' => 95.00,
            'utilisateur_id' => $utilisateurs->first()->id,
            'segment_id' => 6,  // Segment Rabat-Fès
            'programme_id' => $programmes->first()->id,
        ]);
    }
}