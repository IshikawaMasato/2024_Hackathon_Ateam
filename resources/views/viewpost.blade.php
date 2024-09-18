<h1>防災情報閲覧</h1>
<form action="/search">
    @csrf
    <input type="text" name="keyword">
    <select name="category">
        <option value="0">全て</option>
        @foreach($categorys as $category)
            <option value="{{ $category->id }}">{{ $category->tag_name }}</option>
        @endforeach
    </select>
    <input type="datetime-local" name="created_at">
    <input type="submit" value="検索">
</form>
@foreach($items as $item)
<p>アカウント名</p>
<p>{{$item -> title }}</p>
<p>{{$item -> report }}</p>

<div>
    <img src="{{ asset('storage/app/public/'.$item->img_path)}}" alt="test画像">
</div>

<a href="{{ route('delete', ['id' => $item->id]) }}">削除</a>
@endforeach
