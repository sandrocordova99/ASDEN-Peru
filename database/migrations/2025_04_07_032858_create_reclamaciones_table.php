<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclamacionesTable extends Migration
{
    public function up()
    {
        Schema::create('reclamaciones', function (Blueprint $table) {
            $table->id();  // Crea una columna "id" como llave primaria
            $table->string('nombre');
            $table->string('apellido');
            $table->string('documento');
            $table->string('numeroDocumento');
            $table->string('email');
            $table->string('celular');
            $table->string('direccion');
            $table->string('distrito');
            $table->string('ciudad');
            $table->string('tipoReclamo');
            $table->date('fechaIncidente');
            $table->string('reclamoPerson');
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('reclamaciones');
    }
}
