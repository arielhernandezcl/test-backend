<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apell1');
            $table->string('apell2');
            $table->string('cedula');
            $table->integer('numero');
            $table->string('ocupacion');
            $table->string('rol')->default('voluntario'); // Establece el valor predeterminado como 'voluntario'
            $table->string('email');
            $table->string('password');
            $table->string('status')->default('activo');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('UsuariosReg');
    }
};