<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\OnlineController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\OfflineController;
use App\Http\Controllers\ProfileController;

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
    return Redirect::route('login');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/search/{nick_name}', [SearchController::class, 'search'])->name('search');

    // Posts
    Route::post('/create-post', [PostController::class, 'createPost'])->name('create-post');
    Route::get('/list-posts', [PostController::class, 'getPosts'])->name('list-post');
    Route::post('/like-post', [PostController::class, 'likeOrDislike'])->name('like-post');
    Route::post('/comment', [PostController::class, 'comment'])->name('comment');

    // Profile
    Route::get('/profile/{nick_name}', [ProfileController::class, 'index'])->name('profile');

    // Chat
    Route::get('/chats', [ChatController::class, 'index'])->name('chats');
    Route::get('/user/chat/{nick_name}', [SearchController::class, 'usersIFollow'])
        ->name('usersIFollow');

    Route::get('/user-chat/{id}', [ChatController::class, 'getChat'])->name('get-chat');
    Route::get('/new-chat/{id}', [ChatController::class, 'getNewChat'])->name('get-new-chat');

    // Offline and Online
    Route::post('/online/{id}', OnlineController::class)->name('online');
    Route::post('/offline/{id}', OfflineController::class)->name('offline');
});
