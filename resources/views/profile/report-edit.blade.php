<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('投稿の編集') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="">
                        <label for="title">タイトル</label>
                        <input type="text" name="title" value="{{ $post->title }}" class="block mt-1 w-full">

                        <label for="content" class="mt-4">内容</label>
                        <textarea name="content" rows="6" class="block mt-1 w-full">{{ $post->content }}</textarea>

                        <label for="image" class="mt-4">画像</label>
                        <input type="file" name="image" class="block mt-1 w-full">
                        @if ($post->image_path)
                            <img src="{{ asset('storage/' . $post->image_path) }}" alt="投稿画像" class="w-32 h-32 object-cover mt-2">
                        @endif

                        <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded">更新</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
