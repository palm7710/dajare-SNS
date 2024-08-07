<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CommonPostController;
use App\Http\Controllers\DajarePostController;

class HomeController extends Controller
{
    public function index()
    {
        // CommonPostControllerのインスタンスを作成し、インデックスメソッドを呼び出してデータを取得
        $commonPostController = new CommonPostController();
        $common_posts = $commonPostController->index();

        // DajarePostControllerのインスタンスを作成し、インデックスメソッドを呼び出してデータを取得
        $dajarePostController = new DajarePostController();
        $dajare_posts = $dajarePostController->index();

        // 必要なデータをビューに渡す
        return view('home', [
            'common_posts' => $common_posts,
            'dajare_posts' => $dajare_posts,
        ]);
    }
}
