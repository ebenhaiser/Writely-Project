<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class CkeditorController extends Controller
{
    public function index(): View
    {
        return view('dummy1');
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
        $post = new Post();
        $post->content = $request->content;
        $post->save();

        return redirect()->back();
    }

    public function show()
    {
        $posts = Post::all();
        return view('dummyoutput', compact('posts'));
    }
}
