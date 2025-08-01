
@extends('layouts.app')

@section('content')
  <h1>{{ $post->title }}</h1>
  <p>
  <small>Published on {{ $post->created_at->format('F j, Y') }}</small>
  </p>

  @if($post->image_path)
    <img src="{{ asset('storage/' . $post->image_path) }}" width="250" width="250" style="border-radius:5%">
  @endif
  <p>{{ $post->body }}</p>

  <h4>Leave a Comment</h4>
  <form method="POST" action="{{ route('comments.store') }}">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <input type="text" name="name" placeholder="Your name" required>
    <textarea name="body" placeholder="Write your comment" required></textarea>
    <button type="submit">Submit</button>
  </form>

  

  <h4>Comments</h4>
  @foreach($post->comments as $comment)
    <p><strong>{{ $comment->name }}</strong>: {{ $comment->body }}</p>
  @endforeach
@endsection






