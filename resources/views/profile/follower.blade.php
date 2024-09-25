<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('フォロワー欄') }}
        </h2>
    </x-slot>

    <div class="w-4/5 max-h-96 mt-6 mx-auto border border-black overflow-y-scroll">

        @if($followers->isNotEmpty())
            @foreach($followers as $follower)
                <a href="{{ route('profile.edit', ['userId' => $follower->id]) }}">
                    <div class="max-w-full h-50 mt-2 overflow-hidden border-b border-black">
                        <img src="{{ asset('storage/' . $follower->img_path) }}" alt="Profile Image"
                            class="w-10 h-10 object-cover rounded-full">
                        <p>{{ $follower->name }}</p>
                    </div>
                </a>
            @endforeach
        @else

            <p class="text-center my-5">{{ __('現在フォロワーはいません') }}</p>
        @endif
    </div>

</x-app-layout>