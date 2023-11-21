<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('Usuarios')->insert([
            'nombre' => "Jareth",
            'apell1' => "Moraga",
            'apell2' => "Segura",
            'cedula'=>"504390312",
            'numero'=>"85763191",
            'ocupacion'=> "Estudiante",
            'rol'=>"Admin",
            'correo'=> "moragajareth6@gmail.com",
            'contraseña'=>"Jareth2707",
        ]);
    }
}
