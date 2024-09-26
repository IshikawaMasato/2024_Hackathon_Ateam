<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>防災情報投稿編集</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="body">
        <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="post-container">
                <div class="flex">
                    <div class="flex flex2">
                        <h1>防災情報投稿</h1>
                        <img src="{{ asset('img/icon.png') }}" class="icon" alt="">
                    </div>
                </div>
                @foreach ($posts as $post)
                <div class="picture_frame">
                    <div class="surround">
                        <div class="title">
                            <input type="text" class="input_title" name="title" placeholder="タイトル" value="{{ $post->title }}">
                        </div>
                        <div class="input_message">
                            <textarea class="post-text" name="report" placeholder="　私たちは今とても無事です" required>{{ $post->report }}</textarea>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="flex_section">
                    <div class="upload-section">
                        <input for="imageUpload" type="file" class="upload" name="img_path">
                        <div class="image-preview"></div>
                    </div>
                    <div class="tag-section">
                        <select name="category">
                            <option value="0">全て</option>
                            @foreach($categorys as $category)
                            <option value="{{ $category->id }}">{{ $category->tag_name }}</option>
                            @endforeach
                        </select>
                        <button class="tag-button">＋</button>
                        <button class="tag-button2">－</button>
                    </div>
                </div>
                <div class="button-section">
                    <button class="back-button button">戻る</button>
                    <button class="submit-button button">再投稿</button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>