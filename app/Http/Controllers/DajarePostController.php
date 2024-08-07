<?php

namespace App\Http\Controllers;

use App\Models\DajarePost;
use Illuminate\Http\Request;

class DajarePostController extends Controller
{
    public function index()
    {
        return DajarePost::all();
    }
    public function show($id)
    {
        $dajare_post = DajarePost::find($id);
        $dajare_posts = DajarePost::all();
        return view('home', compact('dajare_post', 'dajare_posts'));
    }
    public function store(Request $request)
    {
        $dajare_post = new DajarePost();
        $dajare_post->user_id = $request->user_id;
        $dajare_post->text = $request->text;
        $dajare_post->image = $request->image;
        $dajare_post->save();
        return redirect()->route('dajare_post.index');
    }
    public function update(Request $request, $id)
    {
        $dajare_post = DajarePost::find($id);
        $dajare_post->user_id = $request->user_id;
        $dajare_post->text = $request->text;
        $dajare_post->image = $request->image;
        $dajare_post->save();
        return redirect()->route('dajare_post.index');
    }
    public function destroy($id)
    {
        $dajare_post = DajarePost::find($id);
        $dajare_post->delete();
        return redirect()->route('dajare_post.index');
    }
}
