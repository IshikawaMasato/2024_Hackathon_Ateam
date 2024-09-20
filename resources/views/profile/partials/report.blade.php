<section>
    <header class="font-semibold mt-3 ml-11">
        {{ __('投稿一覧') }}
    </header>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="w-4/5 max-h-96 mt-6 mx-auto border border-black overflow-y-scroll">
        @if ($posts->isEmpty())
            <p class="text-center my-5">現在は投稿がありません</p>
        @else
            @foreach ($posts as $post)
                <div class="max-w-full h-50 mt-2 overflow-hidden border-b border-black">
                    <div>
                        <input class="w-60 border-none focus:outline-none" type="text" name="title" value="{{ $post->title }}"
                            readonly>
                        <input class="border-none" type="text" name="date" value="{{ $post->created_at->format('Y/m/d') }}"
                            readonly>
                    </div>
                    <div>
                        <textarea class="font-normal text-base max-w-full resize-none border-none" name="content" rows="5"
                            cols="70" readonly>{{ $post->report }}</textarea>
                    </div>

                    <div class="image-container" data-image-url="{{ asset('storage/' . $post->image_path) }}">
                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="投稿画像" class="w-32 h-32 object-cover">
                    </div>


                    <div class="max-w-full mr-2 ml-auto flex justify-end">
                        <a href="{{ route('profile.edit', $post->id) }}"
                            class="mr-6 mb-3 px-3 py-1 border border-black rounded-lg bg-slate-300 cursor-pointer hover:opacity-80">編集</a>
                        <a href="{{ route('posts.destroy', ['id' => $post->id]) }}"
                            class="mr-6 mb-3 px-3 py-1 border border-black rounded-lg bg-slate-300 cursor-pointer hover:opacity-80">削除</a>
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
</script>
