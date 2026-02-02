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
            EtapeSeeder::class,
            RouteSeeder::class,
            GareSeeder::class,         
            SegmentSeeder::class,
            ProgrammeSeeder::class,    
            ReservationSeeder::class,  
        ]);


        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->command->info(' Base de données peuplée avec succès !');
        $this->command->info(' Données créées :');
        $this->command->info('   - Villes : 15');
        $this->command->info('   - Gares : 10');
        $this->command->info('   - Bus : 15');
        $this->command->info('   - Utilisateurs : 10 (1 admin, 2 drivers, 7 clients)');
        $this->command->info('   - Routes : 15');
        $this->command->info('   - Etapes : 15');
        $this->command->info('   - Segments : 15');
        $this->command->info('   - Programmes : 15');
        $this->command->info('   - Réservations : 15');
    }
}
