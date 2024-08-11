<?php

namespace App\Http\Controllers;

use App\Models\DajarePost;
use Illuminate\Http\Request;
use App\Models\User;

class DajarePostController extends Controller
{
    public function show($id)
    {
        // 特定の投稿を取得
        $post = DajarePost::findOrFail($id);

        // 特定の投稿と関連ユーザーを取得
        $post = DajarePost::with(['user', 'comments.user'])->findOrFail($id);

        // ビューにデータを渡す
        return view('dajare_post.show', compact('post'));
    }
}
