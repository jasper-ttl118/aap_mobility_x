
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form class="w-[70%] 2xl:h-[80%] flex flex-col justify-center items-center gap-3" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="flex flex-row text-[20px] lg:text-[30px] text-[#151847] font-black justify-start w-full">
            Login
        </div>

        <!-- Username-->
        <div class="w-full flex flex-col justify-center items-center">
            {{-- <x-input-label for="user_name" :value="__('Username')" /> --}}
            <div class="flex flex-row w-full justify-center items-center gap-0 ">
                <div class="bg-[#f3f4f6] border-r-2 border-[#dedede] z-10 rounded-md shadow-lg h-full w-[10%] justify-center items-center flex">
                    <x-image-input image="contacts.png"/>
                </div>
                <x-text-input id="user_name" class="block w-full" type="text" name="user_name" placeholder="Username" :value="old('user_name')" required autofocus autocomplete="username" />
            </div>
            <div class="flex w-full">
            <x-input-error :messages="$errors->get('user_name')" class="mt-2" />
            </div>
        </div>

        <!-- Password -->
        <div class="w-full flex flex-col justify-center items-center">
            {{-- <x-input-label for="password" :value="__('Password')" /> --}}
            <div class="flex flex-row w-full justify-center items-center">
                 <div class="bg-[#f3f4f6] border-r-2 border-[#dedede] z-10 rounded-md shadow-lg h-full w-[10%] justify-center items-center flex ">
                    <x-image-input image="lock.png"/>
                </div>
                <x-text-input id="password" class="block w-full"
                                placeholder="Password"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>
           <div class="flex w-full">
               <x-input-error :messages="$errors->get('password')" class="mt-2 flex justify-start items-start" />
           </div>
    
        </div>

        {{-- <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div> --}}

        <div class="text-xs text-[#151847] font-extralight justify-start w-full">
            Forgot password?
        </div>

        <div class="flex items-center justify-center w-full">
            {{-- @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif --}}

            <x-primary-button class="w-full flex justify-center items-center">
                {{ __('Login') }}
            </x-primary-button>
        </div>
    </form>
    
</x-guest-layout>
