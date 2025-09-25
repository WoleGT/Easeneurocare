<?php
// routes/web.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\WorkwithUsController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\WelcomeController; 
use App\Http\Controllers\AdminAuthController;   


Route::get('/', [WelcomeController::class, 'index'])->name('welcome'); // Show welcome page


Route::get('/contact', [ContactController::class, 'index'])->name('contact'); // Show contact form
Route::get('/about', [AboutController::class, 'index'])->name('about'); // Show about page
Route::get('/services', [ServicesController::class, 'index'])->name('services'); // Show services page
Route::get('/blogmain', [BlogController::class, 'index'])->name('blogmain'); // Show blog page
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show'); // Show individual blog post
Route::get('/workwithus', [WorkwithUsController::class, 'index'])->name('workwithus'); // Show work with us page

Route::post('/donation', [DonationController::class, 'store'])->name('donation.store'); // Store donation data
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store'); // Store contact form data
Route::post('/workwithus', [WorkwithUsController::class, 'store'])->name('workwithus.store'); // Store work with us form data

// Blog routes
Route::get('/blog', [PostController::class, 'index'])->name('blog.index'); // List all posts
// Route::get('/blog/{post}', [PostController::class, 'show'])->name('blog.show'); // Show individual post


// Admin blog post creation
Route::middleware(['auth:admin'])->group(function () {
    // admin landing page with posts index
    Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
    
    Route::get('/admin/posts/create', [AdminPostController::class, 'create'])->name('posts.create'); // Show form to create a new post    
    Route::post('/admin/posts', [AdminPostController::class, 'store'])->name('posts.store'); // Store a new post
    Route::get('admin/blog', [AdminPostController::class, 'index'])->name('admin.posts.index'); // List all posts in admin
    Route::get('/blog/{post}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit'); // Show form to edit a post
    Route::put('/blog/{post}', [AdminPostController::class, 'update'])->name('admin.posts.update'); // Update a post
    Route::delete('/blog/{post}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy'); // Delete a post

});


// Comments
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store'); // Store a comment for a post


Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        });

        Route::resource('/posts', AdminPostController::class);
    });
});

require __DIR__.'/auth.php';
