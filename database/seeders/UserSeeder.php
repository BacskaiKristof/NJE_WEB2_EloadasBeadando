<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * role: 1 = admin, 2 = regisztrált látogató
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'User1',
            'email' => 'aaa@aaa.hu',
            'password' => bcrypt('aaaaaaaa'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'bbb@bbb',
            'password' => bcrypt('bbbbbbbb'),
            'role' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
