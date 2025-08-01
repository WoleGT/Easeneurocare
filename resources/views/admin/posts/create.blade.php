@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Create New Blog Post</h1>

  @if ($errors->any())
      <div class="alert alert-danger">
          <ul class="mb-0">
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" name="title" class="form-control" value="{{ old('title') }}" required> 
    </div>

    <div class="mb-3">
      <label for="body" class="form-label">Body</label>
      <textarea name="body" class="form-control" rows="6" value="{{ old('title') }}" required></textarea>
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">Image (optional)</label>
      <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Publish</button>
  </form>
</div>
@endsection
