<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate(['body' => 'required|string|max:1000']);

        Comment::create([
            'Body' => $request->body,
            'UserID' => Auth::id(),
            'PostID' => $post->PostID,
            'CreatedAt' => now()
        ]);

        return redirect()->back()->with('success','Comment added.');
    }

    public function destroy(Comment $comment)
    {
        if (Auth::user()->Role !== 'admin' && Auth::id() !== $comment->UserID) {
            abort(403);
        }
        $comment->delete();
        return redirect()->back()->with('success','Comment deleted.');
    }
}