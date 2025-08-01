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

    <label>Current Image</label>
    @if($post->image_path)
        <img src="{{ asset('storage/' . $post->image_path) }}" width="150" />
    @else
        <p>No image</p>
    @endif

    <label>Change Image</label>
    <input type="file" name="image">

    <button type="submit">Update Post</button>
</form>
@endsection
