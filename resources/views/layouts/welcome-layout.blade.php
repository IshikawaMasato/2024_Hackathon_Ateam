<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('css')
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="flex flex-col min-h-screen">
        <header class="bg-white shadow">
            <div class="container mx-auto px-4 py-4 flex justify-between items-center">
                <h1 class="text-xl font-bold">防災掲示板</h1>
                <nav>
                    @if (Route::has('login'))
                        <div class="flex space-x-4">
                            @auth
                                <!-- プルダウンメニュー -->
                                <div x-data="{ open: false }" class="relative">
                                    <button @click="open = !open" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                                        メニュー
                                    </button>
                                    <!-- プルダウンの内容 -->
                                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-auto bg-white border border-gray-200 rounded shadow-lg">
                                        <div class="flex flex-col">
                                            <a href="{{ route('bulletin.auth') }}" class="block text-center px-4 py-2 text-gray-700 hover:bg-gray-100 flex-1">
                                                投稿
                                            </a>
                                            <a href="{{ route('profile.edit') }}" class="block text-center px-4 py-2 text-gray-700 hover:bg-gray-100 flex-1">
                                                プロフィール
                                            </a>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="w-full text-center block px-4 py-2 text-gray-700 hover:bg-gray-100 flex-1">
                                                    ログアウト
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <!-- ログインページへのリンク -->
                                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
                                @if (Route::has('register'))
                                    <!-- 登録ページへのリンク -->
                                    <a href="{{ route('register') }}" class="text-blue-600 hover:underline ml-4">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </nav>
            </div>
        </header>

        <main class="flex-grow container mx-auto px-4 py-6">
            @yield('content')
        </main>

        <footer class="bg-white text-center py-4">
            <p class="text-gray-600">© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </footer>
    </div>

    <!-- Alpine.js for handling dropdown logic -->
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
