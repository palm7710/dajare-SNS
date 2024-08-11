<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class DajareLikeController extends Controller
{
    public function store(Request $request)
    {

        $user_id = Auth::user()->id;
        $exists = Like::where('user_id', $user_id)
                      ->where('dajare_post_id', $request->post_id)
                      ->exists();

        if (!$exists) {
            $like = new Like();
            $like->user_id = $user_id;
            $like->dajare_post_id = $request->post_id;
            $like->save();

        } else {
            Like::where('user_id', $user_id)
                ->where('dajare_post_id', $request->post_id)
                ->delete();
        }

        return redirect()->route('home.index');
    }
}
