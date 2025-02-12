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
    public function new()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $categories = Category::get();
        return view('post.new', compact('categories'));
    }

    // for ckeditor photo upload
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
    // end for ckeditor photo upload

    public function create(Request $request)
    {
        $userId = Auth::user()->id;
        $userName = Auth::user()->username;
        $post = new Post();

        // Membuat slug dengan mengubah spasi menjadi underscore dan huruf kecil
        // $slug = strtolower(str_replace(' ', '-', $request->title));
        $slug = Str::slug($request->title);
        $slug = $slug . '-by-' . $userName;

        $originalSlug = $slug;
        $counter = 1;

        while (Post::where('slug', $slug)->exists()) {
            $counter++;
            $slug = $originalSlug . '-' . $counter;
        }

        // upload thumbnail
        if ($request->hasFile('thumbnail')) {
            $request->validate([
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg,webp,jfif|max:2048',
            ]);
            $file = $request->file('thumbnail');
            $ext = $file->getClientOriginalExtension();
            $newImageName = hash('sha256', $userId . $userName . time()) . '.' . $ext;
            $path = $file->move(public_path('img/postThumbnail'), $newImageName);
            $post->thumbnail = $newImageName;
        }
        // end upload thumbnail


        $post->user_id = $userId;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->slug = $slug;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('post.show', $slug)->with('newPost', 'New post created successfully');
    }

    public function show($slug)
    {
        if ($slug == 'new') {
            return $this->new();
        }
        $post = Post::where('slug', $slug)->first();
        if (!$post) {
            return redirect()->route('home');
        }
        return view('Post.show', compact('post'));
    }

    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if (Auth::user()->id != $post->user_id) {
            return redirect()->back();
        }

        $categories = Category::get();
        return view('post.new', compact('post', 'categories'));
    }

    public function update(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->first();
        $userId = Auth::user()->id;
        $userName = Auth::user()->username;
        if (Auth::user()->id != $post->user_id) {
            return redirect()->back();
        }

        // upload thumbnail
        if ($request->hasFile('thumbnail')) {
            $request->validate([
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg,webp,jfif|max:2048',
            ]);
            $file = $request->file('thumbnail');
            $ext = $file->getClientOriginalExtension();

            // menghapus foto lama
            $oldImage = public_path('img/postThumbnail/' . $post->thumbnail);
            if (file_exists($oldImage) && is_file($oldImage)) {
                unlink($oldImage);
            }

            $newImageName = hash('sha256', $userId . $userName . time()) . '.' . $ext;
            $path = $file->move(public_path('img/postThumbnail'), $newImageName);
            $post->thumbnail = $newImageName;
        }
        // end upload thumbnail

        // Membuat slug dengan mengubah spasi menjadi underscore dan huruf kecil
        // $slug = strtolower(str_replace(' ', '-', $request->title));
        $slug = Str::slug($request->title);
        $slug = $slug . '-by-' . $userName;

        $post->user_id = $userId;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->slug = $slug;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('post.show', $slug)->with('update', 'Your post updates successfully');
    }

    public function delete($slug)
    {
        $post = Post::where('slug', $slug)->first();
        if (Auth::user()->id != $post->user_id) {
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('profile', Auth::user()->username)->with('deletePost', 'Your post deleted successfully');
    }
}
