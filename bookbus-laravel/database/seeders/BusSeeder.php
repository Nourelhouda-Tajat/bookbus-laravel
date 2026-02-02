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
            ['matricule' => 'A-12345', 'capacite' => 50, 'status' => 'actif'],
            ['matricule' => 'B-23456', 'capacite' => 45, 'status' => 'actif'],
            ['matricule' => 'C-34567', 'capacite' => 55, 'status' => 'actif'],
            ['matricule' => 'D-45678', 'capacite' => 50, 'status' => 'actif'],
            ['matricule' => 'E-56789', 'capacite' => 40, 'status' => 'en maintenance'],
            ['matricule' => 'F-67890', 'capacite' => 50, 'status' => 'actif'],
            ['matricule' => 'G-78901', 'capacite' => 45, 'status' => 'actif'],
            ['matricule' => 'H-89012', 'capacite' => 55, 'status' => 'actif'],
            ['matricule' => 'I-90123', 'capacite' => 50, 'status' => 'inactif'],
            ['matricule' => 'J-01234', 'capacite' => 60, 'status' => 'actif'],
            ['matricule' => 'K-11111', 'capacite' => 50, 'status' => 'actif'],
            ['matricule' => 'L-22222', 'capacite' => 45, 'status' => 'actif'],
            ['matricule' => 'M-33333', 'capacite' => 50, 'status' => 'en maintenance'],
            ['matricule' => 'N-44444', 'capacite' => 55, 'status' => 'actif'],
            ['matricule' => 'O-55555', 'capacite' => 50, 'status' => 'actif'],
        ];

        foreach ($bus as $b) {
            Bus::create($b);
        }
    }
}
