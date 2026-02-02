<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ville; 

class VilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $villes = [
            ['nom_ville' => 'Casablanca'],
            ['nom_ville' => 'Rabat'],
            ['nom_ville' => 'Marrakech'],
            ['nom_ville' => 'Fès'],
            ['nom_ville' => 'Tanger'],
            ['nom_ville' => 'Agadir'],
            ['nom_ville' => 'Meknès'],
            ['nom_ville' => 'Oujda'],
            ['nom_ville' => 'Kenitra'],
            ['nom_ville' => 'Tétouan'],
            ['nom_ville' => 'Safi'],
            ['nom_ville' => 'El Jadida'],
            ['nom_ville' => 'Nador'],
            ['nom_ville' => 'Beni Mellal'],
            ['nom_ville' => 'Khouribga'],
        ];

        foreach ($villes as $ville) {
            Ville::create($ville);
        }
    }
}
