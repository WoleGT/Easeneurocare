<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    // Store a new comment

   public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'name' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
        
        Comment::create([
            'post_id' => $request->post_id,
            'name' => $request->name,
            'body' => $request->body,
        ]);

        return redirect()->back()->with('success', 'Comment added!');
    }

}

