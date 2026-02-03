<?php

namespace Database\Seeders;

// use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
         $this->call([
            VilleSeeder::class,
            UtilisateurSeeder::class,
            BusSeeder::class,
            RouteSeeder::class,        
            GareSeeder::class,
            EtapeSeeder::class,        
            SegmentSeeder::class,      
            ProgrammeSeeder::class,    
            ReservationSeeder::class,
        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->command->info('Base de données remplie avec succès !');
    }
}
