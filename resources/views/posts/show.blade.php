@extends('layouts.app')

@section('content')
<h1>{{ $post->title }}</h1>
<img src="{{ asset('storage/' . $post->image_path) }}" alt="Post Image">
<p>{{ $post->body }}</p>

<hr>
<h3>Comments</h3>
@foreach($comments as $comment)
    <div>
        <strong>{{ $comment->name }}</strong>
        <p>{{ $comment->message }}</p>
    </div>
@endforeach

<hr>
<h4>Leave a Comment</h4>
<form action="{{ route('comments.store') }}" method="POST">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <input type="text" name="name" placeholder="Your Name" required><br>
    <textarea name="message" placeholder="Your Comment" required></textarea><br>
    <button type="submit">Submit</button>
</form>
@endsection
