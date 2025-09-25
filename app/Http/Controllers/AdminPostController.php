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
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required|string',
        'image' => 'nullable|image|max:2048',
        'owner_name' => 'nullable|string|max:255',
        'owner_location' => 'nullable|string|max:255',
    ]);

    if ($request->hasFile('image')) {
        // Delete old image if it exists
        if ($post->image_path && file_exists(public_path('storage/blog_images/' . $post->image_path))) {
            unlink(public_path('storage/blog_images/' . $post->image_path));
        }

        // Upload new image
        $filename = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('storage/blog_images'), $filename);
        $data['image_path'] = $filename;
    }


    $post->update($data);

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
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'owner_name' => 'nullable|string|max:255',
            'owner_location' => 'nullable|string|max:255',
        ]);


         if ($request->hasFile('image')) {
         // Move directly into public/storage/blog_images
         $filename = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('storage/blog_images'), $filename);

        // Save only filename or relative path
        $data['image_path'] = $filename;
        }

        Post::create($data); 

        return redirect()->route('posts.index')->with('success', 'Post created successfully!!');
    }

    public function destroy(Post $post)
    {

     if ($post->image_path && file_exists(public_path('storage/blog_images/' . $post->image_path))) {
        unlink(public_path('storage/blog_images/' . $post->image_path));
    }

    $post->delete();

    return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully!!');
    }


}
