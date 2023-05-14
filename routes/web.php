<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

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
    // return view('welcome');
    return redirect('/posts');
});

Route::get('/dashboard', function () {
    return redirect('/posts');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Custom routes

Route::get('/posts', [PostController::class, 'index'])
    ->name('posts.index');

Route::get('/posts/{id}', [PostController::class, 'show'])
    ->name('posts.show');

Route::get('/users', [UserController::class, 'index'])
    ->name('users.index');

Route::get('/users/{id}', [UserController::class, 'show'])
    ->name('users.show');

Route::get('/comments/create/{id}', [CommentController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('comments.create');

Route::post('/posts', [CommentController::class, 'store'])
    ->name('comments.store');
