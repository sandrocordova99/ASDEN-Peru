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
        Schema::create('projects', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->integer('etapa');
            $table->string('titulo');
            $table->string('resumen');
            $table->text('descripcion');
            $table->enum('etiqueta', ['Infraestructura', 'Tecnología', 'Consultoría', 'Vivienda', 'Construcción', 'Otros']);
            $table->string('portada')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
