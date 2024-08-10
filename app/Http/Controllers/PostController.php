<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\DajarePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        //return redirect()->route('home');

        // バリデーション
        $request->validate([
            'text' => 'required|string|max:255',
            'image' => 'nullable|image',
        ]);
        $user = Auth::user();
        $text = $request->input('text');
        $post = new Post();

        //ユーザーIDを仮で１に設定。後で治す。
        $post->user_id = 1;
        $post->text = $text;

        //最初のインプレッションは0に指定。
        $post->impression=0;

        // 画像がアップロードされている場合
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // 画像ファイル名を生成

            // 画像を指定のディレクトリに保存
            $image->storeAs('public/post', $imageName);

            $imagePath = 'storage/post/' . $imageName; // 画像のパスを保存
            $post->image = $imagePath; // 画像のパスをモデルに設定
        }

        $post->save(); // データベースに保存

        return redirect()->route('home.index');
    }
    // ダジャレ判定のメソッド
    private function isDajare($text)
    {
        // ここにダジャレ判定の実装をする
        return false;
    }
}
