<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
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
        $userId = $profile->id;

        $posts = Post::whereHas('comments', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
            ->with(['comments' => function ($query) use ($userId) {
                $query->where('user_id', $userId)->latest(); // Urutkan komentar terbaru
            }])
            ->orderByDesc(
                Comment::select('created_at')
                    ->whereColumn('comments.post_id', 'posts.id')
                    ->where('user_id', $userId)
                    ->latest()
                    ->take(1) // Ambil komentar terakhir dari user ini di tiap post
            )
            ->get();

        return view('Profile.profile', compact('profile', 'posts'));
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
