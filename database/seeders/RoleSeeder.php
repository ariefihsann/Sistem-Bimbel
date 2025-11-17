<?php

namespace Database\Seeders; // <-- TAMBAHKAN INI

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'Admin'], // ID 1
            ['name' => 'Siswa'], // ID 2
        ]);
    }
}
