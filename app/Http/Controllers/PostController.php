<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function view()
    {
        $categories = Category::get();
        return view('post.new', compact('categories'));
    }

    public function upload(Request $request): JsonResponse
    {
        $userId = Auth::user()->id;
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();

            $fileName = hash('sha256', $userId . $fileName . time()) . '.' . $extension;

            $request->file('upload')->move(public_path('img/postImage'), $fileName);

            $url = asset('img/postImage/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }

    public function create(Request $request)
    {
        $userId = Auth::user()->id;
        $userName = Auth::user()->username;

        // Membuat slug dengan mengubah spasi menjadi underscore dan huruf kecil
        $slug = strtolower(str_replace(' ', '-', $request->title));
        $slug = $slug . '-by-' . $userName;

        $originalSlug = $slug;
        $counter = 1;

        while (Post::where('slug', $slug)->exists()) {
            $counter++;
            $slug = $originalSlug . '-' . $counter;
        }

        $post = new Post();
        $post->user_id = $userId;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        // Menyimpan slug pada post
        $post->slug = $slug;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('post.show', $slug)->with('newPost', 'New post created successfully');
        // return redirect()->back();
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('Post.show', compact('post'));
    }
}
