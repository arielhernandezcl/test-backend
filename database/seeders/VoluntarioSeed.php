<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class VoluntarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('voluntarios')->insert([
            'nombre' => "Jareth",
            'apellido1' => "Moraga",
            'apellido2' => "Segura",
            'carrera'=> "INGENIERIA EN SISTEMAS",
            'numero'=> "85763191",
            'status'=> "1"
        ]);
    }
}
