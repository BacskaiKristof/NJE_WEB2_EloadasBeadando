<?php

namespace Database\Seeders;

use App\Models\Uzenet;
use Illuminate\Database\Seeder;

class UzenetSeeder extends Seeder
{
    /** Néhány minta üzenet, hogy az Üzenetek menü ne legyen üres. */
    public function run(): void
    {
        Uzenet::create([
            'nev' => 'Minta Péter',
            'email' => 'minta.peter@example.com',
            'targy' => 'Asztalfoglalás',
            'uzenet' => 'Szombat estére szeretnék asztalt foglalni 4 főre.',
            'created_at' => now()->subDays(2),
            'updated_at' => now()->subDays(2),
        ]);
        Uzenet::create([
            'nev' => 'Teszt Anna',
            'email' => 'teszt.anna@example.com',
            'targy' => 'Vegetáriánus kínálat',
            'uzenet' => 'Lesz bővítés a vegetáriánus pizzák körében?',
            'created_at' => now()->subDay(),
            'updated_at' => now()->subDay(),
        ]);
    }
}
