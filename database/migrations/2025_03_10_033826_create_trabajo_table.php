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
        Schema::create('trabajos', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('titulo');
            $table->string('color');
            $table->enum('modalidad', ['Jornada Parcial', 'Jornada Completa', 'Prácticas', 'Voluntariado']); 
            $table->enum('tipo_trabajo', ['Presencial', 'Remoto', 'Híbrido']);
            $table->text('descripcion');
            $table->integer('cantidad_puestos');
            $table->timestamps(); 
            $table->string('resumen');
            $table->string('beneficios');
            $table->string('funciones');
            $table->string('requisitos');
            $table->string('imagen')->nullable(); // Imagen opcional
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajos');
    }
};
