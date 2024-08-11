<?php

namespace App\Http\Controllers;

use App\Models\CommonPost;
use App\Models\DajarePost;
use App\Models\CommonPost;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\CheckDajare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function show($id)
    {
        $post = CommonPost::with('comments.user')->find($id);

        if (!$post) {
            $post = DajarePost::with('comments.user')->findOrFail($id);
        }

        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'text' => 'required|string|max:255',
            'image' => 'nullable|image',
        ]);


        $user = Auth::user();
        $text = $request->input('text');
        $imagePath = null;

        // 画像がアップロードされている場合
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // 画像ファイル名を生成

            // 画像を指定のディレクトリに保存
            $image->storeAs('public/post', $imageName);

            $imagePath = 'storage/post/' . $imageName; // 画像のパスを保存
        }

        //ダジャレになっている文字数が、ダジャレスコアとして返ってくる
        $checkDajare = new CheckDajare();
        $dajareScore = $checkDajare->findMaxDajare($text);

        if ($dajareScore === -1) {
            //ダジャレではないので通常ポストへ
            $post = new CommonPost();

            //ユーザーIDを仮で１に設定。後で治す。
            $post->user_id = 1;
            $post->text = $text;
            $post->impression = 0; //閲覧数は初期値0に指定
            $post->image = $imagePath; // 画像のパスをモデルに設定
            $post->save(); // データベースに保存
        } else {
            //ダジャレなのでダジャレポストへ
            $post = new DajarePost();

            //ユーザーIDを仮で１に設定。後で治す。
            $post->user_id = 1;
            $post->text = $text;
            $post->impression = 0; //閲覧数は初期値0に指定
            $post->dajare_score=$dajareScore;
            $post->image = $imagePath; // 画像のパスをモデルに設定
            $post->save(); // データベースに保存
        }
        return redirect()->route('home.index');
    }
}
