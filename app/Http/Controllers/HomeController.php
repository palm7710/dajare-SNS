<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommonPost;
use App\Models\DajarePost;

class HomeController extends Controller
{
    public function index()
    {
        // データを取得
        $posts = CommonPost::all(); // 普通の投稿
        $dajarePosts = DajarePost::all(); // ダジャレ投稿

        // ビューにデータを渡す
        return view('home', compact('posts', 'dajarePosts'));
    }
}
