<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    // Id, Titulo, descripción, imagen,resumen,  fecha      

    //php artisan make:controller NoticiasController -resource

    public function user()
    {
        return $this->belongsTo(UserASDEN::class);
    }

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',

        'titulo',
        'descripcion',
        'portada',
        'resumen',

        'imagen_1',
        'imagen_2',
        'imagen_3',


        'tags',
        'user_id',
        'username',
        'published_at'
    ];
    protected $casts = [
        'id' => 'string',
        'titulo' => 'string',
        'descripcion' => 'string',

        'portada' => 'string',
        'imagen_1' => 'string',
        'imagen_2' => 'string',
        'imagen_3' => 'string',

        'resumen' => 'string',
        'tags' => 'string',
        'user_id' => 'string',
        'username' => 'string',
        'published_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (empty($user->id)) {
                $user->id = 'NTC-' . strtoupper(Str::random(3));
            }
        });
    }
}
