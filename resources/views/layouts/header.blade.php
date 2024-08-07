<header class="border-b border-deep-purple shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-24">
            <!-- 左アイコン（ログインした時だけ表示） -->
            @auth
            <div class="text-deep-purple text-6xl">
                <i class="fas fa-user-circle"></i>
            </div>
            @endauth

            <!-- 中央ロゴ -->
            <div class="flex justify-center items-center flex-grow">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/jokey_logo.png') }}" class="max-w-xs" alt="Logo">
                </a>
            </div>

            <!-- 右側アイコン（ログインした時だけ表示） -->
            @auth
            <div id="openModalBtn" class="text-deep-purple text-6xl">
                <i class="far fa-plus-square"></i>
            </div>
            @endauth
        </div>
    </div>
</header>