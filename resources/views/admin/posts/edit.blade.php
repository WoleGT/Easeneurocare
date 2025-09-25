@extends('layouts.admin')

@section('content')
<h1>Edit Blog Post</h1>

<form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Title</label>
    <input type="text" name="title" value="{{ old('title', $post->title) }}" required>

    <label>Body</label>
    <textarea name="body" rows="6" required>{{ old('body', $post->body) }}</textarea>

    <div class="mb-3">
      <label for="title" class="form-label">Post Owner Name</label>
      <input type="text" name="owner_name" class="form-control" value="{{ old('title') }}" required> 
    </div>

    <div class="mb-3">
      <label for="title" class="form-label">Post Owner Location</label>
      <input type="text" name="owner_location" class="form-control" value="{{ old('title') }}" required> 
    </div>

    <label>Current Image</label>
    @if($post->image_path)
        <img src="{{ postImageUrl($post->image_path) }}" width="150" />
    @else
        <p>No image</p>
    @endif

    <label>Change Image</label>
    <input type="file" name="image">

    <button type="submit">Update Post</button>
</form>
@endsection
