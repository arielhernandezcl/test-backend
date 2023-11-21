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
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->string('nomSoli');
            $table->string('apellSoli1');
            $table->string('apellSoli2');
            $table->integer('numSoli');
            $table->string('email');
            $table->string('tituloVC');
            $table->string('descripVC');
            $table->string('alimentacion');
            $table->string('lugarVC');
            $table->string('tipoSoli');
            $table->datetime('fechaSoli');
            $table->string('statusSoli')->default('nueva');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};