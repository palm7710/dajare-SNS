<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'deep-purple': '#6D4584', // 濃い紫
                        'light-purple': '#AF8CA2', // 薄い紫
                        'custom-gray': '#D9D9D9', // グレー
                        'deep-gray': 'rgba(0, 0, 0, 0.5)', //濃いグレー
                        'dialog-gray': 'rgba(199, 199, 199, 0.5)', // ダイアログの背景色
                        'custom-red': '#C62926', // 赤
                        'black': '#000000', // 黒
                        'white': '#ffffff', // 白
                    },
                },
            },
        }
    </script>

    <!-- Font Awesome -->
    <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">
</head>

<body>
    <!-- ヘッダー部分の表示 -->
    <header>
        @include('layouts.header')
    </header>

    <!-- メインコンテンツ部分の表示 -->
    <main>
        @yield('content')
    </main>

    <!-- js -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>