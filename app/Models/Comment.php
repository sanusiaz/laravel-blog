<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'posts_id',
        'user_id',
        'email',
        'message',
        'likes',
        'reply_count',
        'replied_date'
    ];

    public function post()
    {
        return $this->belongsTo(\App\Models\Post::class);
    }
}
