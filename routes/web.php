<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommonPostController;
use App\Http\Controllers\DajarePostController;

//ホーム画面のルート
Route::get('/', [HomeController::class, 'index']);

// 普通の投稿のルート
Route::get('/common-posts', [CommonPostController::class, 'index'])->name('common_posts.index');
Route::get('/common-posts/{id}', [CommonPostController::class, 'show'])->name('common_posts.show');
Route::post('/common-posts', [CommonPostController::class, 'store'])->name('common_posts.store');
Route::put('/common-posts/{id}', [CommonPostController::class, 'update'])->name('common_posts.update');
Route::patch('/common-posts/{id}', [CommonPostController::class, 'update']);
Route::delete('/common-posts/{id}', [CommonPostController::class, 'destroy'])->name('common_posts.destroy');

// ダジャレポストのルート
Route::get('/dajare-posts', [DajarePostController::class, 'index'])->name('dajare_posts.index');
Route::get('/dajare-posts/{id}', [DajarePostController::class, 'show'])->name('dajare_posts.show');
Route::post('/dajare-posts', [DajarePostController::class, 'store'])->name('dajare_posts.store');
Route::put('/dajare-posts/{id}', [DajarePostController::class, 'update'])->name('dajare_posts.update');
Route::patch('/dajare-posts/{id}', [DajarePostController::class, 'update']);
Route::delete('/dajare-posts/{id}', [DajarePostController::class, 'destroy'])->name('dajare_posts.destroy');
