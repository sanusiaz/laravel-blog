<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'status',
        'excerpt',
        'body',
        'image_path',
        'min_to_read',
        'is_published',
        'user_id'
    ];

    // protected $timestamps = false;
    // protected $table = "posts";
    // protected $attributes = [
        // "column name" => "default value"
    //]

    // protected $primaryKey = "<primary key column name";

    public function user()
    {
        $this->belongsTo(\App\Models\User::class);
    }

    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class);
    }
}
