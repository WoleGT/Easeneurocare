<nav class="bg-white border-b shadow px-4 py-3">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <div class="flex space-x-4">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'font-bold underline' : '' }}">
                Dashboard
            </a>

            <a href="{{ route('admin.posts.index') }}" class="{{ request()->routeIs('admin.posts.index') ? 'font-bold underline' : '' }}">
                Admin Posts
            </a>
        </div>

        <div>
            <form method="POST" action="{{ route('logou
