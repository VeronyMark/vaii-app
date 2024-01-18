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

Route::get('/', function () {
    return view('homePage', [
        'posts' => Post::latest()->with('category','author') ->get()
    ]);
})->name('home');

//HOMEPAGE

/*
Route::get('/posts', function () {
    $categories = Category::all();

    $posts = Post::latest()->with('category', 'author')->paginate(5);

    // Use compact to create an array of variables
    return view('welcome', compact('posts', 'categories'));

})->name('welcome'); */

Route::get('/posts', [PostController::class, 'index'])->name('welcome');






Route::get('posts/{post:slug}', function (Post $post) {
    return view('post', ['post' => $post]);
});



Route::get('/ikeaa', function () {
    return view('ikea');
});

Route::get('/skuska', function () {
    return view('skuska');
});

Route::post('/skuska/s', [LikeController::class, 'toggleLike']);
Route::post('/skuska/comments', [CommentController::class, 'submitComment']);



//POSTY
//get view
Route::get('/create', [PostController::class, 'create'])->name('create');
Route::post('/store', [PostController::class, 'store'])->name('store');
Route::delete('posts/{post}/destroy', [PostController::class, 'destroy'])->name('delete');


//route for creating post
//Route::get('/create', PostController::class . '@create')->name('create');
// adds a post to the database
//Route::post('/posts', PostController::class , 'store')->name('store');
//Route::post('/create', [PostController::class, 'create'])->name('create');
//Route::get('/create', [PostController::class, 'create'])->name('create');

//Route::post('/create', [PostController::class, 'store']); // Add this line for the POST request

Route::get('/posts/{post}/edit', PostController::class .'@edit')->name('post.edit');
Route::put('/posts/{post}', PostController::class .'@update')->name('update');



// V routes/web.php
//Route::post('posts/{post:slug}/comments', 'CommentController@store');
Route::get('posts/{post:slug}/comments', 'CommentController@edit');






//KOMENTÁRE
/*
Route::post('posts/{post:slug}/comments', [CommentController::class, 'store'])->name('comment.store');
Route::get('posts/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
*/
Route::put('posts/{comment}/update', [CommentController::class, 'update'])->name('comments.update');
Route::delete('posts/{comment}/destroy', [CommentController::class, 'destroy'])->name('comments.delete');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
