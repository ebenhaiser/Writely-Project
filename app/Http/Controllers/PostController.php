<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost()
    {
        $categories = Category::get();
        return view('post.create', compact('categories'));
    }
}
