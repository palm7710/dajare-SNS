@extends('layouts.app')

@section('title', '投稿詳細')

@section('content')
<!-- ダイアログのオーバーレイ -->
<div id="modalOverlay" class="modal-overlay"></div>

<div class="container mx-auto py-8">
    <div class="flex justify-center">
        <div class="w-[500px] p-4 rounded">
            <div class="border-b pb-4">
                <div class="flex items-start">
                    <!-- プロフィール画像 -->
                    <div class="w-14 h-14 rounded-full mr-4">
                        <img src="{{ asset('storage/' . $post->user->profile_image) }}" alt="Profile Image">
                    </div>
                    <div class="flex-1">
                        <div class="text-sm flex items-center justify-between">
                            <div>
                                <span class="text-black font-bold">{{ $post->user->user_name }}</span>
                                <span class="text-deep-gray">@ {{ $post->user->user_id }}</span>
                            </div>
                            <span class="text-deep-gray">
                                {{ $post->updated_at->diffForHumans() }}
                            </span>
                        </div>
                        <div class="text-lg text-black">{{ $post->text }}</div>
                        <div class="flex items-center mt-2 justify-end">
                            <form action="{{ url('common_post/' . $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-custom-gray hover:text-custom-red mr-4 hover-fade">
                                    <i class="fas fa-heart"></i>
                                    <span class="ml-1 text-black font-light">0</span>
                                </button>
                            </form>
                            <a href="{{ url('common_post/' . $post->id) }}" class="text-custom-gray hover:text-deep-purple mr-4 hover-fade">
                                <i class="fas fa-comment-alt"></i>
                                <span class="ml-1 text-black font-light">0</span>
                            </a>
                            @auth
                            <form action="{{ url('common_post/' . $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-custom-gray hover:text-deep-gray hover-fade">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection