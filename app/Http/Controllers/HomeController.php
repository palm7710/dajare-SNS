<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommonPost;
use App\Models\DajarePost;

class HomeController extends Controller
{
    public function index()
    {
        $commonPosts = CommonPost::with('user')->orderBy('updated_at', 'DESC')->paginate(6); // 6件ずつのページネーション
        $dajarePosts = DajarePost::with('user')->orderBy('updated_at', 'DESC')->paginate(6); // 6件ずつのページネーション

        // ビューにデータを渡す
        return view('home', compact('commonPosts', 'dajarePosts'));
    }
}
