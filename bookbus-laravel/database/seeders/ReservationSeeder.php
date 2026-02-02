<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reservation;   
use App\Models\Utilisateur;   
use Carbon\Carbon;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $utilisateurs = Utilisateur::where('role', 'client')->get();
        $reservations = [
            ['date_reservation' => Carbon::now()->subDays(5), 'status' => 'confirmée', 'seat_number' => 12, 'utilisateur_id' => $utilisateurs->random()->id],
            ['date_reservation' => Carbon::now()->subDays(4), 'status' => 'confirmée', 'seat_number' => 8, 'utilisateur_id' => $utilisateurs->random()->id],
            ['date_reservation' => Carbon::now()->subDays(3), 'status' => 'confirmée', 'seat_number' => 15, 'utilisateur_id' => $utilisateurs->random()->id],
            ['date_reservation' => Carbon::now()->subDays(2), 'status' => 'en attente', 'seat_number' => 22, 'utilisateur_id' => $utilisateurs->random()->id],
            ['date_reservation' => Carbon::now()->subDays(1), 'status' => 'confirmée', 'seat_number' => 5, 'utilisateur_id' => $utilisateurs->random()->id],
            ['date_reservation' => Carbon::now(), 'status' => 'confirmée', 'seat_number' => 18, 'utilisateur_id' => $utilisateurs->random()->id],
            ['date_reservation' => Carbon::now()->addDays(1), 'status' => 'en attente', 'seat_number' => 30, 'utilisateur_id' => $utilisateurs->random()->id],
            ['date_reservation' => Carbon::now()->addDays(2), 'status' => 'confirmée', 'seat_number' => 7, 'utilisateur_id' => $utilisateurs->random()->id],
            ['date_reservation' => Carbon::now()->addDays(3), 'status' => 'confirmée', 'seat_number' => 25, 'utilisateur_id' => $utilisateurs->random()->id],
            ['date_reservation' => Carbon::now()->addDays(4), 'status' => 'annulée', 'seat_number' => 14, 'utilisateur_id' => $utilisateurs->random()->id],
            ['date_reservation' => Carbon::now()->addDays(5), 'status' => 'confirmée', 'seat_number' => 20, 'utilisateur_id' => $utilisateurs->random()->id],
            ['date_reservation' => Carbon::now()->addDays(6), 'status' => 'confirmée', 'seat_number' => 11, 'utilisateur_id' => $utilisateurs->random()->id],
            ['date_reservation' => Carbon::now()->addDays(7), 'status' => 'en attente', 'seat_number' => 28, 'utilisateur_id' => $utilisateurs->random()->id],
            ['date_reservation' => Carbon::now()->addDays(8), 'status' => 'confirmée', 'seat_number' => 3, 'utilisateur_id' => $utilisateurs->random()->id],
            ['date_reservation' => Carbon::now()->addDays(9), 'status' => 'confirmée', 'seat_number' => 16, 'utilisateur_id' => $utilisateurs->random()->id],
        ];

        foreach ($reservations as $reservation) {
            Reservation::create($reservation);
        }
    }
}
