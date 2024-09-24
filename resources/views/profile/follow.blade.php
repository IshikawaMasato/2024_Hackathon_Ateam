<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('フォロー欄') }}
        </h2>
    </x-slot>

    <div class="w-4/5 max-h-96 mt-6 mx-auto border border-black overflow-y-scroll">

        @if($follows->isNotEmpty())
            @foreach($follows as $user)
                <a href="{{ route('profile.edit', ['userId' => $user->id]) }}">
                    <div class="max-w-full h-50 mt-2 overflow-hidden border-b border-black">
                        <img src="{{ asset('storage/' . $user->img_path) }}" alt="Profile Image"
                            class="w-10 h-10 object-cover rounded-full">
                        <p>{{ $user->name }}</p>
                    </div>
                </a>
            @endforeach
        @else
            <p class="text-center my-5">現在フォローしてる人はいません</p>
        @endif
    </div>


</x-app-layout>