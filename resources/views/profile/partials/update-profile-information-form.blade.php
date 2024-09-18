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
            <img src="{{ asset('storage/app/public'.Auth::user()->img_path) }}" alt="Profile Image" class="w-40 h-40 rounded-full border border-gray-300 dark:border-gray-700">
            <!-- Image upload form -->
            <form action="{{ route('profile.update_image') }}" enctype="multipart/form-data" class="mt-4">
                @csrf
                <label for="img_path" class="cursor-pointer flex items-center mt-4">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v16h16V4H4zM4 8h16M8 4v16m8-12l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    <span class="text-sm">{{ __('ファイルをアップロード') }}</span>
                    <input id="img_path" type="file" name="img_path" class="hidden" accept="image/*" onchange="this.form.submit()">
                </label>
            </form>
        </div>
        <!-- Account information section -->
        <div class="flex-1">
            <form action="{{ route('profile.update') }}" class="space-y-6">
                @csrf
                <div>
                    <x-input-label for="name" :value="__('アカウント名')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name', Auth::user()->name) }}" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="email" :value="__('メールアドレス')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" value="{{ old('email', Auth::user()->email) }}" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('編集') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('アカウント情報') }}
        </h2>

    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <div class="mt-4 flex items-center">
        <img src="{{ asset('storage/app/public/' . Auth::user()->img_path) }}" alt="Profile Image"
            class="w-16 h-16 rounded-full border border-gray-300 dark:border-gray-700  ">
    </div>



    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <div>
                <x-input-label for="name" :value="__('アカウント名')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="email" :value="__('メールアドレス')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400
                                                     hover:text-gray-900 dark:hover:text-gray-100 rounded-md
                                                      focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500
                                                       dark:focus:ring-offset-gray-800">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('更新する') }}</x-primary-button>

                @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                @endif
            </div>
        </div>
    </form>
</section> -->