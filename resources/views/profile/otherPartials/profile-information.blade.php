<!-- Profile/otherPartials/profile-information.blade.php -->
<section class="max-w-full">
    <header class="flex items-center justify-between mt-3 ml-11">
        <h2 class="text-lg font-extrabold text-gray-900 dark:text-gray-100">
            {{ $user->name }} {{ __('のマイページ') }}
        </h2>
    </header>
    
    <!-- Profile image section -->
    <div class="flex mt-10 mb-28 max-w-full">
        <div class="flex flex-col items-center w-1/2 justify-center">
            <img src="{{ asset('storage/' . $user->img_path) }}" alt=""
                class="w-60 h-60 object-cover rounded-full border border-gray-300 dark:border-gray-700">
            <div class="flex mt-10 justify-items-end gap-4">
                <!-- フォロー中、フォロワーのリンク処理も同様に修正 -->
                @if ($follows->isNotEmpty())
                    @foreach($follows as $follow)
                        <a href="{{ route('profile.show', ['userId' => $follow->followed_id]) }}">
                            {{ $follow->followed_id }}<span class="text-gray-500 ml-3">フォロー中</span>
                        </a>
                    @endforeach
                @else
                    <a>0<span class="text-gray-500 ml-3">フォロー中</span></a>
                @endif

                @if($followers->isNotEmpty())
                    @foreach($followers as $follower)
                        <a href="{{ route('profile.show', ['userId' => $follower->follower_id]) }}">
                            {{ $follower->follower_id }}<span class="text-gray-500 ml-3">フォロワー</span>
                        </a>
                    @endforeach
                @else
                    <a>0<span class="text-gray-500 ml-3">フォロワー</span></a>
                @endif
            </div>
        </div>

        <!-- Account information section -->
        <div class="flex-1">
            <!-- 情報を読み取り専用で表示 -->
            <div>
                <x-input-label for="name" :value="__('アカウント名')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                    value="{{ old('name', $user->name) }}" readonly />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
        </div>
    </div>
</section>
