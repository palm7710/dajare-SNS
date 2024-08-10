<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommonPostController;
use App\Http\Controllers\DajarePostController;

//ホーム画面のルート
Route::get('/', [HomeController::class, 'index']);

// ユーザーに対応するルート
Route::prefix('users')->group(function () {
    Route::get('{id}/show', [UserController::class, 'show'])->name('users.show');
    Route::put('{id}/update', [UserController::class, 'update'])->name('users.update');
});

// 各投稿タイプに対応するルート
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// 詳細画面のルート
Route::get('common_post/{id}', [CommonPostController::class, 'show'])->name('common_post.show');
Route::get('dajare_post/{id}', [DajarePostController::class, 'show'])->name('dajare_post.show');
