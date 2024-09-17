<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>防災情報投稿</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <form action="/" method="POST" enctype="multipart/form-data">
        <div class="post-container">
            <div class="profile-section">
                <div class="profile-icon"></div>
                <div class="profile-info">
                    <span>アカウント名</span>
                    <span class="profile">2024/XX/XX</span>
                </div>
            </div>
            <textarea class="post-text"></textarea>
            <div class="flex">
                <div class="upload-section">
                    <input for="imageUpload" type="file" class="upload" >
                        <img name="image"
                            src="img/カメラのアイコン素材 7.png"
                            alt="画像をアップロード"
                            class="upload-icon"  />
                        <button>画像をアップロード</button>
                    </input>
                    <input type="file" id="imageUpload" style="display: none" />
                    <div class="image-preview"></div>
                </div>
                <div class="tag-section">
                    <select class="tag">
                        <option value="">タグを選択してください</option>
                        <option value="tag1">タグ1</option>
                        <option value="tag2">タグ2</option>
                        <option value="tag3">タグ3</option>
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