<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function home()
    {
        $posts = Post::latest()->get();
        return view('home', compact('posts'));
    }

    public function search()
    {
        $users = User::get();
        $posts = Post::latest()->get();
        return view('search', compact('users', 'posts'));
    }
}
