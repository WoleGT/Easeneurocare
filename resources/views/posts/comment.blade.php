<h3>Comments</h3>

@foreach ($post->comments as $comment)
  <p><strong>{{ $comment->name }}</strong>: {{ $comment->content }}</p>
@endforeach

<h4>Leave a Comment</h4>
@if(session('success'))
  <p>{{ session('success') }}</p>
@endif

<form action="{{ url('/blog/' . $post->slug . '/comment') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Your name" required><br>
    <textarea name="comment" placeholder="Your comment" required></textarea><br>
    <button type="submit">Submit</button>
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>