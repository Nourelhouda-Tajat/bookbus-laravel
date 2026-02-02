<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Etape;

class EtapeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $etapes = [
            ['adresse' => 'Station Service Settat'],
            ['adresse' => 'Aire de repos Benslimane'],
            ['adresse' => 'Station El Gara'],
            ['adresse' => 'Halte Khemisset'],
            ['adresse' => 'Point d\'arrêt Larache'],
            ['adresse' => 'Station Ksar El Kebir'],
            ['adresse' => 'Aire de Chichaoua'],
            ['adresse' => 'Halte Imouzzer'],
            ['adresse' => 'Point d\'arrêt Taounate'],
            ['adresse' => 'Station Taza'],
            ['adresse' => 'Aire de Boujdour'],
            ['adresse' => 'Halte Youssoufia'],
            ['adresse' => 'Point d\'arrêt Berrechid'],
            ['adresse' => 'Station Bouznika'],
            ['adresse' => 'Aire de Temara'],
        ];

        foreach ($etapes as $etape) {
            Etape::create($etape);
        }
    }
}
