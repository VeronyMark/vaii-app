<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

use App\Http\Controllers\LikeController;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;


use App\Models\Comment;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//HOMEPAGE
Route::get('/', function () {
    return view('homePage', [
        'posts' => Post::latest()->with('category','author') ->get()
    ]);
})->name('home');


/*
Route::get('/posts', function () {
    $categories = Category::all();

    $posts = Post::latest()->with('category', 'author')->paginate(5);

    // Use compact to create an array of variables
    return view('welcome', compact('posts', 'categories'));

})->name('welcome'); */

//ZOBRAZENIE VSETKYCH POSTOV
Route::get('/posts', [PostController::class, 'index'])->name('welcome');

//ZOBRAZENIE KONKRETNEHO POSTU
Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');




//POSTY
//get view
Route::get('/create', [PostController::class, 'create'])->name('create');
Route::post('/store', [PostController::class, 'store'])->name('store');


Route::delete('posts/{post:slug}/destroy', [PostController::class, 'destroy'])->name('post.delete');


// Route for updating the post content
Route::put('/update-post/{post}', [PostController::class, 'update'])->name('post.update');
//Route::put('/update-post/{post}', [PostController::class, 'updatePost'])->name('post.update');

// Route for getting the post data for in-place editing
Route::get('/edit-post/{post}', [PostController::class, 'editPost'])->name('post.edit');

//Route::get('/edit-post/{id}', [PostController::class , 'edit']);
//Route::put('/update-post/{id}', [PostController::class, 'update']);


//Route::get('/posts/{post}/edit', PostController::class .'@edit')->name('post.edit');
//Route::put('/posts/{post}', [PostController::class, 'update'])->name('post.update');

//route for creating post
//Route::get('/create', PostController::class . '@create')->name('create');
// adds a post to the database
//Route::post('/posts', PostController::class , 'store')->name('store');
//Route::post('/create', [PostController::class, 'create'])->name('create');
//Route::get('/create', [PostController::class, 'create'])->name('create');

//Route::post('/create', [PostController::class, 'store']); // Add this line for the POST request





/* V routes/web.php
Route::post('posts/{post:slug}/comments', 'CommentController@store');
Route::get('posts/{post:slug}/comments', 'CommentController@edit');
*/



//KOMENTÁRE

Route::post('posts/{post:slug}/comments', [CommentController::class, 'store'])->name('comments.store');
//Route::get('posts/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
//Route::put('posts/{comment}/update', [CommentController::class, 'update'])->name('comments.update');
//Route::delete('posts/{comment}/destroy', [CommentController::class, 'destroy'])->name('comments.delete');
Route::delete('/comments/{id}', [CommentController::class, 'destroy']);//->name('comments.delete');


Route::get('/edit-comment/{id}', [CommentController::class, 'edit']);
Route::put('/update-comment/{id}', [CommentController::class, 'update']);

//getPostDetails
//Route::get('/posts/{post}/details', 'PostController@getPostDetails')->name('posts.details');

Route::get('/posts/{post}/details', [PostController::class,'getPostDetails'])->name('posts.details');








Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('categories/{category:slug}', function (Category $category) {
    $posts = $category->posts()->paginate(5);
    $categories = Category::all();

    return view('blogPage', ['posts' => $posts,  'categories' => $categories]);
});



require __DIR__.'/auth.php';
