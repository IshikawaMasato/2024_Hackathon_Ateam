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
<p class="data">{{$item -> created_at}}</p>

</div>
<p>{{$item -> title }}</p>
<p>{{$item -> report }}</p>
<div>
    <img src="{{ asset('storage/'.$item->img_path)}}" alt="test画像">
</div>
<div class="border"></div>
@endforeach
</div>


</div>
