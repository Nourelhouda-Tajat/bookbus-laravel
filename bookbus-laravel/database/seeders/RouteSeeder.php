<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Route;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $routes = [
            ['nom_trajet' => 'Ligne 101: Casablanca - Marrakech', 'description' => 'Trajet direct via autoroute'],
            ['nom_trajet' => 'Ligne 102: Rabat - Fès', 'description' => 'Passage par Meknès'],
            ['nom_trajet' => 'Ligne 103: Tanger - Tétouan', 'description' => 'Trajet côtier'],
            ['nom_trajet' => 'Ligne 104: Agadir - Marrakech', 'description' => 'Route panoramique'],
            ['nom_trajet' => 'Ligne 105: Casablanca - Rabat', 'description' => 'Liaison express'],
            ['nom_trajet' => 'Ligne 106: Fès - Meknès', 'description' => 'Trajet direct'],
            ['nom_trajet' => 'Ligne 107: Marrakech - Essaouira', 'description' => 'Route côtière'],
            ['nom_trajet' => 'Ligne 108: Oujda - Fès', 'description' => 'Traversée du Moyen Atlas'],
            ['nom_trajet' => 'Ligne 109: Kenitra - Rabat', 'description' => 'Liaison rapide'],
            ['nom_trajet' => 'Ligne 110: Safi - Marrakech', 'description' => 'Route directe'],
        ];

        foreach ($routes as $route) {
            Route::create($route);
        }
    }
}
