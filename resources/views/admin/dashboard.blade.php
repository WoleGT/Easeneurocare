@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Welcome Admin</h1>
    <!--<a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>-->
    <!--<form method="POST" action="{{ route('admin.logout') }}" style="display:inline;">-->
        @csrf
        <button type="submit" class="btn btn-sm btn-secondary">Logout</button>
    </form>

    <hr>

    <!--<h2>All Blog Posts</h2>-->

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Your table and pagination here -->
@endsection
