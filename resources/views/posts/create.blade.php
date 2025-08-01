<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Title</label>
    <input type="text" name="title" required><br>

    <label>Content</label>
    <textarea name="content" required></textarea><br>

    <label>Image</label>
    <input type="file" name="image"><br>

    <button type="submit">Create Post</button>
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>