<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Followers') }}
        </h2>
    </x-slot>

    <div class="w-4/5 max-h-96 mt-6 mx-auto border border-black overflow-y-scroll">
        @if($followers->isNotEmpty())
            @foreach($followers as $follower)
                <!-- 他ユーザーのプロフィールに遷移するために profile.otherUser を使用 -->
                <a href="{{ route('profile.otherUser', ['userId' => $follower->id]) }}">
                    <div class="max-w-full h-50 mt-2 overflow-hidden flex items-center">
                        <img src="{{ asset('storage/' . $follower->img_path) }}" alt="Profile Image"
                             class="w-10 h-10 object-cover rounded-full ml-2">
                        <p class="w-full text-center text-3xl flex justify-center">{{ $follower->name }}</p>
                    </div>
                </a>
            @endforeach
        @else
            <p class="text-center my-5">{{ __('You have no followers.') }}</p>
        @endif
    </div>
</x-app-layout>
