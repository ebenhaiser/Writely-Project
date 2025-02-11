<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileViewController extends Controller
{
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
        $profile = User::where('username', $username)->firstOrFail();

        $comments = $profile->comments;

        return view('Profile.profile', compact('profile', 'comments'));
    }

    public function followingView($username)
    {
        $profile = User::where('username', $username)->firstOrFail();
        $users = $profile->following()->get();
        return view('Profile.follow', compact('profile', 'users'));
    }

    public function followersView($username)
    {
        $profile = User::where('username', $username)->firstOrFail();
        $users = $profile->followers()->get();
        return view('Profile.follow', compact('profile', 'users'));
    }

    public function postsView($username)
    {
        $profile = User::where('username', $username)->firstOrFail();
        $posts = $profile->posts;
        return view('Profile.posts', compact('profile', 'posts'));
    }
}
