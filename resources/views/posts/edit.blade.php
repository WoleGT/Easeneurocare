@extends('layouts.app')

@section('content')
<h1>Edit Post</h1>

<form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Title</label>
    <input type="text" name="title" value="{{ $post->title }}" required><br>

    <label>Content</label>
    <textarea name="content" required>{{ $post->content }}</textarea><br>

    <label>Image</label>
    @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" style="max-width: 150px;">
    @endif
    <input type="file" name="image"><br>

    <button type="submit">Update Post</button>
</form>
@endsection
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>