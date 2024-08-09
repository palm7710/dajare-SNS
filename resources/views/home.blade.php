@extends('layouts.app')

@section('title', 'HOME')

@section('content')
<div>
    <div class="container mx-auto py-8">
        <div class="flex justify-center mb-4">
            <button class="toggle-section border border-deep-purple text-deep-purple w-[250px] px-4 py-2 rounded-full mr-8 hover-fade" data-section="dajare">
                ダジャレ
            </button>
            <button class="toggle-section border border-deep-purple text-deep-purple w-[250px] px-4 py-2 rounded-full hover-fade" data-section="common">
                投稿一覧
            </button>
        </div>

        <!-- ダジャレ投稿一覧の表示 -->
        @if(isset($dajarePosts) && $dajarePosts->isNotEmpty())
        <div id="dajare-posts" class="flex justify-center">
            <div class="w-[500px] p-4 rounded">
                <ul class="space-y-4">
                    @foreach ($dajarePosts as $post)
                    <a href="{{ route('dajare_post.show', $post->id) }}">
                        <li class="border-b pb-4">
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
                                        @if (Auth::user()->id === $post->user_id)
                                        <form action="{{ url('dajare_post/' . $post->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-custom-gray hover:text-deep-gray hover-fade">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                        @endif
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </li>
                    </a>
                    @endforeach
                </ul>

                <!-- ダジャレ投稿のページネーション -->
                <div class="flex justify-center m-8">
                    {{ $dajarePosts->appends(['section' => 'dajare'])->links('vendor.pagination.bootstrap-4') }}

                </div>
            </div>
        </div>
        @else
        <p>ダジャレ投稿はまだありません。</p>
        @endif

        <!-- 普通の投稿一覧の表示 -->
        @if(isset($commonPosts) && $commonPosts->isNotEmpty())
        <div id="common-posts" class="flex justify-center">
            <div class="w-[500px] p-4 rounded">
                <ul class="space-y-4">
                    @foreach ($commonPosts as $post)
                    <a href="{{ route('common_post.show', $post->id) }}">
                        <li class="border-b pb-4">
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
                                        @if (Auth::user()->id === $post->user_id)
                                        <form action="{{ url('common_post/' . $post->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-custom-gray hover:text-deep-gray hover-fade">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                        @endif
                                        @endauth

                                    </div>
                                </div>
                            </div>
                        </li>
                    </a>
                    @endforeach
                </ul>

                <!-- 普通の投稿のページネーション -->
                <div class="flex justify-center m-8">
                    {{ $commonPosts->appends(['section' => 'common'])->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
        @else
        <p>普通の投稿はまだありません。</p>
        @endif
    </div>
</div>
@endsection