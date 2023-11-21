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
        Schema::create('reservaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombreVis');
            $table->string('apell1Vis');
            $table->string('apell2Vis');
            $table->string('cedulaVis');
            $table->date('fechaReserva');
            $table->string('cupo');
            $table->integer('telefonoVis');
            $table->string('email');
            $table->string('status')->default('nueva');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservaciones');
    }
};
