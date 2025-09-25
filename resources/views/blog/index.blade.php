  
@extends('layouts.app')

  @section('content')
  <h1>All Blog Posts</h1>

  
  @foreach ($posts as $post)

   <div class="container">
    <div class="row d-flex">
      <div class="col-md-6 col-lg-3 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">
         <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post Image" class="block-20">
          <div class="text p-4">
           <div class="meta mb-2">
            <div><small>{{ $post->created_at->format('F j, Y') }}</small> {{-- e.g. July 21, 2025 --}}</div>
            <div><a href="#">Admin</a></div>
            <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
          </div>
          <h3 class="heading">{{ $post->title }}</h3>
          <p>{{ Str::limit($post->body, 100) }}</p>
          <p><a href="{{ route('blog.show', $post->id) }}" class="btn btn-secondary">Read more</a></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3 d-flex ftco-animate">
      <div class="blog-entry align-self-stretch">
        <img src="{{ postImageUrl($post->image_path) }}" alt="{{ $post->title }}" class="block-20">
        </a>
        <div class="text p-4">
         <div class="meta mb-2">
            @if($post->owner_name || $post->owner_location)
            <p><strong>By:</strong> {{ $post->owner_name }} 
            @if($post->owner_location)<br>
           <span> {{ $post->owner_location }}</span>
           @endif
          </p>
          @endif

          <div><div><small>{{ $post->created_at->format('F j, Y') }}</small> {{-- e.g. July 21, 2025 --}}</div>
          <div><a href="#">Admin</a></div>
          <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
        </div>
        <h3 class="heading">{{ $post->title }}</a></h3>
         <p style="font-family: Verdana, Geneva, sans-serif; line-height:1.5; padding-left:3%; padding-right:2%">{!! nl2br(e(\Illuminate\Support\Str::limit($post->body, 150))) !!}</p>
        <p><a href="{{ route('blog.show', $post->id) }}" class="btn btn-secondary">Read more</a></p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-3 d-flex ftco-animate">
    <div class="blog-entry align-self-stretch">
      <a href="blog-single.html" class="block-20" style="background-image: url('images/causes_2.jpg');">
      </a>
      <div class="text p-4">
       <div class="meta mb-2">
        <div><a href="#">July 10, 2025</a></div>
        <div><a href="#">Admin</a></div>
        <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
      </div>
      <h3 class="heading"><a href="#">Children &amp; Autism</a></h3>
      <p>Autism is a condition related to brain development</p>
      <p><a href="#" class="btn btn-secondary">Read more</a></p>
    </div>
  </div>
</div>
<div class="col-md-6 col-lg-3 d-flex ftco-animate">
  <div class="blog-entry align-self-stretch">
    <a href="blog-single.html" class="block-20" style="background-image: url('images/causes_2.jpg');">
    </a>
    <div class="text p-4">
     <div class="meta mb-2">
      <div><a href="#">July 10, 2025</a></div>
      <div><a href="#">Admin</a></div>
      <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
    </div>
    <h3 class="heading"><a href="#">Children &amp; Autism</a></h3>
    <p>Autism is a condition related to brain development</p>
    <p><a href="#" class="btn btn-secondary">Read more</a></p>
  </div>
</div>
</div>

<div class="col-md-6 col-lg-3 d-flex ftco-animate">
  <div class="blog-entry align-self-stretch">
    <a href="blog-single.html" class="block-20" style="background-image: url('images/causes_2.jpg');">
    </a>
    <div class="text p-4">
     <div class="meta mb-2">
      <div><a href="#">July 10, 2025</a></div>
      <div><a href="#">Admin</a></div>
      <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
    </div>
    <h3 class="heading"><a href="#">Children &amp; Autism</a></h3>
    <p>Autism is a condition related to brain development</p>
    <p><a href="#" class="btn btn-secondary">Read more</a></p>
  </div>
</div>
</div>
<div class="col-md-6 col-lg-3 d-flex ftco-animate">
  <div class="blog-entry align-self-stretch">
    <a href="blog-single.html" class="block-20" style="background-image: url('images/causes_2.jpg');">
    </a>
    <div class="text p-4">
     <div class="meta mb-2">
      <div><a href="#">July 10, 2025</a></div>
      <div><a href="#">Admin</a></div>
      <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
    </div>
    <h3 class="heading"><a href="#">Children &amp; Autism</a></h3>
    <p>Autism is a condition related to brain development</p>
    <p><a href="#" class="btn btn-secondary">Read more</a></p>
  </div>
</div>
</div>
<div class="col-md-6 col-lg-3 d-flex ftco-animate">
  <div class="blog-entry align-self-stretch">
    <a href="blog-single.html" class="block-20" style="background-image: url('images/causes_2.jpg');">
    </a>
    <div class="text p-4">
     <div class="meta mb-2">
      <div><a href="#">July 10, 2025</a></div>
      <div><a href="#">Admin</a></div>
      <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
    </div>
    <h3 class="heading"><a href="#">Children &amp; Autism</a></h3>
    <p>Autism is a condition related to brain development.</p>
    <p><a href="#" class="btn btn-secondary">Read more</a></p>
  </div>
</div>
</div>
<div class="col-md-6 col-lg-3 d-flex ftco-animate">
  <div class="blog-entry align-self-stretch">
    <a href="blog-single.html" class="block-20" style="background-image: url('images/causes_2.jpg');">
    </a>
    <div class="text p-4">
     <div class="meta mb-2">
      <div><a href="#">July 10, 2025</a></div>
      <div><a href="#">Admin</a></div>
      <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
    </div>
    <h3 class="heading"><a href="#">Children &amp; Autism</a></h3>
    <p>Autism is a condition related to brain development.</p>
    <p><a href="#" class="btn btn-secondary">Read more</a></p>
  </div>
</div>
</div>
</div>
<div class="row mt-5">
  <div class="col text-center">
    <div class="block-27">
      <ul>
        <li><a href="#">&lt;</a></li>
        <li class="active"><span>1</span></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">&gt;</a></li>
      </ul>
    </div>
  </div>
</div>
</div>
</section>




    <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post Image" width="300">
    <h2>{{ $post->title }}</h2>
    <small>{{ $post->created_at->format('F j, Y') }}</small> {{-- e.g. July 21, 2025 --}}
    <p>{{ Str::limit($post->body, 100) }}</p>
    <a href="{{ route('blog.show', $post->id) }}">Read More</a>
  </div>
@endforeach

{{ $posts->links() }}
@endsection




