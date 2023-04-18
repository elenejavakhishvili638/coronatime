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
                    <input name="username" id="username"
                        class=" focus:shadow-custom focus:border-bl outline-0 lg:h-56 py-18 pl-24 placeholder:gray rounded-lg border-light-gray border-2"
                        type="text" placeholder="{{ __('register.username_placeholder') }}" />
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
                    <input name="email" id="email"
                        class="focus:shadow-custom focus:border-bl outline-0 lg:h-56 py-18 pl-24 placeholder:gray rounded-lg border-light-gray border-2"
                        type="text" placeholder="{{ __('register.email_placeholder') }}" />
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
                    <input name="password" id="password"
                        class=" focus:shadow-custom focus:border-bl outline-0 lg:h-56 py-18 pl-24 placeholder:gray rounded-lg border-light-gray border-2"
                        type="password" placeholder="{{ __('register.password_placeholder') }}" />
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
                    <input name="checkPassword" id="checkPassword"
                        class=" focus:shadow-custom focus:border-bl outline-0 lg:h-56 py-18 pl-24 placeholder:gray rounded-lg border-light-gray border-2"
                        type="password" placeholder=" {{ __('register.re_password_placeholder') }}" />
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
                <p class="text-gray text-sm">{{ __('register.question') }} <a href="{{ route('login.create') }}"
                        class="text-black font-semibold">{{ __('register.solve') }}</a></p>
            </div>
        </div>
    </div>
</x-firstLayout>
