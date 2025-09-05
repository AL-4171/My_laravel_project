<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    // ✅ This is the method you asked about
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('index', compact('posts'));
    }

    public function myPosts()
    {
        $posts = Post::where('UserID', Auth::id())->latest()->get();
        return view('posts.myposts', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Title' => 'required|string|max:255',
            'Body' => 'required|string',
        ]);

        Post::create([
            'Title' => $request->Title,
            'Body' => $request->Body,
            'UserID' => Auth::id(),
        ]);

        return redirect()->route('home')->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        if ($post->UserID !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if ($post->UserID !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'Title' => 'required|string|max:255',
            'Body' => 'required|string',
        ]);

        $post->update($request->only('Title', 'Body'));

        return redirect()->route('home')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        if ($post->UserID !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $post->delete();
        return redirect()->route('home')->with('success', 'Post deleted successfully.');
    }
}
