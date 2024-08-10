<?php

use App\Http\Controllers\CommonLikeController;
use App\Http\Controllers\DajareLikeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommonPostController;
use App\Http\Controllers\DajarePostController;

//ホーム画面のルート
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// ユーザーに対応するルート
Route::prefix('users')->group(function () {
    Route::get('{id}', [UserController::class, 'show'])->name('users.show');
    Route::put('{id}', [UserController::class, 'update'])->name('users.update');
});

// 各投稿タイプに対応するルート
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// 詳細画面のルート
Route::get('common_post/{id}', [CommonPostController::class, 'show'])->name('common_post.show');
Route::get('dajare_post/{id}', [DajarePostController::class, 'show'])->name('dajare_post.show');

// 普通の投稿のいいねのルート
Route::post('/common_post/{post_id}/likes', [CommonLikeController::class, 'store'])->name('common_post.store');
Route::delete('common_post/{post_id}/liles', [CommonLikeController::class, 'destroy'])->name('common_post.destroy');

// ダジャレ投稿のいいねのルート
Route::post('/dajare_post/{post_id}/likes', [DajareLikeController::class, 'store'])->name('dajare_post.store');
Route::delete('dajare_post/{post_id}/liles', [DajarePostController::class, 'destroy'])->name('dajare_post.destroy');
