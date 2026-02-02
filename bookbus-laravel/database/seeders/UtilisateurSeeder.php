<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Utilisateur;  
use Illuminate\Support\Facades\Hash;

class UtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $utilisateurs = [
            [
                'nom' => 'Admin User',
                'email' => 'admin@bookbus.ma',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'phone' => '0612345678'
            ],
            [
                'nom' => 'Mohamed Alami',
                'email' => 'mohamed.alami@email.com',
                'password' => Hash::make('password123'),
                'role' => 'client',
                'phone' => '0623456789'
            ],
            [
                'nom' => 'Fatima Zahra',
                'email' => 'fatima.zahra@email.com',
                'password' => Hash::make('password123'),
                'role' => 'client',
                'phone' => '0634567890'
            ],
            [
                'nom' => 'Ahmed Bennis',
                'email' => 'ahmed.bennis@email.com',
                'password' => Hash::make('password123'),
                'role' => 'client',
                'phone' => '0645678901'
            ],
            [
                'nom' => 'Khadija El Amrani',
                'email' => 'khadija.elamrani@email.com',
                'password' => Hash::make('password123'),
                'role' => 'client',
                'phone' => '0656789012'
            ],
            [
                'nom' => 'Youssef Tazi',
                'email' => 'youssef.tazi@email.com',
                'password' => Hash::make('password123'),
                'role' => 'driver',
                'phone' => '0667890123'
            ],
            [
                'nom' => 'Sanaa Idrissi',
                'email' => 'sanaa.idrissi@email.com',
                'password' => Hash::make('password123'),
                'role' => 'client',
                'phone' => '0678901234'
            ],
            [
                'nom' => 'Omar Benjelloun',
                'email' => 'omar.benjelloun@email.com',
                'password' => Hash::make('password123'),
                'role' => 'client',
                'phone' => '0689012345'
            ],
            [
                'nom' => 'Amina Chakir',
                'email' => 'amina.chakir@email.com',
                'password' => Hash::make('password123'),
                'role' => 'client',
                'phone' => '0690123456'
            ],
            [
                'nom' => 'Rachid Lahlou',
                'email' => 'rachid.lahlou@email.com',
                'password' => Hash::make('password123'),
                'role' => 'driver',
                'phone' => '0601234567'
            ],
        ];

        foreach ($utilisateurs as $utilisateur) {
            Utilisateur::create($utilisateur);
        }
    }
}
