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
        Schema::create('nuevos_puntos', function (Blueprint $table) {
            $table->id();
            $table->string('nombrePunto');
            $table->string('descripcionPunto');
            $table->string('ubicacionPunto');
            $table->string('galeria');
            $table->string('statusPunto')->default('activo');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nuevos_puntos');
    }
};
