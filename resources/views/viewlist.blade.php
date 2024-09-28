@extends('layouts.welcome-layout')
@section('content')
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>防災情報閲覧</title>
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-4">防災情報閲覧</h1>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <form action="/search" class="mb-6">
                @csrf
                <div class="flex space-x-4 mb-4">
                    <div class="flex-1">
                        <input type="text" name="keyword" placeholder="検索" class="w-full p-2 border border-black rounded text-black bg-white">
                    </div>
                    <div class="flex-1">
                        <select name="tag" class="w-full p-2 border border-black rounded text-black bg-white">
                            <option value="0">全て</option>
                            @foreach($categorys as $category)
                            <option value="{{ $category->id }}">{{ $category->tag_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex-1">
                        <input type="date" name="created_at" class="w-full p-2 border border-black rounded text-black bg-white">
                    </div>
                    <div class="flex-1">
                        <button type="submit" class="w-full p-2 border border-black text-black rounded bg-white hover:bg-gray-200 cursor-pointer">検索</button>
                    </div>
                </div>
            </form>
            <div>
            @if(isset($result))
                @foreach($result as $data)
                <p class="mb-2 text-lg font-semibold">{{ $data->report->title }}</p>
                @endforeach
            @endif
            </div>
        </div>

        <div class="mt-6">
            @foreach($items as $item)
                <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
                    <div class="flex justify-between items-center">
                        <p class="text-lg font-semibold text-xl">{{ $item->user->name }}</p>
                        <p class="text-sm text-gray-600">{{ $item->created_at }}</p>
                    </div>
                    <p class="mt-4 text-2xl font-bold">{{ $item->title }}</p> <!-- タイトルの文字サイズを大きく -->
                    <p class="mt-2 text-base">{{ $item->report }}</p> <!-- 投稿内容の文字サイズを調整 -->
                    <div class="mt-4 overflow-hidden">
                        <img src="{{ asset('storage/'.$item->img_path) }}" alt="test画像" class="max-w-[300px] h-auto rounded mx-auto">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
@endsection
