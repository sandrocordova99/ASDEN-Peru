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
            $table->string('id')->primary();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('dni', 15)->unique();
            $table->string('cv'); 
            $table->enum('estado', ['Pendiente', 'Aceptado', 'Rechazado'])->default('Pendiente');
            $table->timestamps(); 
            $table->string('trabajo_id'); 
            $table->foreign('trabajo_id')->references('id')->on('trabajos')->onDelete('cascade');

            $table->double('salario');
            $table->string('provincia');
            $table->string('email');

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
