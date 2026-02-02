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
            ['nom_trajet' => 'Casablanca - Marrakech', 'adresse' => 'Route Nationale 9'],
            ['nom_trajet' => 'Rabat - Fès', 'adresse' => 'Autoroute A2'],
            ['nom_trajet' => 'Tanger - Tétouan', 'adresse' => 'Route Nationale 2'],
            ['nom_trajet' => 'Agadir - Marrakech', 'adresse' => 'Route Nationale 8'],
            ['nom_trajet' => 'Casablanca - Rabat', 'adresse' => 'Autoroute A1'],
            ['nom_trajet' => 'Fès - Meknès', 'adresse' => 'Route Nationale 13'],
            ['nom_trajet' => 'Marrakech - Essaouira', 'adresse' => 'Route Nationale 8'],
            ['nom_trajet' => 'Oujda - Fès', 'adresse' => 'Route Nationale 6'],
            ['nom_trajet' => 'Kenitra - Rabat', 'adresse' => 'Autoroute A1'],
            ['nom_trajet' => 'Safi - Marrakech', 'adresse' => 'Route Régionale R207'],
            ['nom_trajet' => 'El Jadida - Casablanca', 'adresse' => 'Route Côtière'],
            ['nom_trajet' => 'Beni Mellal - Marrakech', 'adresse' => 'Route Nationale 8'],
            ['nom_trajet' => 'Tanger - Casablanca', 'adresse' => 'Autoroute A1'],
            ['nom_trajet' => 'Nador - Oujda', 'adresse' => 'Route Nationale 2'],
            ['nom_trajet' => 'Khouribga - Casablanca', 'adresse' => 'Route Nationale 11'],
        ];

        foreach ($routes as $route) {
            Route::create($route);
        }
    }
}
