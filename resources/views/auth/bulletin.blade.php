<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>防災情報投稿</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
        <div class="post-container">
            <h1>防災情報投稿</h1>
            <div class="profile-section">
                <div class="profile-icon"></div>
                <div class="profile-info">
                    <span>アカウント名</span>
                    <span class="profile">2024/XX/XX</span>
                </div>
                <div class="title">
                    <input type="text" placeholder="タイトル">
                </div>
            </div>
            <textarea class="post-text"></textarea>
            <div class="flex">
                <div class="upload-section">
                    <input for="imageUpload" type="file" class="upload">
                    <input type="file" id="imageUpload" style="display: none" />
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
                <button class="back-button">戻る</button>
                <button class="submit-button">投稿</button>
            </div>
        </div>
    </form>
</body>

</html>