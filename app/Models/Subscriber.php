<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subscriber extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'email',
        'is_active',
        'unsubscribe_token',
    ];

    protected $casts = [
        'id' => 'string',
        'email' => 'string',
        'is_active' => 'boolean',
        'unsubscribe_token' => 'string',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($subscriber) {
            if (empty($subscriber->id)) {
                $subscriber->id = 'SUB-' . strtoupper(Str::random(3));
            }
        });
    }
}
