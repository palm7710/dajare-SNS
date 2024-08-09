<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserController extends Controller
{
    public function show($id) {

        $user = User::find($id);

        // dd($user);

        return view('user', ['user' => $user]);
    }

    public function update(Request $request) {

        // バリデーション
        $validatedData = $request->validate([
            'profile_image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'user_name' => 'required|string|max:255',
        ]);

        $id = $request->id;

        // 指定されたIDのユーザーを取得（存在しない場合は404エラー）
        $user = User::findOrFail($id);

        // 画像がアップロードされた場合
        if ($request->hasFile('profile_image')) {

            $dir = 'profile_images';

            // 画像を保存
            $filePath = $request->file('profile_image')->store('public/' . $dir);

            $deleteFilePath = str_replace('/storage', 'public', $user->profile_image);
            
            // 既存の画像を削除
            if (Storage::exists($deleteFilePath)) {
                Storage::delete($deleteFilePath);
            }

            // ユーザーのプロフィールに画像パスを保存
            $user->profile_image = Storage::url($filePath);
        }

        // ユーザー情報を更新
        $user->user_name = $validatedData['user_name'];
        $user->profile_text = $request->profile_text;

        // // ユーザー情報を保存
        $user->save();

        return redirect()->route('users.show', ['id' => $user->id])->with('success', 'Profile updated successfully.');

    }
}
