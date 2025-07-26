<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    // Asegúrate que estas propiedades estén correctamente definidas
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id',
        'content',
        'author_name',
        'author_email',
        'post_id',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(UserASDEN::class, 'user_id', 'id');
    }
}