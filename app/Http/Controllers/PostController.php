<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\DajarePost;
use App\Models\CommonPost;
use Illuminate\Http\Request;
use App\Models\Comment;

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

        $data = $request->only(['text', 'image']);
        $data['user_id'] = auth()->id();

        // 画像がアップロードされている場合
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // 画像ファイル名を生成

            // 画像を指定のディレクトリに保存
            $image->storeAs('/Applications/MAMP/htdocs/dajare-SNS/public/storage/post', $imageName);

            $imagePath = 'storage/post/' . $imageName; // 画像のパスを保存
        } else {
            $imagePath = null; // 画像がない場合
        }

        return redirect()->route('posts.index');
    }
    // ダジャレ判定のメソッド
    private function isDajare($text)
    {
        // ここにダジャレ判定の実装をする
        return false;
    }
}
