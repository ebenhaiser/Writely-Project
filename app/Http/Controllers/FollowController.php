<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function toggleFollow(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['status' => 'unauthenticated'], 401);
        }

        $followingId = $request->user_id;
        $followerId = Auth::user()->id;

        // Cek apakah user sudah mengikuti atau belum
        $follow = Follow::where('following_id', $followingId)->where('follower_id', $followerId)->first();

        if ($follow) {
            $follow->delete();
            $status = 'unfollowed';
        } else {
            Follow::create([
                'following_id' => $followingId,
                'follower_id' => $followerId,
            ]);
            $status = 'followed';
        }

        // Hitung jumlah followers terbaru
        $followerCount = Follow::where('following_id', $followingId)->count();

        return response()->json([
            'status' => $status,
            'followers' => $followerCount
        ]);
    }
}
