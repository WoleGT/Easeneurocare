<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ease Neurocare</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link rel="icon" href="images/ease logo.png" type="image/png">
  
  <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="css/animate.css">
  
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">


  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">

  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  

@extends('layouts.app')

@section('content')
  <h1>{{ $post->title }}</h1>

  @if($post->image_path)
  <div class="container-fluid px-0">
    <img src="{{ asset('storage/' . $post->image_path) }}" class="img-fluid w-100" style="border-radius:5%">
  </div>
@endif
  @if($post->owner_name || $post->owner_location)
    <p><strong></strong> {{ $post->owner_name }} 
       @if($post->owner_location)<br>
           <span> {{ $post->owner_location }}</span>
       @endif
    </p>
  @endif
  <p>
  <small>{{ $post->created_at->format('F j, Y') }}</small>
  </p>
       <p style="font-family: Verdana, Geneva, sans-serif;">{{ $post->body }}</p>
  <p></p>
</div>

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


</body>
</html>



