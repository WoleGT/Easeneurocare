<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\CommentController;


class BlogController extends Controller
{
     public function index()
    {
         $recentPosts = \App\Models\Post::latest()->take(8)->get();
         return view('blogmain', compact('recentPosts'));
    }
    
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('blog.show', compact('post'));
    }
   
}





