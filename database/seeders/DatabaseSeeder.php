<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * php artisan migrate:fresh --seed
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);      // felhasználók (User1, admin)
        $this->call(PizzeriaSeeder::class);  // kategoria, pizza, rendeles táblák
    }
}
