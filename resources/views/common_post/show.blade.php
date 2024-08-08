@extends('layouts.app')

@section('title', '投稿詳細')

@section('content')
<!-- ダイアログのオーバーレイ -->
<div id="modalOverlay" class="modal-overlay"></div>

<!-- 投稿の作成フォーム -->
<div id="modal" class="modal flex justify-center mb-8 hidden">
    <div class="w-[500px] p-4 rounded border border-deep-purple shadow-lg">
        <h2 class="text-center text-deep-purple text-2xl mb-4">投稿</h2>
        <form action="{{ url('common_post') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="1">
            <div class="flex mb-4 justify-center">
                <textarea id="text" name="text" class="mt-1 block border border-deep-purple rounded h-32 w-[85%]" required placeholder="投稿内容を入力してください"></textarea>
            </div>
            <div class="flex ml-10 text-3xl text-deep-gray">
                <i class="fas fa-image"></i>
            </div>
            <div class="flex justify-center m-8">
                <button type="submit" class="w-24 bg-deep-purple text-white py-2 mr-32 rounded hover:bg-deep-purple-dark hover-fade">投稿する</button>
                <button type="button" id="closeModalBtn" class="w-24 border border-deep-purple text-deep-purple py-2 rounded hover:bg-deep-purple-light hover-fade">キャンセル</button>
            </div>
        </form>
    </div>
</div>
<div class="container mx-auto py-8">
    <div class="flex justify-center">
        <div class="w-[500px] p-4 rounded">
            <div class="border-b pb-4">
                <div class="flex items-start">
                    <!-- プロフィール画像 -->
                    <div class="w-14 h-14 rounded-full mr-4">
                        <img src="{{ asset('images/' . $post->user->profile_image) }}" alt="Profile Image">
                    </div>
                    <div class="flex-1">
                        <div class="text-sm">
                            <span class="text-black font-bold">{{ $post->user->user_name }}</span>
                            <span class="text-deep-gray">@ {{ $post->user->user_id }}</span>
                        </div>
                        <div class="text-lg text-black">{{ $post->text }}</div>
                        <div class="flex items-center mt-2 justify-end">
                            <form action="{{ url('dajare_post/' . $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="text-custom-gray hover:text-custom-red mr-4 hover-fade">
                                    <i class="fas fa-heart"></i>
                                    <span class="ml-1 text-black font-light">0</span>
                                </button>
                            </form>
                            <a href="{{ url('dajare_post/' . $post->id) }}" class="text-custom-gray hover:text-deep-purple mr-4 hover-fade">
                                <i class="fas fa-comment-alt"></i>
                                <span class="ml-1 text-black font-light">0</span>
                            </a>
                            @auth
                            <button type="submit" class="text-custom-gray hover:text-deep-gray hover-fade">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection