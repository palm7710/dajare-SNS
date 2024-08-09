<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

Route::prefix('users')->group(function () {
    Route::get('{id}/show', [UserController::class, 'show'])->name('users.show');
    Route::put('{id}/update', [UserController::class, 'update'])->name('users.update');
});
