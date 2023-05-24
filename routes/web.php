<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('home');
})->name('home');

Route::get('/login', [UserController::class, 'getLoginPage'])->name('login')->middleware('guest');

Route::post('/login', [UserController::class, 'signIn'])->middleware('guest');

Route::get('/logout', [UserController::class, 'signOut'])->middleware('auth');

Route::get('/register', [UserController::class, 'getRegisterPage'])->name('register')->middleware('guest');

Route::post('/register', [UserController::class, 'register'])->middleware('guest');

Route::get('/posts', [PostController::class, 'getPostsPage'])->middleware('auth');

Route::get('/post/create', [PostController::class, 'getCreatePostPage'])->middleware('auth');

Route::post('/post/create', [PostController::class, 'createPost'])->middleware('auth');

Route::get('/post/{post}', [PostController::class, 'getPostPage'])->middleware('auth');

Route::get('/post/{post}/edit', [PostController::class, 'getUpdatePostPage'])->middleware('can:update,post');

Route::put('/post/{post}/edit', [PostController::class, 'editPost'])->middleware('can:update,post');

Route::delete('/post/{post}/delete', [PostController::class, 'deletePost'])->middleware('can:delete,post');

Route::get('/user/{user:username}', [UserController::class, 'getUserPage']);

Route::get('/user/{user:username}/posts', [UserController::class, 'getUserPosts']);
