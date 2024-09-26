<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>防災情報投稿編集</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <form action="{{ route('reports.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required>
        </div>

        <div class="form-group">
            <label for="report">Report</label>
            <textarea class="form-control" id="report" name="report" required>{{ old('report', $post->report) }}</textarea>
        </div>

        <div class="form-group">
            <label for="img_path">Image</label>
            <input type="file" class="form-control" id="img_path" name="img_path">
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category" required>
                @foreach($categorys as $category)
                    <option value="{{ $category->id }}">{{ $category->tag_name }}</option>
                @endforeach 
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Report</button>
    </form>
</div>
