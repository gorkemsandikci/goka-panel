<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('panel.pages.post.index', compact('posts'));
    }

    public function create()
    {
        $posts = Post::get();
        return view('panel.pages.post.edit', compact('posts'));
    }
}
