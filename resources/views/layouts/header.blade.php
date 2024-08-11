<header class="border-b border-deep-purple shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-24">
            <!-- 左アイコン（ログインした時だけ表示） -->
            <!-- 左アイコン（ログインした時だけ表示） -->
            <div class="text-deep-purple text-4xl sm:text-6xl">
                @guest
                <a href="{{ route('login') }}">
                    <i class="fas fa-user-circle cursor-pointer"></i>
                </a>
                @endguest
                @auth
                <div id="openProfileModal" class="w-14 h-14 rounded-full">
                    <img src="{{ Auth::user()->profile_image }}" class="cursor-pointer" />
                </div>

                @endauth
            </div>

            <!-- メニューのダイアログ -->
            <div id="profileModalOverlay" class="modal-overlay hidden"></div>

            <div id="profileModal" class="modal hidden sm:top-[15%] sm:left-[17%]">
                <div class="w-[350px] p-4 rounded border border-deep-purple shadow-lg">
                    <div class="flex flex-col items-start space-y-4">
                        <span class="text-deep-purple hover:text-light-purple text-left">
                            <a href="{{ url('/') }}">ホーム</a>
                        </span>
                        <span class="text-deep-purple hover:text-light-purple text-left">
                            <a href="{{ url('/profile') }}">プロフィール</a>
                        </span>
                        <span class="text-deep-purple hover:text-light-purple text-left" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            ログアウト
                        </span>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                    <button id="closeProfileModal" class="absolute top-4 right-4 text-deep-purple hover:text-light-purple">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>


            <!-- 中央ロゴ -->
            <div class=" flex justify-center items-center flex-grow">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/jokey_logo.png') }}" class="max-w-xs" alt="Logo">
                </a>
            </div>

            <!-- 右側アイコン（ログインした時だけ表示） -->
            <div id="openPostModalBtn" class="text-deep-purple text-4xl sm:text-6xl">
                <i class="far fa-plus-square"></i>
            </div>

            <!-- 投稿の作成フォーム -->
            <div id="postModalOverlay" class="modal-overlay hidden"></div>

            <div id="postModal" class="modal flex justify-center mb-8 hidden">
                <div class="w-[300px] sm:w-[500px] p-4 rounded border border-deep-purple shadow-lg">
                    <h2 class="text-center text-deep-purple text-xl sm:text-2xl mb-4">投稿</h2>
                    <form action="/posts" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="1">
                        <div class="flex mb-4 justify-center">
                            <textarea id="text" name="text" class="mt-1 block border border-deep-purple rounded h-32 w-full sm:w-[85%]" required placeholder="投稿内容を入力してください"></textarea>
                        </div>
                        <div class="flex mb-4 sm:ml-10 justify-start text-2xl sm:text-3xl text-deep-purple">
                            <label for="image-upload" class="cursor-pointer" id="image-icon">
                                <i class="fas fa-image"></i>
                            </label>
                            <input id="image-upload" type="file" name="image" class="hidden" accept="image/*">
                        </div>
                        <div id="preview" class="relative flex justify-center sm:justify-start mb-4 sm:ml-10"></div>
                        <div id="closePostModalBtn" class="flex flex-col sm:flex-row justify-center sm:m-8 gap-4 sm:gap-6">
                            <button type="submit" class="w-full sm:w-24 bg-deep-purple text-white py-2 mr-32 rounded hover:bg-deep-purple-dark hover-fade">投稿する</button>
                            <button type="button" class="w-full sm:w-24 border border-deep-purple text-deep-purple py-2 rounded hover:bg-deep-purple-light hover-fade">キャンセル</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
