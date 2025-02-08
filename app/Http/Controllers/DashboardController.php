<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        $posts = Post::latest()->get();
        return view('home', compact('posts'));
    }
}
