<?php

namespace App\Http\Controllers;

use App\Models\DajarePost;
use Illuminate\Http\Request;

class DajarePostController extends Controller
{
    public function show($id)
    {
        // 特定の投稿を取得
        $post = DajarePost::findOrFail($id);

        // ビューにデータを渡す
        return view('dajare_post.show', compact('post'));
    }
}
