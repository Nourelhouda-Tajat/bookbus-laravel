<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Segment; 

class SegmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $segments = [
            ['tarif' => 80, 'duree_estimee'  => '08:00:00', 'distance_km' => 240],
            ['tarif' => 120, 'duree_estimee' => '09:00:00', 'distance_km' => 350],
            ['tarif' => 60, 'duree_estimee' => '10:00:00', 'distance_km' => 150],
            ['tarif' => 100, 'duree_estimee' => '11:00:00', 'distance_km' => 280],
            ['tarif' => 40, 'duree_estimee' => '12:00:00', 'distance_km' => 90],
            ['tarif' => 50, 'duree_estimee' => '13:00:00', 'distance_km' => 120],
            ['tarif' => 90, 'duree_estimee' => '14:00:00', 'distance_km' => 200],
            ['tarif' => 110, 'duree_estimee' => '15:00:00', 'distance_km' => 320],
            ['tarif' => 30, 'duree_estimee' => '16:00:00', 'distance_km' => 60],
            ['tarif' => 70, 'duree_estimee' => '17:00:00', 'distance_km' => 180],
            ['tarif' => 85, 'duree_estimee' => '18:00:00', 'distance_km' => 220],
            ['tarif' => 95, 'duree_estimee' => '19:00:00', 'distance_km' => 260],
            ['tarif' => 150, 'duree_estimee' => '20:00:00', 'distance_km' => 450],
            ['tarif' => 45, 'duree_estimee' => '21:00:00', 'distance_km' => 100],
            ['tarif' => 75, 'duree_estimee' => '22:00:00', 'distance_km' => 190],
        ];

        foreach ($segments as $segment) {
            Segment::create($segment);
        }
    }
}
