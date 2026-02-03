<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bus;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $bus = [
            // Bus Standard
            ['matricule' => 'A-12345', 'capacite' => 50, 'status' => 'actif', 'type' => 'standard'],
            ['matricule' => 'B-23456', 'capacite' => 45, 'status' => 'actif', 'type' => 'standard'],
            ['matricule' => 'C-34567', 'capacite' => 55, 'status' => 'actif', 'type' => 'standard'],
            
            // Bus Confort
            ['matricule' => 'D-45678', 'capacite' => 50, 'status' => 'actif', 'type' => 'confort'],
            ['matricule' => 'E-56789', 'capacite' => 40, 'status' => 'en_maintenance', 'type' => 'confort'],
            ['matricule' => 'F-67890', 'capacite' => 50, 'status' => 'actif', 'type' => 'confort'],
            
            // Bus Premium
            ['matricule' => 'G-78901', 'capacite' => 45, 'status' => 'actif', 'type' => 'premium'],
            ['matricule' => 'H-89012', 'capacite' => 55, 'status' => 'actif', 'type' => 'premium'],
          ];
           

        foreach ($bus as $b) {
            Bus::create($b);
        }
    }
}
