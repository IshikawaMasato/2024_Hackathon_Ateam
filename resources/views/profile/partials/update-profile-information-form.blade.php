<section class="max-w-full">
    <header class="flex items-center justify-between mt-3 ml-11">
        <h2 class="text-lg font-extrabold text-gray-900 dark:text-gray-100">
            {{ __('マイページ') }}
        </h2>
    </header>
    <!-- Flex container for image and account information -->
    <div class="flex mt-10 mb-28 max-w-full">
        <!-- Profile image section -->
        <div class="flex flex-col items-center w-1/2 justify-center">
            <img src="{{ asset('storage/' . Auth::user()->img_path) }}" alt=""
                class=" w-60 h-60 object-cover rounded-full border border-gray-300 dark:border-gray-700">
            <div class="flex mt-10  justify-items-end gap-4">
                
                @foreach($follows as $follow)
                    <a href="{{ route('profile.follow', ['userId' => $follow->followed_id]) }}">
                        {{ $follow->followed_id }}<span class="text-gray-500 ml-3 pointer-events-none">フォロー中</span>
                    </a>
                @endforeach

                @foreach($followers as $follower)
                    <a href="{{ route('profile.follower') }}">
                        {{ $follower->follower_id }}<span class="text-gray-500 ml-3 pointer-events-none">フォロワー</span>
                    </a>
                @endforeach
            </div>

        </div>
        <!-- Account information section -->
        <div class="flex-1">
            <!-- Unified form for updating profile -->
            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('patch')
                <div>
                    <x-input-label for="name" :value="__('アカウント名')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                        value="{{ old('name', Auth::user()->name) }}" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="email" :value="__('メールアドレス')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                        value="{{ old('email', Auth::user()->email) }}" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- Add image upload field here -->
                <div class="mt-4">
                    <x-input-label for="img_path" :value="__('アカウント画像')" />
                    <input id="img_path" type="file" name="img_path"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                        accept="image/*">
                    <x-input-error :messages="$errors->get('img_path')" class="mt-2" />
                </div>
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('編集') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>

</section>