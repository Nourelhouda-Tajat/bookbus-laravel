<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Segment;

class SegmentSeeder extends Seeder
{
    public function run(): void
    {
        // Ligne 1: Casa-Marrakech
        Segment::create([
            'depart_id' => 1,
            'arrive_id' => 2,    
            'route_id' => 1,
            'tarif' => 50.00,
            'duree_estimee' => '01:00:00',  
            'distance_km' => 70,
        ]);

        Segment::create([
            'depart_id' => 2,
            'arrive_id' => 3,
            'route_id' => 1,
            'tarif' => 70.00,
            'duree_estimee' => '02:30:00',
            'distance_km' => 170,
        ]);

        Segment::create([
            'depart_id' => 1,
            'arrive_id' => 3,
            'route_id' => 1,
            'tarif' => 120.00,
            'duree_estimee' => '03:30:00',
            'distance_km' => 240,
        ]);

        // Ligne 2: Rabat-Fès
        Segment::create([
            'depart_id' => 4,
            'arrive_id' => 5,
            'route_id' => 2,
            'tarif' => 60.00,
            'duree_estimee' => '02:30:00',
            'distance_km' => 140,
        ]);

        Segment::create([
            'depart_id' => 5,
            'arrive_id' => 6,
            'route_id' => 2,
            'tarif' => 40.00,
            'duree_estimee' => '01:30:00',
            'distance_km' => 60,
        ]);

        Segment::create([
            'depart_id' => 4,
            'arrive_id' => 6,
            'route_id' => 2,
            'tarif' => 95.00,
            'duree_estimee' => '04:00:00',
            'distance_km' => 200,
        ]);

    }
}