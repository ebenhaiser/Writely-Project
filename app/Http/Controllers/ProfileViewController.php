<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileViewController extends Controller
{
    public function profile($username)
    {
        $profile = User::where('username', $username)->firstOrFail();
        // Mengembalikan data, bukan view
        return compact('profile');
    }

    public function profileView($username)
    {
        // Ambil data dari profile()
        $profile = User::where('username', $username)->firstOrFail();

        $posts = $profile->posts;

        // Kirim data ke tampilan index
        return view('Profile.profile', compact('profile', 'posts'));
    }

    public function likesView($username)
    {
        $profile = User::where('username', $username)->firstOrFail();

        $posts = Post::whereHas('likes', function ($query) use ($profile) {
            $query->where('user_id', $profile->id);
        })->latest()->get();

        return view('Profile.profile', compact('profile', 'posts'));
    }

    public function commentsView($username)
    {
        // Ambil data dari profile()
        $data = $this->profile($username);

        $profile = $data['profile'];
        $comments = $profile->comments;

        return view('Profile.profile', compact('profile', 'comments'));
    }
}
