<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>一覧画面</h1>
    @foreach ($reports as $auth)
    <img src="{{ Storage::url($auth->img_path) }}" width="25%">
    @endforeach
</body>

</html>