<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Programme;  
use App\Models\Bus;  

class ProgrammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bus = Bus::all();

        $programmes = [
            ['bus_id' => $bus->random()->id, 'matricule' => 1001, 'capacite' => 50, 'heure_arrivee' => '10:00:00', 'actif' => 'oui'],
            ['bus_id' => $bus->random()->id, 'matricule' => 1002, 'capacite' => 45, 'heure_arrivee' => '11:30:00', 'actif' => 'oui'],
            ['bus_id' => $bus->random()->id, 'matricule' => 1003, 'capacite' => 55, 'heure_arrivee' => '13:00:00', 'actif' => 'oui'],
            ['bus_id' => $bus->random()->id, 'matricule' => 1004, 'capacite' => 50, 'heure_arrivee' => '14:30:00', 'actif' => 'oui'],
            ['bus_id' => $bus->random()->id, 'matricule' => 1005, 'capacite' => 40, 'heure_arrivee' => '16:00:00', 'actif' => 'non'],
            ['bus_id' => $bus->random()->id, 'matricule' => 1006, 'capacite' => 50, 'heure_arrivee' => '17:30:00', 'actif' => 'oui'],
            ['bus_id' => $bus->random()->id, 'matricule' => 1007, 'capacite' => 45, 'heure_arrivee' => '19:00:00', 'actif' => 'oui'],
            ['bus_id' => $bus->random()->id, 'matricule' => 1008, 'capacite' => 55, 'heure_arrivee' => '20:30:00', 'actif' => 'oui'],
            ['bus_id' => $bus->random()->id, 'matricule' => 1009, 'capacite' => 50, 'heure_arrivee' => '22:00:00', 'actif' => 'oui'],
            ['bus_id' => $bus->random()->id, 'matricule' => 1010, 'capacite' => 60, 'heure_arrivee' => '23:30:00', 'actif' => 'oui'],
            ['bus_id' => $bus->random()->id, 'matricule' => 1011, 'capacite' => 50, 'heure_arrivee' => '06:00:00', 'actif' => 'oui'],
            ['bus_id' => $bus->random()->id, 'matricule' => 1012, 'capacite' => 45, 'heure_arrivee' => '07:30:00', 'actif' => 'oui'],
            ['bus_id' => $bus->random()->id, 'matricule' => 1013, 'capacite' => 50, 'heure_arrivee' => '09:00:00', 'actif' => 'non'],
            ['bus_id' => $bus->random()->id, 'matricule' => 1014, 'capacite' => 55, 'heure_arrivee' => '12:00:00', 'actif' => 'oui'],
            ['bus_id' => $bus->random()->id, 'matricule' => 1015, 'capacite' => 50, 'heure_arrivee' => '15:00:00', 'actif' => 'oui'],
        ];

        foreach ($programmes as $programme) {
            Programme::create($programme);
        }
    }
}
