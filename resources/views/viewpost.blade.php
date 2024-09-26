@extends('layouts.welcome-layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/viewpost.css') }}">

<h1>防災情報閲覧</h1>
<div class="box">
    <div class="information"></div>
    <div class="view">
        <form action="/search" class="search">
            @csrf
            <input type="text" name="keyword" value="検索" class="keyword">
            <select name="tag" class="keyword">
                <option value="0">全て</option>
                @foreach($categorys as $category)
                    <option value="{{ $category->id }}">{{ $category->tag_name }}</option>
                @endforeach
            </select>
            <input type="datetime-local" name="created_at" class="keyword">
            <input type="submit" value="検索" class="keyword">
        </form>
        <div>
            @if(isset($result))
                @foreach($result as $data)
                    <p>{{$data->report->title}}</p>
                @endforeach
            @endif
        </div>

        @foreach($items as $item)
            <div class="item">
                <p>アカウント名</p>
                <p class="data">{{$item->created_at}}</p>
                <div class="button">
                    <a href="{{ route('follow', ['id' => $item->id]) }}" id="follow">フォロー</a>
                    <a href="{{ route('delete_follow', ['id' => $item->id]) }}">フォロー削除</a>
                </div>
            </div>
            <p>{{$item->title}}</p>
            <p>{{$item->report}}</p>
            <p>ここにタグがでるよ:
                @foreach($item->tag as $tag)
                    {{$tag->tag_name}}
                @endforeach
            </p>
            <div>
                <img src="{{ asset('storage/app/public/'.$item->img_path) }}" alt="test画像">
            </div>
            <a href="{{ route('reactions', ['id' => $item->id]) }}">いいね!</a>
            <a href="{{ route('delete_reactions', ['id' => $item->id]) }}">いいね削除</a>

            @foreach($item->comments as $comment)
                <p>これがコメント{{$comment->comment}}</p>
            @endforeach

            <a href="{{ route('delete', ['id' => $item->id]) }}">削除</a>
            <div class="border"></div>
        @endforeach
    </div>
</div>
@endsection

@push('css')
    <!-- ページ固有のCSSを追加 -->
    <link rel="stylesheet" href="{{ asset('css/viewpost.css') }}">
@endpush
