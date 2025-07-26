<?php

namespace App\Models;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;

class Solicitudes extends Model
{
    //
    public function trabajo() {
        return $this->belongsTo(Trabajos::class, 'trabajo_id');
    }
    
    protected $primaryKey = 'id';
    public $incrementing = false; 
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'trabajo_id',
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'dni',
        'cv',
        'estado',

        'salario',
        'provincia',
        'email',

        'published_at',
    ];
    protected $casts = [
        'id' => 'string',
        'trabajo_id' => 'string',
        'nombre' => 'string',
        'apellido' => 'string',
        'direccion' => 'string',
        'telefono' => 'string',
        'dni' => 'string',
        'cv' => 'string',
        'estado' => 'string',

        'salario' => 'Double',
        'provincia' => 'string',
        'email' => 'string',
        'published_at' => 'datetime'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (empty($user->id)) { 
                $user->id = 'SLT-' . strtoupper(Str::random(3)); 
            }
        });
    }
}
