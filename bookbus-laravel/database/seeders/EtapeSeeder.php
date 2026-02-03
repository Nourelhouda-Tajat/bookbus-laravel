<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Etape;

class EtapeSeeder extends Seeder
{
    public function run(): void
    {
        // Ligne 1 (Route ID 1): Casa-Marrakech
        Etape::create([
            'route_id' => 1,
            'adresse' => 'Gare Routière Ouled Ziane, Casablanca',
            'heure_passage' => '08:00:00',
            'ordre' => 1
        ]);

        Etape::create([
            'route_id' => 1,
            'adresse' => 'Station Settat',
            'heure_passage' => '09:00:00',
            'ordre' => 2
        ]);

        Etape::create([
            'route_id' => 1,
            'adresse' => 'Gare Routière Marrakech',
            'heure_passage' => '11:30:00',
            'ordre' => 3
        ]);

        // Ligne 2 (Route ID 2): Rabat-Fès
        Etape::create([
            'route_id' => 2,
            'adresse' => 'Gare Routière Kamra, Rabat',
            'heure_passage' => '07:00:00',
            'ordre' => 1
        ]);

        Etape::create([
            'route_id' => 2,
            'adresse' => 'Gare Routière Meknès',
            'heure_passage' => '09:30:00',
            'ordre' => 2
        ]);

        Etape::create([
            'route_id' => 2,
            'adresse' => 'Gare Routière Fès',
            'heure_passage' => '11:00:00',
            'ordre' => 3
        ]);

    }
}