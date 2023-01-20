<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.register');
});

Route::get('posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
Route::get('posts/{post}/dislike', [PostController::class, 'dislike'])->name('posts.dislike');
Route::resource('posts', PostController::class);
Route::resource('posts.comments', CommentController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    return view('posts.index')->name('posts');
});

