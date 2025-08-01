@extends('layouts.app')

@section('content')
<h1>All Blog Posts</h1>
@foreach($posts as $post)
    <div class="blog-card">
        <h2><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2>
        <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post Image" width="300">
        <p>{{ Str::limit($post->body, 150) }}</p>
    </div>
@endforeach

{{ $posts->links() }}
@endsection
