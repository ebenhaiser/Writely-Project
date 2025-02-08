<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    protected $table = 'posts';
    protected $with = ['user', 'category', 'likes'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedByUser()
    {
        if (!Auth::check()) {
            return false;
        }
        $userId = Auth::user()->id;
        if (!$userId) {
            return false;
        }

        return Like::where('user_id', $userId)->where('post_id', $this->id)->exists();
    }
}
