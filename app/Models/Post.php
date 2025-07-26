<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;

    // Un post pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(UserASDEN::class);
    }

    // Relación: Un post tiene muchos comentarios
    public function comments()
    {
        return $this->hasMany(Comment::class); // CORREGIDO
    }


    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'title',
        'resumen',
        'content',
        'portada',
        'cards',
        'imagen_1',
        'imagen_2',
        'tags',
        'status',
        'published_at',
        'user_id',
    ];

    protected $casts = [
        'id' => 'string',
        'title' => 'string',
        'content' => 'string',
        'portada' => 'string',
        'cards' => 'string',
        'imagen_1' => 'string',
        'imagen_2' => 'string',
        'status' => 'string',
        'published_at' => 'datetime',
        'user_id' => 'string',
    ];


    public static function searchByTags(string $tag)
    {
        return self::where('tags', 'LIKE', '%' . $tag . '%')->get();
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->id)) {
                $post->id = 'POST-' . strtoupper(Str::random(3));
            }
        });
    }

    public function getTagsArrayAttribute()
    {
        return array_map('trim', explode(',', $this->tags));
    }
}
