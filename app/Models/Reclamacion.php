<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamacion extends Model
{
    use HasFactory;

    // Elimina esta línea o coméntala
    // public $timestamps = false;

    protected $table = 'reclamaciones'; // Nombre exacto de la tabla
    protected $fillable = [
        'nombre',
        'apellido',
        'documento',
        'numeroDocumento',
        'email',
        'celular',
        'direccion',
        'distrito',
        'ciudad',
        'tipoReclamo',
        'estado',
        'fechaIncidente',
        'reclamoPerson',
    ];
}
