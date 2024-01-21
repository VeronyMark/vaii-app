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


//ZOBRAZENIE VSETKYCH POSTOV
Route::get('/posts', [PostController::class, 'index'])->name('welcome');

//ZOBRAZENIE KONKRETNEHO POSTU
Route::get('posts/{post:id}', [PostController::class, 'show'])->name('posts.show');

//ZOBRAZENIE INFORMACII O POSTE
Route::get('/posts/{post}/details', [PostController::class,'getPostDetails'])->name('posts.details');


//POSTY
Route::get('/create', [PostController::class, 'create'])->name('create');
Route::post('/store', [PostController::class, 'store'])->name('store');

Route::delete('posts/{post:slug}/destroy', [PostController::class, 'destroy'])->name('post.delete');
Route::get('/edit-post/{post}', [PostController::class, 'editPost'])->name('post.edit');
Route::put('/update-post/{id}', [PostController::class, 'update']);



//KOMENTÁRE
Route::post('posts/{post:slug}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{id}', [CommentController::class, 'destroy']);//->name('comments.delete');
Route::get('/edit-comment/{id}', [CommentController::class, 'edit']);
Route::put('/update-comment/{id}', [CommentController::class, 'update']);





Route::get('categories/{category:slug}', function (Category $category) {
    $posts = $category->posts()->paginate(8);
    $categories = Category::all();

    return view('blogPage', ['posts' => $posts,  'categories' => $categories]);
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});






require __DIR__.'/auth.php';
