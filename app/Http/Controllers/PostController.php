<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('blog.index', compact('posts'));
    }

   public function show(Post $post)
{
    $post->load('comments'); // Eager-load the related comments
    return view('blog.show', compact('post'));
}

}

