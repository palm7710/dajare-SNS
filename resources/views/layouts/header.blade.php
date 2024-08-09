<header class="border-b border-deep-purple shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-24">
            <!-- 左アイコン（ログインした時だけ表示） -->
            <div class="text-deep-purple text-6xl">
                <i class="fas fa-user-circle"></i>
            </div>

            <!-- 中央ロゴ -->
            <div class="flex justify-center items-center flex-grow">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/jokey_logo.png') }}" class="max-w-xs" alt="Logo">
                </a>
            </div>

            <!-- 右側アイコン（ログインした時だけ表示） -->

            <div id="openModalBtn" class="text-deep-purple text-6xl">
                <i class="far fa-plus-square"></i>
            </div>

            <!-- 投稿の作成フォーム -->
            <div id="modalOverlay" class="modal-overlay"></div>

            <div id="modal" class="modal flex justify-center mb-8 hidden">
                <div class="w-[500px] p-4 rounded border border-deep-purple shadow-lg">
                    <h2 class="text-center text-deep-purple text-2xl mb-4">投稿</h2>
                    <form action="{{ url('common_post') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="1">
                        <div class="flex mb-4 justify-center">
                            <textarea id="text" name="text" class="mt-1 block border border-deep-purple rounded h-32 w-[85%]" required placeholder="投稿内容を入力してください"></textarea>
                        </div>
                        <div class="flex ml-10 text-3xl text-deep-purple">
                            <i class="fas fa-image"></i>
                        </div>
                        <div class="flex justify-center m-8">
                            <button type="submit" class="w-24 bg-deep-purple text-white py-2 mr-32 rounded hover:bg-deep-purple-dark hover-fade">投稿する</button>
                            <button type="button" id="closeModalBtn" class="w-24 border border-deep-purple text-deep-purple py-2 rounded hover:bg-deep-purple-light hover-fade">キャンセル</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>