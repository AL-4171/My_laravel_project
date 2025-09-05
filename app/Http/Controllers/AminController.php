<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;

class AdminController extends Controller
{
    public function index()
    {
        $postsCount = Post::count();
        return view('admin.dashboard', compact('postsCount'));
    }
}