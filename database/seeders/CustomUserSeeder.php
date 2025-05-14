<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class CustomUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $utilisateurs = [
            ['name' => 'Amine',  'email' => 'amine@example.com',  'phone' => '0600000001'],
            ['name' => 'Yasmine','email' => 'yasmine@example.com','phone' => '0600000002'],
            ['name' => 'Karim',  'email' => 'karim@example.com',  'phone' => '0600000003'],
            ['name' => 'Leila',  'email' => 'leila@example.com',  'phone' => '0600000004'],
            ['name' => 'Sami',   'email' => 'sami@example.com',   'phone' => '0600000005'],
            ['name' => 'Nour',   'email' => 'nour@example.com',   'phone' => '0600000006'],
            ['name' => 'Rania',  'email' => 'rania@example.com',  'phone' => '0600000007'],
            ['name' => 'Adel',   'email' => 'adel@example.com',   'phone' => '0600000008'],
            ['name' => 'Sara',   'email' => 'sara@example.com',   'phone' => '0600000009'],
            ['name' => 'Anis',   'email' => 'anis@example.com',   'phone' => '0600000010'],
            ['name' => 'Maya',   'email' => 'maya@example.com',   'phone' => '0600000011'],
            ['name' => 'Tarek',  'email' => 'tarek@example.com',  'phone' => '0600000012'],
            ['name' => 'Ines',   'email' => 'ines@example.com',   'phone' => '0600000013'],
            ['name' => 'Walid',  'email' => 'walid@example.com',  'phone' => '0600000014'],
            ['name' => 'Lina',   'email' => 'lina@example.com',   'phone' => '0600000015'],
            ['name' => 'Fares',  'email' => 'fares@example.com',  'phone' => '0600000016'],
            ['name' => 'Aya',    'email' => 'aya@example.com',    'phone' => '0600000017'],
            ['name' => 'Nadir',  'email' => 'nadir@example.com',  'phone' => '0600000018'],
            ['name' => 'Salma',  'email' => 'salma@example.com',  'phone' => '0600000019'],
            ['name' => 'Omar',   'email' => 'omar@example.com',   'phone' => '0600000020'],
        ];
    
        foreach ($utilisateurs as $utilisateur) {
            User::create([
                'name' => $utilisateur['name'],
                'email' => $utilisateur['email'],
                'phone' => $utilisateur['phone'],
                'password' => Hash::make('password'), // mot de passe commun
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
