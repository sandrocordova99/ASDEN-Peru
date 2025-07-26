<?php

namespace App\Models;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false; 
    protected $keyType = 'string'; 

    protected $fillable = [
        'id',
        'etapa',
        'titulo',
        'resumen',
        'descripcion',
        'etiqueta',
        'portada',
    ];

    protected $casts = [
        'id'=> 'string',
        'etapa' => 'integer',
        'titulo' => 'string',
        'resumen' => 'string',
        'descripcion' => 'string',
        'etiqueta' => 'string',
        'portada' => 'string',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (empty($user->id)) { 
                $user->id = 'PRJ-' . strtoupper(Str::random(3)); 
            }
        });
    }
}
