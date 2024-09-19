<section>
    <header class="font-semibold mt-3 ml-11">
        {{ __('投稿一覧') }}
    </header>

    <div class="w-4/5 max-h-96 mt-6 mx-auto border border-black overflow-y-scroll">
        @foreach ($posts as $post)
        <div class="max-w-full h-50 mt-2 overflow-hidden border-b border-black">
            <div>
                <input class="w-60 border-none" type="text" name="title" value="{{ $post->title }}" readonly>
                <input class="border-none" type="text" name="date" value="{{ $post->created_at->format('Y/m/d') }}" readonly>
            </div>
            <div>
                <textarea class="font-normal text-base max-w-full resize-none border-none" name="content" rows="5" cols="70" readonly>{{ $post->content }}</textarea>
            </div>
            <div>
                <img src="{{ asset('storage/' . $post->image_path) }}" alt="投稿画像" class="w-32 h-32 object-cover">
            </div>
            <div class="max-w-full mr-2 ml-auto flex justify-end">
                <a href="{{ route('profile.edit', $post->id) }}" class="mr-6 mb-3 px-3 py-1 border border-black rounded-lg bg-slate-300 cursor-pointer hover:opacity-80">編集</a>
                <form action="{{ route('profile.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input class="mb-3 px-3 py-1 border border-black rounded-lg text-white bg-red-600 cursor-pointer hover:opacity-80" type="submit" value="削除">
                </form>
            </div>
        </div>
        @endforeach
    </div>
</section>
