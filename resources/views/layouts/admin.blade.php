<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Admin Panel')</title>
</head>
<body>
    <header>
        <h2>Admin Dashboard</h2>
        <nav>
            <a href="{{ route('posts.index') }}">All Posts</a> |
            <a href="{{ route('posts.create') }}">New Post</a>
        </nav>
    </header>

    <hr>

    <main>
        @yield('content')
    </main>
</body>
</html>
