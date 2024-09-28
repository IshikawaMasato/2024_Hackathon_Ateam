@extends('layouts.welcome-layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<h1 class="text-3xl font-bold text-center my-8">防災情報閲覧</h1>
<div class="container mx-auto p-4 flex">
    <!-- 左のサイドバー -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-6" style="width: 350px;">
        @if(isset($data))
            <h2 class="text-2xl font-semibold mb-4">岩手県内陸部の天気予報</h2>
            <p class="mb-2">{{ $data['headlineText'] }}</p>
            <p>{{ $data['text'] }}</p>
        @endif
    </div>

    <!-- メインコンテンツ -->
    <div class="bg-white shadow-md rounded-lg p-6 w-1/4 ml-4">
        <form action="/search" class="mb-6 flex items-center space-x-4">
            @csrf
            <div class="mb-4 flex-1">
                <input type="text" name="keyword" placeholder="キーワードを入力" class="w-full p-2 border border-black rounded text-black">
            </div>
            <div class="mb-4 flex-1">
                <select name="tag" class="w-full p-2 border border-black rounded text-black">
                    <option value="0">全て</option>
                    @foreach($categorys as $category)
                        <option value="{{ $category->id }}">{{ $category->tag_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4 flex-1">
                <input type="date" name="created_at" class="w-full p-2 border border-black rounded text-black">
            </div>
            <div class="mb-4 flex-1">
                <input type="submit" value="検索" class="w-full bg-blue-500 text-black border border-black p-2 rounded cursor-pointer hover:bg-blue-600">
            </div>
        </form>
        <div>
            @if(isset($result))
                @foreach($result as $data)
                    <p class="mb-2">{{$data->report->title}}</p>
                @endforeach
            @endif
        </div>

        @foreach($items as $item)
            <div class="bg-gray-100 p-4 rounded-lg mb-4">
                <div class="flex justify-between items-center mb-2">
                    <p class="font-semibold">{{ $item->user->name }}</p>
                    <p class="text-sm text-gray-600">{{$item->created_at}}</p>
                </div>
                <div class="flex justify-end mb-2">
                    <a href="{{ route('follow', ['id' => $item->id]) }}" class="text-blue-500 hover:underline mr-2">フォロー</a>
                    <a href="{{ route('delete_follow', ['id' => $item->id]) }}" class="text-red-500 hover:underline">フォロー削除</a>
                </div>
                <p class="font-bold text-lg mb-2">{{$item->title}}</p>
                <p class="mb-2">{{$item->report}}</p>
                <div class="mb-2">
                    <img src="{{ asset('storage/'.$item->img_path) }}" alt="test画像" class="w-full h-auto rounded">
                </div>
                <div class="flex justify-end mb-2">
                    <a href="{{ route('reactions', ['id' => $item->id]) }}" class="text-blue-500 hover:underline mr-2">いいね!</a>
                    <a href="{{ route('delete_reactions', ['id' => $item->id]) }}" class="text-red-500 hover:underline">いいね削除</a>
                </div>
                @foreach($item->comments as $comment)
                    <p class="mb-2">これがコメント{{$comment->comment}}</p>
                @endforeach
                <!-- <div class="flex justify-end">
                    <a href="{{ route('delete', ['id' => $item->id]) }}" class="text-red-500 hover:underline">削除</a>
                </div> -->
                <div class="border-t mt-4 pt-4"></div>
            </div>
        @endforeach
    </div>
</div>
@endsection
