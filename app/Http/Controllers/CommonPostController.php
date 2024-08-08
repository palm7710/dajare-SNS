<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommonPost;

class CommonPostController extends Controller
{
    public function show($id)
    {
        // 特定の投稿を取得
        $post = CommonPost::findOrFail($id);

        // 特定の投稿と関連ユーザーを取得
        $post = CommonPost::with('user')->findOrFail($id);

        // ビューにデータを渡す
        return view('common_post.show', compact('post'));
    }
}
