<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function home()
    {
        $posts = Post::latest()->get();
        return view('home', compact('posts'));
    }

    public function search(Request $request)
    {
        $query = $request->input('search');

        $posts = Post::withCount('likes')
            ->where('title', 'LIKE', "%{$query}%")
            ->orWhere('content', 'LIKE', "%{$query}%")
            ->orderByDesc('likes_count')
            ->get();

        $users = User::withCount('followers')
            ->where('name', 'LIKE', "%{$query}%")
            ->orWhere('username', 'LIKE', "%{$query}%")
            ->orderByDesc('followers_count')
            ->get();




        return view('search', compact('posts', 'query', 'users'));
    }
}
