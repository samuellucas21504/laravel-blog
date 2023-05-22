<?php

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

Route::get('/login', [UserController::class, 'getLoginPage'])->name('login');

Route::post('/login', [UserController::class, 'signIn']);

Route::get('/logout', [UserController::class, 'signOut']);

Route::get('/register', [UserController::class, 'getRegisterPage'])->name('register');

Route::post('/register', [UserController::class, 'register']);
