<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommonCommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment();
        $user = Auth::user();
        $comment->user_id = $user->id;
        $comment->text = $request->text;
        $comment->common_post_id = $request->post_id;
        $comment->save();

        return redirect()->route('common_post.show', ['id' => $request->post_id]);
    }
}

