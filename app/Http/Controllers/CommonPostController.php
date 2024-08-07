<?php

namespace App\Http\Controllers;

use App\Models\CommonPost;
use Illuminate\Http\Request;

class CommonPostController extends Controller
{
    public function index()
    {
        return CommonPost::all();
    }

    public function show($id)
    {
        $common_post = CommonPost::find($id);
        $common_posts = CommonPost::all();
        return view('home', compact('common_post', 'common_posts'));
    }

    public function store(Request $request)
    {
        $common_post = new CommonPost();
        $common_post->user_id = $request->user_id;
        $common_post->text = $request->text;
        $common_post->image = $request->image;
        $common_post->save();
        return redirect()->route('common_post.index');
    }

    public function update(Request $request, $id)
    {
        $common_post = CommonPost::find($id);
        $common_post->user_id = $request->user_id;
        $common_post->text = $request->text;
        $common_post->image = $request->image;
        $common_post->save();
        return redirect()->route('common_post.index');
    }

    public function destroy($id)
    {
        $common_post = CommonPost::find($id);
        $common_post->delete();
        return redirect()->route('common_post.index');
    }
}
