<link rel="stylesheet" href="{{ asset('css/viewpost.css') }}">

<h1>防災情報閲覧</h1>
<div class="view">
<form action="/search" class="search">
    @csrf
    <input type="text" name="keyword" value="検索" class="keyword">
    <select name="category" class="keyword">
        <option value="0">全て</option>
        @foreach($categorys as $category)
            <option value="{{ $category->id }}">{{ $category->tag_name }}</option>
        @endforeach
    </select>
    <input type="datetime-local" name="created_at" class="keyword">
    <input type="submit" value="検索" class="keyword">
</form>
@foreach($items as $item)
<div class="follow">
<p>アカウント名</p>
<button>フォロー</button>
</div>
<p>{{$item -> title }}</p>
<p>{{$item -> report }}</p>

<div>
    <img src="{{ asset('storage/app/public/'.$item->img_path)}}" alt="test画像">
</div>

<a href="{{ route('delete', ['id' => $item->id]) }}">削除</a>
@endforeach
</div>
