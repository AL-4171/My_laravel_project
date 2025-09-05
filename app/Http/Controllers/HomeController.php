<?php

namespace App\Http\Controllers;

use App\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest('CreatedAt')->paginate(9);
        return view('home', compact('posts'));
    }
}
