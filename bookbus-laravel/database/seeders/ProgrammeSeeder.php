<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Programme;
use App\Models\Bus;
use App\Models\Route;
use Carbon\Carbon;

class ProgrammeSeeder extends Seeder
{
    public function run(): void
    {
        // Récupérer tous les bus actifs
        $bus = Bus::all();
        
        // Récupérer les routes par leur ID (plus simple)
        $route1 = Route::find(1);  // Ligne 101: Casa-Marrakech
        $route2 = Route::find(2);  // Ligne 102: Rabat-Fès
        
        // Vérifier que les données existent
        if ($bus->isEmpty() || !$route1) {
            $this->command->warn('Données manquantes');
            return;
        }

        // Programme 1
        Programme::create([
            'bus_id' => 1,
            'route_id' => 1,
            'date_depart' => '2026-02-09',
            'date_arrivee' => '2026-02-09',
            'heure_depart' => '08:00:00',
            'heure_arrivee' => '11:30:00',
            'status' => 'planifie'
        ]);

        // Programme 2
        Programme::create([
            'bus_id' => 2,
            'route_id' => 1,
            'date_depart' => '2026-02-02',
            'date_arrivee' => '2026-02-02',
            'heure_depart' => '14:00:00',
            'heure_arrivee' => '17:30:00',
            'status' => 'planifie'
        ]);

        // Programme 3
        Programme::create([
            'bus_id' => 3,
            'route_id' => 1,
            'date_depart' => '2026-02-03',
            'date_arrivee' => '2026-02-03',
            'heure_depart' => '06:00:00',
            'heure_arrivee' => '09:30:00',
            'status' => 'planifie'
        ]);

        // Programme 4 (Route 2 si elle existe)
        if ($route2) {
            Programme::create([
                'bus_id' => 4,
                'route_id' => 2,
                'date_depart' => '2026-02-02',
                'date_arrivee' => '2026-02-02',
                'heure_depart' => '07:00:00',
                'heure_arrivee' => '11:00:00',
                'status' => 'planifie'
            ]);

            Programme::create([
                'bus_id' => 5,
                'route_id' => 2,
                'date_depart' => '2026-02-02',
                'date_arrivee' => '2026-02-02',
                'heure_depart' => '15:00:00',
                'heure_arrivee' => '19:00:00',
                'status' => 'planifie'
            ]);
        }
    }
}