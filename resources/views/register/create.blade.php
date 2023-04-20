<x-firstLayout>
    <div class='mb-56 mt-43  ml-16 mr-16 lg:ml-108 lg:flex lg:justify-between lg:mr-0'>
        <div class="flex flex-col lg:w-392 lg:mt-56">
            <div>
                <h1 class="text-dark-black font-bold text-xl lg:text-2xl">{{ __('register.title') }}</h1>
                <p class="mt-8 text-gray font-normal text-base lg:text-xl">{{ __('register.body') }}</p>
            </div>
            <form method="POST" action="#" class="mt-24">
                @csrf
                <div class="flex flex-col">
                    <label for="username" class="mb-8 text-sm font-bold text-dark-black lg:text-base">
                        {{ __('register.username') }}
                    </label>
                    <div
                        class="flex justify-between items-center @if ($errors->has('username')) border-red @elseif(old('username')) border-bggreen @else border-light-gray @endif focus-within:shadow-custom focus-within:border-bl lg:h-56 py-18 pl-24 rounded-lg border-2">
                        <input name="username" id="username" type="text"
                            placeholder='{{ __('register.username_placeholder') }}'
                            class="outline-0 w-full placeholder:gray " />
                        @if (old('username') && !$errors->has('username'))
                            <img class="mr-18" src="{{ asset('images/vector-green.png') }}" />
                        @endif
                    </div>
                    @error('username')
                        <div class="flex mt-10">
                            <img class="w-20 h-20 mr-10" src="{{ asset('images/Vector.jpg') }}" />
                            <p class="text-red text-sm font-medium mt-2">
                                {{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="flex mt-16 flex-col">
                    <label for="email" class="mb-8 text-sm font-bold text-dark-black lg:text-base">
                        {{ __('register.email') }}
                    </label>
                    <div
                        class="flex justify-between items-center @if ($errors->has('email')) border-red @elseif(old('email')) border-bggreen @else border-light-gray @endif focus-within:shadow-custom focus-within:border-bl lg:h-56 py-18 pl-24  rounded-lg border-2">
                        <input name="email" id="email" class="placeholder:gray outline-0 w-full" type="text"
                            placeholder='{{ __('register.email_placeholder') }}' />
                        @if (old('email') && !$errors->has('email'))
                            <img class="mr-18" src="{{ asset('images/vector-green.png') }}" />
                        @endif
                    </div>
                    @error('email')
                        <div class="flex mt-10">
                            <img class="w-20 h-20 mr-10" src="{{ asset('images/Vector.jpg') }}" />
                            <p class="text-red text-sm font-medium mt-2">
                                {{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="flex flex-col mt-16 mb-24">
                    <label for="password" class="mb-8 text-sm font-bold text-dark-black lg:text-base">
                        {{ __('register.password') }}
                    </label>
                    <div
                        class="flex justify-between items-center @if ($errors->has('password')) border-red @else border-light-gray @endif focus-within:shadow-custom focus-within:border-bl lg:h-56 py-18 pl-24  rounded-lg border-2">
                        <input name="password" id="password" class="placeholder:gray outline-0 w-full" type="password"
                            placeholder='{{ __('register.password') }}' />
                        @if (!$errors->has('password') && old('password'))
                            <img class="mr-18" src="{{ asset('images/vector-green.png') }}" />
                        @endif
                    </div>
                    @error('password')
                        <div class="flex mt-10">
                            <img class="w-20 h-20 mr-10" src="{{ asset('images/Vector.jpg') }}" />
                            <p class="text-red text-sm font-medium mt-2">
                                {{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="flex flex-col mt-16 mb-24">
                    <label for="checkPassword" class="mb-8 text-sm font-bold text-dark-black lg:text-base">
                        {{ __('register.re_password') }}
                    </label>
                    <div
                        class="flex justify-between items-center @if ($errors->has('checkPassword')) border-red @elseif(old('checkPassword')) border-bggreen @else border-light-gray @endif focus-within:shadow-custom focus-within:border-bl lg:h-56 py-18 pl-24  rounded-lg border-2">

                        <input name="checkPassword" id="checkPassword" class="outline-0 w-full placeholder:gray"
                            type="password" placeholder='{{ __('register.re_password') }}' />
                        @if (old('checkPassword') && !$errors->has('checkPassword'))
                            <img class="mr-18" src="{{ asset('images/vector-green.png') }}" />
                        @endif
                    </div>
                    @error('checkPassword')
                        <div class="flex mt-10">
                            <img class="w-20 h-20 mr-10" src="{{ asset('images/Vector.jpg') }}" />
                            <p class="text-red text-sm font-medium mt-2">
                                {{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="flex">
                    <button type="submit"
                        class="text-white w-full rounded-lg text-sm font-bold bg-green h-48 lg:h-56 lg:text-base">{{ __('register.sign_up') }}</button>
                </div>
            </form>
            <div class="self-center mt-24">
                <p class="text-gray text-sm">{{ __('register.question') }} <a href="{{ route('login') }}"
                        class="text-black font-semibold">{{ __('register.solve') }}</a></p>
            </div>
        </div>
    </div>
</x-firstLayout>
