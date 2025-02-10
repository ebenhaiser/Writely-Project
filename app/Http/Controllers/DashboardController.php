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

    public function search(Request $request)
    {
        $query = $request->input('search');

        $posts = Post::where('title', 'LIKE', "%{$query}%")
            ->orWhere('content', 'LIKE', "%{$query}%")
            ->get();

        $users = User::where('name', 'LIKE', "%{$query}%")
            ->orWhere('username', 'LIKE', "%{$query}%")
            ->get();


        return view('search', compact('posts', 'query', 'users'));
    }
}
