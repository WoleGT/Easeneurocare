<h1>Welcome Admin</h1>
<a href="{{ route('posts.create') }}">Create New Post</a>
<form method="POST" action="{{ route('admin.logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
