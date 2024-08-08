<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // 全ユーザーを取得
        $users = User::all();

        // データをビューに渡す
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        // 特定のユーザーを取得
        $user = User::findOrFail($id);

        // データをビューに渡す
        return view('users.show', compact('user'));
    }
}
