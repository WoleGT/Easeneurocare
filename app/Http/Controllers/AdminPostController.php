<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
     public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
        
    }

    public function edit(Post $post)
    {
       return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
  { 
    // Validate the request data
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required|string',
        'image' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('image')) {
        // Delete old image
        if ($post->image_path) {
            Storage::disk('public')->delete($post->image_path);
        }
        $validated['image_path'] = $request->file('image')->store('posts', 'public');
    }

    $post->update($validated);

    return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully!!');
   }


   public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);
          if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('blog_images', 'public');
        }

            Post::create($data); 

        return redirect()->route('posts.index')->with('success', 'Post created successfully!!');
    }

    public function destroy(Post $post)
    {
    if ($post->image_path) {
        Storage::disk('public')->delete($post->image_path);
    }

    $post->delete();

    return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully!!');
}
}
