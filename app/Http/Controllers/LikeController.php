<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggleLike(Request $request)
    {
        $post = Post::findOrFail($request->post_id);
        $userId = Auth::user()->id;

        if (!$userId) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $like = Like::where('user_id', $userId)->where('post_id', $post->id)->first();

        if ($like) {
            $like->delete();
            $status = 'unliked';
        } else {
            Like::create([
                'user_id' => $userId,
                'post_id' => $post->id,
            ]);
            $status = 'liked';
        }

        // Reload jumlah like setelah update
        $likeCount = Like::where('post_id', $post->id)->count();

        return response()->json([
            'status' => $status,
            'likes' => $likeCount
        ]);
    }
}
