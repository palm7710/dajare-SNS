<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommonPostController;
use App\Http\Controllers\DajarePostController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommonLikeController;
use App\Http\Controllers\DajareLikeController;
use App\Http\Controllers\CommonCommentController;
use App\Http\Controllers\DajareCommentController;

//ホーム画面のルート
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// ユーザーに対応するルート
Route::prefix('users')->group(function () {
    Route::get('{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('{id}/profile', [UserController::class, 'profile'])->name('users.profile');
    Route::put('{id}', [UserController::class, 'update'])->name('users.update');
});

// 各投稿タイプに対応するルート
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// 詳細画面のルート
Route::get('common_post/{id}', [CommonPostController::class, 'show'])->name('common_post.show');
Route::get('dajare_post/{id}', [DajarePostController::class, 'show'])->name('dajare_post.show');

//ログインページルート
Route::get('/login', [AuthenticatedSessionController::class, 'login'])
    // ->middleware('/')
    ->name('custom.login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/registration-complete', function () {
    return view('auth.registration-complete');
})->name('registration.complete');


// 普通の投稿のいいねのルート
Route::post('/common_post/{post_id}/likes', [CommonLikeController::class, 'store'])->name('common_post.store');
Route::delete('common_post/{post_id}/liles', [CommonLikeController::class, 'destroy'])->name('common_post.destroy');

// ダジャレ投稿のいいねのルート
Route::post('/dajare_post/{post_id}/likes', [DajareLikeController::class, 'store'])->name('dajare_post.store');
Route::delete('dajare_post/{post_id}/liles', [DajarePostController::class, 'destroy'])->name('dajare_post.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/common_post/{post_id}/comments', [CommonCommentController::class, 'store'])->name('common_comment.store');
Route::post('/dajare_post/{post_id}/comments', [DajareCommentController::class, 'store'])->name('dajare_comment.store');

Route::get('/db-query', function () {
    try {
        $users = DB::table('users')->get();
        return response()->json($users);
    } catch (\Exception $e) {
        return 'Could not run query. Error: ' . $e->getMessage();
    }
});

require __DIR__ . '/auth.php';
