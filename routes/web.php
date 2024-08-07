<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommonPostController;
use App\Http\Controllers\DajarePostController;

Route::get('/', [HomeController::class, 'index']);

Route::get('common_posts/{id}', [CommonPostController::class, 'show'])->name('common_post.show');
Route::post('common_posts', [CommonPostController::class, 'store'])->name('common_post.store');
Route::put('common_posts/{id}', [CommonPostController::class, 'update'])->name('common_post.update');
Route::delete('common_posts/{id}', [CommonPostController::class, 'destroy'])->name('common_post.destroy');

Route::get('/dajare_post/{id}', [DajarePostController::class, 'show'])->name('dajare_post.show');
Route::post('/dajare_post', [DajarePostController::class, 'store'])->name('dajare_post.store');
Route::put('/dajare_post/{id}', [DajarePostController::class, 'update'])->name('dajare_post.update');
Route::delete('/dajare_post/{id}', [DajarePostController::class, 'destroy'])->name('dajare_post.destroy');
