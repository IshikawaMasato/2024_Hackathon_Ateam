<section>
    <header class="font-semibold mt-3 ml-11 text-gray-800">
        {{ __('投稿一覧') }}
    </header>

    @if (session('success'))
        <div class="alert alert-success text-green-600">
            {{ session('success') }}
        </div>
    @endif

    <div class="w-4/5 max-h-96 mt-6 mx-auto border border-gray-300 overflow-y-scroll bg-gray-800 text-white">
    @if ($posts->isEmpty())
        <p class="text-center my-5 text-gray-300">現在は投稿がありません</p>
    @else
        @foreach ($posts as $post)
            <div class="max-w-full h-50 mt-2 overflow-hidden border-b border-gray-600">
                <div class="flex justify-between items-center">
                    <p class="w-60 text-white">{{ $post->title }}</p>
                    <p class="text-gray-400">{{ $post->created_at->format('Y/m/d') }}</p>
                </div>
                <div>
                    <textarea class="font-normal text-base max-w-full resize-none border-none bg-gray-800 text-white" name="content" rows="5" cols="70" readonly>{{ $post->report }}</textarea>
                </div>

                <div class="image-container" data-image-url="{{ asset('storage/' . $post->image_path) }}">
                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="投稿画像" class="w-32 h-32 object-cover">
                </div>

                <div class="max-w-full mr-2 ml-auto flex justify-end">
                    <a href="{{ route('auth.editbulletin',['id'=>$post->id]) }}" class="mr-6 mb-3 px-3 py-1 border border-gray-600 rounded-lg bg-gray-700 text-white cursor-pointer hover:opacity-80">編集</a>
                    <a href="{{ route('posts.destroy', ['id' => $post->id]) }}" class="mr-6 mb-3 px-3 py-1 border border-gray-600 rounded-lg bg-red-700 text-white cursor-pointer hover:opacity-80">削除</a>
                </div>
            </div>
        @endforeach
    @endif
</div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const imageContainers = document.querySelectorAll('.image-container');

        imageContainers.forEach(container => {
            const imageUrl = container.getAttribute('data-image-url');
            const img = container.querySelector('img');

            // 画像が正常に読み込まれなかった場合
            img.onerror = function() {
                container.remove(); // <div>を削除
            };

            // 初期チェックとして画像の存在を確認
            fetch(imageUrl, { method: 'HEAD' })
                .then(response => {
                    if (!response.ok) {
                        container.remove(); // <div>を削除
                    }
                })
                .catch(error => {
                    console.error('Error checking image:', error);
                    container.remove(); // <div>を削除
                });
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        const imageContainers = document.querySelectorAll('.image-container');

        imageContainers.forEach(container => {
            const imageUrl = container.getAttribute('data-image-url');
            const img = container.querySelector('img');

            // 画像が正常に読み込まれなかった場合
            img.onerror = function() {
                container.remove(); // <div>を削除
            };

            // 初期チェックとして画像の存在を確認
            fetch(imageUrl, { method: 'HEAD' })
                .then(response => {
                    if (!response.ok) {
                        container.remove(); // <div>を削除
                    }
                })
                .catch(error => {
                    console.error('Error checking image:', error);
                    container.remove(); // <div>を削除
                });
        });
    });
</script>
