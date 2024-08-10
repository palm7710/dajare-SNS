<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class CommonLikeController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        $like = new Like();

        $like->user_id = $request->user_id;
        $like->common_post_id = $request->post_id;
        $like->save();

        // return redirect()->view('home');
        return redirect()->route('home.index');
    }

    // public function destroy()
}
