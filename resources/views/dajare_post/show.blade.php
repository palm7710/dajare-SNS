@extends('layouts.app')

@section('title', 'ダジャレ投稿詳細')

@section('content')
<div class="container mx-auto py-8">
    <div class="flex justify-center">
        <div class="w-[500px] p-4 rounded">
            <div class="border-b pb-4">
                <div class="flex items-start">
                    <!-- プロフィール画像 -->
                    <div class="w-12 h-12 rounded-full bg-custom-gray mr-4"></div>
                    <div class="flex-1">
                        <div class="text-sm">
                            <span class="text-black font-bold">ユーザ名</span>
                            <span class="text-deep-gray">@user_ID</span>
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