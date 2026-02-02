<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gare;   
use App\Models\Ville;

class GareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $villes = Ville::all();

        $gares = [
            ['nom' => 'Gare Routière Ouled Ziane', 'adresse' => 'Boulevard Ouled Ziane, Casablanca', 'ville_id' => $villes->where('nom_ville', 'Casablanca')->first()->id],
            ['nom' => 'Gare Routière Kamra', 'adresse' => 'Avenue Kamra, Rabat', 'ville_id' => $villes->where('nom_ville', 'Rabat')->first()->id],
            ['nom' => 'Gare Routière de Marrakech', 'adresse' => 'Bab Doukkala, Marrakech', 'ville_id' => $villes->where('nom_ville', 'Marrakech')->first()->id],
            ['nom' => 'Gare Routière de Fès', 'adresse' => 'Route d\'Imouzzer, Fès', 'ville_id' => $villes->where('nom_ville', 'Fès')->first()->id],
            ['nom' => 'Gare Routière de Tanger', 'adresse' => 'Place Jamia Laarbiya, Tanger', 'ville_id' => $villes->where('nom_ville', 'Tanger')->first()->id],
            ['nom' => 'Gare Routière d\'Agadir', 'adresse' => 'Boulevard Mohammed V, Agadir', 'ville_id' => $villes->where('nom_ville', 'Agadir')->first()->id],
            ['nom' => 'Gare Routière de Meknès', 'adresse' => 'Avenue des FAR, Meknès', 'ville_id' => $villes->where('nom_ville', 'Meknès')->first()->id],
            ['nom' => 'Gare Routière d\'Oujda', 'adresse' => 'Boulevard Zerktouni, Oujda', 'ville_id' => $villes->where('nom_ville', 'Oujda')->first()->id],
            ['nom' => 'Gare Routière de Kenitra', 'adresse' => 'Avenue Mohammed V, Kenitra', 'ville_id' => $villes->where('nom_ville', 'Kenitra')->first()->id],
            ['nom' => 'Gare Routière de Safi', 'adresse' => 'Avenue Moulay Youssef, Safi', 'ville_id' => $villes->where('nom_ville', 'Safi')->first()->id],
        ];

        foreach ($gares as $gare) {
            Gare::create($gare);
        }
    }
}
