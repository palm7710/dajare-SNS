@extends('layouts.app')

@section('title', 'ダジャレポスト詳細')

@section('content')
<div class="container mx-auto py-8">
    <div class="w-full max-w-lg mx-auto bg-white shadow-lg rounded-lg p-4">
        <h2 class="text-xl font-bold mb-4">ダジャレポスト詳細</h2>
        <p class="mb-4">{{ $dajare_post->text }}</p>

        <!-- 編集フォーム -->
        <form action="{{ route('dajare_posts.update', $dajare_post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <textarea name="text" class="mt-1 block w-full border border-deep-purple rounded h-32 text-lg" required>{{ $dajare_post->text }}</textarea>
            </div>
            <button type="submit" class="w-full bg-deep-purple text-white py-2 rounded">更新する</button>
        </form>

        <!-- 削除フォーム -->
        <form action="{{ route('dajare_posts.destroy', $dajare_post->id) }}" method="POST" class="mt-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-full bg-red-600 text-white py-2 rounded">削除する</button>
        </form>
    </div>
</div>
@endsection