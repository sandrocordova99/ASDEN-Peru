<?php

namespace App\Models;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;

class Trabajos extends Model
{
    //
    public function solicitudes() {
        return $this->hasMany(Solicitudes::class, 'trabajo_id');
    }

    protected $primaryKey = 'id';
    public $incrementing = false; 
    protected $keyType = 'string'; 

    protected $fillable = [
        'id',
        'titulo',
        'color',
        'modalidad',
        'tipo_trabajo',
        'descripcion',
        'cantidad_puestos',
        'published_at',
        'resumen',
        'funciones',
        'beneficios',
        'requisitos',
        'imagen'
    ];
    protected $casts = [
        'id' => 'string',
        'titulo' => 'string',
        'color' => 'string',
        'modalidad' => 'string',
        'tipo_trabajo' => 'string',
        'descripcion' => 'string',
        'published_at' => 'datetime',
        'cantidad_puestos' => 'integer',
        'resumen' => 'string',
        'funciones' => 'string',
        'beneficios' => 'string',
        'requisitos' => 'string',
        'imagen' => 'string'
        
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (empty($user->id)) { 
                $user->id = 'TRB-' . strtoupper(Str::random(3)); 
            }
        });
    }

}
