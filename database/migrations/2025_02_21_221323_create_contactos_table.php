<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * php artisan make:migration update2_contactos_table --table=contactos
     * : Nombre , correo , teléfono 
     */
    public function up(): void
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->string('id')->primary(); 
            $table->string('nombre'); 
            $table->string('email')->unique();
            $table->integer('telefono');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactos');
    }
};
