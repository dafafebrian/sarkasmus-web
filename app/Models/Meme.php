<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meme extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'image_path', 'caption', 'anonymous_name', 'likes_count', 'comments_count', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likedBy($userId)
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }
}
