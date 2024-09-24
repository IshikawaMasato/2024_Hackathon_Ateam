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
            <img src="{{ asset('storage/' . Auth::user()->img_path) }}" alt="Profile Image"
                class=" w-60 h-60 object-cover rounded-full border border-gray-300 dark:border-gray-700">
            <!-- Moved Image upload form into the main form below -->
            <!-- <label for="img_path" class="cursor-pointer flex items-center mt-4">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v16h16V4H4zM4 8h16M8 4v16m8-12l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
                <span class="text-sm">{{ __('ファイルをアップロード') }}</span>
                <input id="img_path" type="file" name="img_path" class="hidden" accept="image/*">
            </label> -->

            <div class="flex mt-10  justify-items-end gap-4">
                @if ($follows->isNotEmpty())
                    @foreach($follows as $follow)
                        <a href="{{ route('profile.follow', ['userId' => $follow->followed_id]) }}">
                            {{ $follow->followed_id }}<span class="text-gray-500 ml-3 ">フォロー中</span>
                        </a>
                    @endforeach
                @else
                    <!-- もし0人だったときの表示 -->
                    <a href="{{ route('profile.follow', ['userId' => $follow->followed_id = 0])}}">
                        0<span class="text-gray-500 ml-3 ">フォロー中</span>
                    </a>
                @endif

                @if($followers->isNotEmpty())
                    @foreach($followers as $follower)
                        <a href="{{ route('profile.follower', ['userId' => $follower->follower_id]) }}">
                            {{ $follower->follower_id }}<span class="text-gray-500 ml-3">フォロワー</span>
                        </a>
                    @endforeach
                @else
                    <a href="{{ route('profile.follower', ['userId' => $follower->follower_id = 0]) }}">
                        0<span class="text-gray-500 ml-3">フォロワー</span>
                    </a>
                @endif



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