@extends('layouts.app')

@section('title', 'HOME')

@section('content')
<div>
    <div class="container mx-auto py-8">
        <div class="flex justify-center mb-4">
            <button class="toggle-section border border-deep-purple bg-deep-purple text-white w-[250px] px-4 py-2 mr-8 rounded-full hover:bg-white hover:text-deep-purple hover-fade" data-section="dajare">
                ダジャレ
            </button>
            <button class="toggle-section border border-deep-purple text-deep-purple w-[250px] px-4 py-2 rounded-full hover:bg-deep-purple hover:text-white hover-fade" data-section="common">
                投稿一覧
            </button>
        </div>

        <!-- 投稿の作成フォーム -->
        <div class="flex justify-center mb-8">
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
                        <button type="submit" class="w-24 bg-deep-purple text-white py-2 mr-32 rounded hover-fade">投稿する</button>
                        <button type="submit" class="w-24 border border-deep-purple text-deep-purple py-2 rounded hover-fade">キャンセル</button>
                    </div>
                </form>
            </div>
        </div>


        <!-- ダジャレ投稿一覧の表示 -->
        <div id="dajare-posts" class="flex justify-center hidden">
            <div class="w-[500px] p-4 rounded">
                <ul class="space-y-4">
                    @foreach ($dajare_posts as $post)
                    <li class="border-b pb-4">
                        <div class="flex items-start">
                            <!-- プロフィール画像 -->
                            <div class="w-12 h-12 rounded-full bg-custom-gray mr-4"></div>
                            <div class="flex-1">
                                <div class="text-sm">
                                    <span class="text-black font-bold">ユーザ名　</span>
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
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- 普通の投稿一覧の表示 -->
        <div id="common-posts" class="flex justify-center hidden">
            <div class="w-[500px] p-4 rounded">
                <ul class="space-y-4">
                    @foreach ($common_posts as $post)
                    <li class="border-b pb-4">
                        <div class="flex items-start">
                            <!-- プロフィール画像 -->
                            <div class="w-12 h-12 rounded-full bg-custom-gray mr-4"></div>
                            <div class="flex-1">
                                <div class="text-sm">
                                    <span class="text-black font-bold">ユーザ名　</span>
                                    <span class="text-deep-gray">@user_ID</span>
                                </div>
                                <div class="text-lg text-black">{{ $post->text }}</div>
                                <div class="flex items-center mt-2 justify-end">
                                    <form action="{{ url('common_post/' . $post->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="text-custom-gray hover:text-custom-red mr-4 hover-fade">
                                            <i class="fas fa-heart"></i>
                                            <span class="ml-1 text-black font-light">0</span>
                                        </button>
                                    </form>
                                    <a href="{{ url('common_post/' . $post->id) }}" class="text-custom-gray hover:text-deep-purple mr-4 hover-fade">
                                        <i class="fas fa-comment-alt"></i>
                                        <span class="ml-1 text-black font-light">0</span>
                                    </a>
                                    @method('DELETE')
                                    <button type="submit" class="text-custom-gray hover:text-deep-gray hover-fade">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- ページネーション -->
        <div class="flex justify-center m-8">
            <div class="flex space-x-10">
                <button class="border border-deep-purple text-deep-purple w-10 h-10 rounded-full hover:bg-deep-purple hover:text-white hover-fade">&lt;</button>
                <button class="text-deep-purple font-light w-10 h-10 rounded-full hover:bg-light-purple hover:text-white hover-fade">1</button>
                <button class="text-deep-purple font-light w-10 h-10 rounded-full hover:bg-light-purple hover:text-white hover-fade">2</button>
                <button class="text-deep-purple font-light w-10 h-10 rounded-full hover:bg-light-purple hover:text-white hover-fade">3</button>
                <button class="text-deep-purple font-light w-10 h-10 rounded-full hover:bg-light-purple hover:text-white hover-fade">4</button>
                <button class="text-deep-purple font-light w-10 h-10 rounded-full hover:bg-light-purple hover:text-white hover-fade">5</button>
                <button class="border border-deep-purple text-deep-purple w-10 h-10 rounded-full hover:bg-deep-purple hover:text-white hover-fade">&gt;</button>
            </div>
        </div>
    </div>
</div>
@endsection