<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id'
        ]);

        $comment = Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $request->post_id,
            'parent_id' => $request->parent_id,
            'content' => $request->content
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Comment added successfully!',
            'comment' => $comment->load('user')
        ]);
    }

    public function index($postId)
    {
        $comments = Comment::where('post_id', $postId)
            ->whereNull('parent_id')
            ->with('replies.user', 'user')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($comments);
    }

    public function destroy(Comment $comment)
    {
        $user = Auth::user();

        // Hanya bisa hapus komentarnya sendiri atau semua komentar di post miliknya
        if ($user->id === $comment->user_id || $user->id === $comment->post->user_id) {
            $comment->delete();
            return response()->json(['message' => 'Comment deleted successfully']);
        }

        return response()->json(['message' => 'Unauthorized'], 403);
    }
}
