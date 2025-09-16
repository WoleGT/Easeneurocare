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
  <h1 style="padding-left:3%; font-family: Verdana, Geneva, sans-serif">{{ $post->title }}</h1>

  @if($post->image_path)
  <div class="container-fluid px-0">
    <img src="{{ asset('storage/' . $post->image_path) }}" width="100%" height="400" style="border-radius:3px">
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
       <p style="font-family: Verdana, Geneva, sans-serif; line-height:1.5; padding-left:3%; padding-right:2%">{!! nl2br(e($post->body)) !!}</p>
  <p></p>
</div>

  <h5>Leave a Comment</h5>
  <form method="POST" action="{{ route('comments.store') }}">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <p>
    <input type="text" name="name" width="450" height="50"  placeholder="Your name" required>
    </p>
    <p>
    <textarea name="body"  width="450" height="300" placeholder="Write your comment" required></textarea>
    </p>
    <p>
    <button type="submit"style="width:10%;color:purple; border-radius: 10px; font-size:25px">Submit</button>
    </p>
  </form>

  

  <h5>Comments</h5>
  @foreach($post->comments as $comment)
    <p><strong>{{ $comment->name }}</strong>: {{ $comment->body }}</p>
  @endforeach
@endsection


</body>
</html>



