<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class UserASDEN extends Authenticatable implements MustVerifyEmail



{

    //
    //use HasUuids;
    //use HasFactory -> crear valores automaticos;
    use Notifiable;
    use HasApiTokens;


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    //Atributos del modelo para asignar en masa
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'id',
        'name',
        'lastname',
        'username',
        'email',
        'password',
        'avatar',  //opcional
        'bio', //opcional
        'site', //opcional
        'follower_ids', //opcional
        'following_ids', //opcional
        'tag_ids', //opcional
        'role', //opcional

        'published_at',
        'updated_at',

        'invitation_token',
        'invitation_expires_at',
        'password_reset_expires_at'
    ];

    protected $casts = [
        'site' => 'array',
        'follower_ids' => 'array',
        'following_ids' => 'array',
        'tag_ids' => 'array',

        'published_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (empty($user->id)) {
                $user->id = 'USR-' . strtoupper(Str::random(3));
            }
        });
    }
}
