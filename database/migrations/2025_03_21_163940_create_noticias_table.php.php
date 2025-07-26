<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('titulo');
            $table->text('descripcion');

            $table->string('portada')->nullable();
            $table->string('imagen_1')->nullable();
            $table->string('imagen_2')->nullable();

            $table->string('resumen');
            
            $table->longText('tags');
            $table->string('user_id');
            $table->string('username');
            $table->foreign('user_id')->references('id')->on('user_a_s_d_e_n_s')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticias');
    }
};
