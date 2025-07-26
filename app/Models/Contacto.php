<?php

namespace App\Models;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    //

    protected $primaryKey = 'id';
    public $incrementing = false; 
    protected $keyType = 'string'; 

    
    protected $fillable = [
        'id',
        'nombre',
        'email',
        'telefono'
    ];

    protected $casts = [
        'id' => 'string',
        'nombre' => 'string',
        'email' => 'string',
        'telefono' => 'integer'
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (empty($user->id)) { 
                $user->id = 'CTC-' . strtoupper(Str::random(3)); 
            }
        });
    }
}
