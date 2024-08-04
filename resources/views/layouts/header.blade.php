<header class="border-b border-deep-purple shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-24">
            <!-- 左アイコン（ログインした時だけ表示） -->
            @auth
            <div class="text-deep-purple text-6xl">
                <i class="fas fa-user-circle"></i>
            </div>
            @else
            <div class="w-6"></div>
            @endauth

            <!-- 中央ロゴ -->
            <div class="flex justify-center items-center flex-grow">
                <a href="/" class="text-deep-purple text-3xl font-bold">Dajare SNS</a>
            </div>

            <!-- 右側アイコン（ログインした時だけ表示） -->
            @auth
            <div class="text-deep-purple text-6xl">
                <i class="far fa-plus-square"></i>
            </div>
            @else
            <div class="w-6"></div>
            @endauth
        </div>
    </div>
</header>