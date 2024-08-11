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
                                    <img src="{{ asset('profile/' . $post->user->profile_image) }}" alt="Profile Image">
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
                                    @if($post->image)
                                    <div class="relative w-full mt-4" style="padding-bottom: 50%;">
                                        <img src="{{ url('post/' . basename($post->image)) }}" alt="投稿画像" class="absolute top-0 left-0 w-full h-full object-cover">
                                    </div>
                                    @endif
                                    <div class="flex items-center mt-2 justify-end">
                                        <form action="{{ route('dajare_post.store', ['user_id' => 1, 'post_id' => $post->id,]) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="text-custom-gray hover:text-custom-red mr-4 hover-fade">
                                                <i class="fas fa-heart"></i>
                                                <span class="ml-1 text-black font-light">{{ \App\Models\Like::countByPostIdDajare($post->id) }}</span>
                                            </button>
                                        </form>
                                        <!-- コメントボタン -->
                                        <a href="#" class="openCommentModalBtn text-custom-gray hover:text-deep-purple mr-4 hover-fade">
                                            <i class="fas fa-comment-alt"></i>
                                            <span class="ml-1 text-black font-light">0</span>
                                        </a>

                                        <!-- コメントの作成フォーム -->
                                        <div class="commentModalOverlay modal-overlay hidden"></div>

                                        <div class="commentModal modal flex justify-center mb-8 hidden">
                                            <div class="w-[300px] sm:w-[500px] p-4 rounded border border-deep-purple shadow-lg">
                                                <h2 class="text-center text-deep-purple text-xl sm:text-2xl mb-4">コメント</h2>
                                                <form action="{{ route('dajare_comment.store', ['post_id' => $post->id, 'text' => old('text')]) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                    <div class="flex mb-4 justify-center">
                                                        <textarea id="text" name="text" class="mt-1 block border border-deep-purple rounded h-32 w-full sm:w-[85%]" required placeholder="コメントを入力してください"></textarea>
                                                    </div>
                                                    <div class="flex mb-4 sm:ml-10 justify-start text-2xl sm:text-3xl text-deep-purple">
                                                        <label for="image-upload" class="cursor-pointer image-icon">
                                                            <i class="fas fa-image"></i>
                                                        </label>
                                                        <input class="image-upload hidden" type="file" name="image" accept="image/*">
                                                    </div>
                                                    <div class="preview relative flex justify-center sm:justify-start mb-4 sm:ml-10"></div>
                                                    <div class="flex flex-col sm:flex-row justify-center sm:m-8 gap-4 sm:gap-6">
                                                        <button type="submit" class="w-full sm:w-24 bg-deep-purple text-white py-2 rounded hover:bg-deep-purple-dark hover-fade">投稿する</button>
                                                        <button type="button" class="closeCommentModalBtn w-full sm:w-24 border border-deep-purple text-deep-purple py-2 rounded hover:bg-deep-purple-light hover-fade">キャンセル</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

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
                                    <img src="{{ asset('profile/' . $post->user->profile_image) }}" alt="Profile Image">
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
                                    @if($post->image)
                                    <div class="relative w-full mt-4" style="padding-bottom: 50%;">
                                        <img src="{{ url('post/' . basename($post->image)) }}" alt="投稿画像" class="absolute top-0 left-0 w-full h-full object-cover">
                                    </div>
                                    @endif
                                    <div class="flex items-center mt-2 justify-end">
                                        <form action="{{ route('common_post.store', ['user_id' => 1, 'post_id' => $post->id,]) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="text-custom-gray hover:text-custom-red mr-4 hover-fade">
                                                <i class="fas fa-heart"></i>
                                                <span class="ml-1 text-black font-light">{{ \App\Models\Like::countByPostId($post->id) }}</span>
                                            </button>
                                        </form>
                                        <!-- コメントボタン -->
                                        <a href="#" class="openCommentModalBtn text-custom-gray hover:text-deep-purple mr-4 hover-fade">
                                            <i class="fas fa-comment-alt"></i>
                                            <span class="ml-1 text-black font-light">0</span>
                                        </a>

                                        <!-- コメントの作成フォーム -->
                                        <div class="commentModalOverlay modal-overlay hidden"></div>

                                        <div class="commentModal modal flex justify-center mb-8 hidden">
                                            <div class="w-[300px] sm:w-[500px] p-4 rounded border border-deep-purple shadow-lg">
                                                <h2 class="text-center text-deep-purple text-xl sm:text-2xl mb-4">コメント</h2>
                                                <form action="{{ route('common_comment.store', ['post_id' => $post->id, 'text' => old('text')]) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                    <div class="flex mb-4 justify-center">
                                                        <textarea id="text" name="text" class="mt-1 block border border-deep-purple rounded h-32 w-full sm:w-[85%]" required placeholder="コメントを入力してください"></textarea>
                                                    </div>
                                                    <div class="flex mb-4 sm:ml-10 justify-start text-2xl sm:text-3xl text-deep-purple">
                                                        <label for="image-upload" class="cursor-pointer image-icon">
                                                            <i class="fas fa-image"></i>
                                                        </label>
                                                        <input class="image-upload hidden" type="file" name="image" accept="image/*">
                                                    </div>
                                                    <div class="preview relative flex justify-center sm:justify-start mb-4 sm:ml-10"></div>
                                                    <div class="flex flex-col sm:flex-row justify-center sm:m-8 gap-4 sm:gap-6">
                                                        <button type="submit" class="w-full sm:w-24 bg-deep-purple text-white py-2 rounded hover:bg-deep-purple-dark hover-fade">投稿する</button>
                                                        <button type="button" class="closeCommentModalBtn w-full sm:w-24 border border-deep-purple text-deep-purple py-2 rounded hover:bg-deep-purple-light hover-fade">キャンセル</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

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
<script src="{{ asset('js/comment/app.js') }}"></script>
@endsection
