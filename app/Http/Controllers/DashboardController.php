<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function home()
    {
        if (!Auth::check()) {
            $posts = Post::withCount('likes')
                ->orderByDesc('likes_count')
                ->get();
            return view('home', compact('posts'));
        }
        $user = Auth::user();
        $posts = Post::whereHas('user', function ($query) use ($user) {
            $query->whereHas('followers', function ($subQuery) use ($user) {
                $subQuery->where('follower_id', $user->id);
            });
        })->latest()->get();

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

    public function explore(Request $request)
    {
        $query = Post::latest();

        if ($request->has('category')) {
            $category = Category::where('slug', $request->input('category'))->first();

            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        $posts = $query->get();
        $categories = Category::all();

        return view('explore', compact('posts', 'categories'));
    }
}
