<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    // protected $fillable = [
    //     'username',
    //     'email',
    //     'password',
    // ];

    // protected $fillable = [
    //     'username',
    //     'email',
    //     'password',
    //     'full_name',
    //     'bio',
    //     'profile_image',
    // ];
    protected $guarded = [];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // protected $with = ['posts', 'following', 'followers'];
    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at', 'desc');
    }


    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'following_id')
            ->withTimestamps() // Pastikan mengambil created_at
            ->orderBy('follows.created_at', 'desc'); // Urutkan berdasarkan waktu follow terbaru
    }

    // Relasi: User yang menjadi pengikut (Followers)
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'follower_id')
            ->withTimestamps()
            ->orderBy('follows.created_at', 'desc');
    }

    // Cek apakah user sudah di-follow oleh pengguna yang login
    public function isFollowedByUser()
    {
        if (!Auth::check()) {
            return false;
        }

        return $this->followers()->where('follower_id', Auth::user()->id)->exists();
    }

    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'from_user_id');
    }

    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'to_user_id');
    }

    public function messages()
    {
        return $this->sentMessages()->union($this->receivedMessages());
    }
}
