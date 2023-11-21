<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('roles')->insert([
            'nombre' => "SuperAdmin",
        ]);
        DB::table('roles')->insert([
            'nombre' => "Admin",
        ]);
        DB::table('roles')->insert([
            'nombre' => "Voluntario",
        ]);
    }
}
