<x-firstLayout>
    <div class='mt-43  ml-16 mr-16 lg:ml-108 lg:flex lg:justify-between lg:mr-0'>
        <div class="flex flex-col lg:w-392 lg:mt-56">
            <div>
                <h1 class="text-dark-black font-bold text-xl lg:text-2xl">{{ __('login.title') }}</h1>
                <p class="mt-8 text-gray font-normal text-base lg:text-xl">{{ __('login.body') }}</p>
            </div>
            <form class="mt-24" method="POST" action="{{ route('login.store') }}">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="flex flex-col">
                    <label for="username" class="mb-8 text-sm font-bold text-dark-black lg:text-base">
                        {{ __('login.username') }}
                    </label>
                    <input name="username" id="username"
                        class="focus:shadow-custom focus:border-bl outline-0 lg:h-56 py-18 pl-24 placeholder:text-xs placeholder:gray rounded-lg border-light-gray border-2"
                        type="text" placeholder="{{ __('login.username_placeholder') }}" />
                    @error('username')
                        <div class="flex mt-10">
                            <img class="w-20 h-20 mr-10" src="{{ asset('images/Vector.jpg') }}" />
                            <p class="text-red text-sm font-medium mt-2">
                                {{ $message }}</p>
                        </div>
                    @enderror

                </div>
                <div class="flex flex-col mt-16 mb-24">
                    <label for="password" class="mb-8 text-sm font-bold text-dark-black lg:text-base">
                        {{ __('login.password') }}
                    </label>
                    <input name="password" id="password"
                        class="focus:shadow-custom focus:border-bl outline-0 lg:h-56 py-18 pl-24 placeholder:gray rounded-lg border-light-gray border-2"
                        type="password" placeholder="{{ __('login.password_placeholder') }}" />
                    @error('password')
                        <div class="flex mt-10">
                            <img class="w-20 h-20 mr-10" src="{{ asset('images/Vector.jpg') }}" />
                            <p class="text-red text-sm font-medium mt-2">
                                {{ $message }}</p>
                        </div>
                    @enderror

                </div>
                <div class="flex justify-between mb-24 items-center">
                    <div class="flex justify-center items-center">
                        <input type="checkbox" />
                        <label class="font-semibold text-sm ml-8">{{ __('login.remember') }}</label>
                    </div>
                    <a href="#" class="font-semibold text-sm text-blue">{{ __('login.forget') }}</a>
                </div>
                <div class="flex">
                    <button
                        class="text-white w-full rounded-lg text-sm font-black bg-green h-48 lg:h-56 lg:text-base">{{ __('login.log_in') }}</button>
                </div>
            </form>
            <div class="self-center mt-24 text-center">
                <p class="text-gray text-sm">{{ __('login.question') }} <a href="{{ route('register.create') }}"
                        class="text-black font-semibold">{{ __('login.solve') }}</a></p>
            </div>
        </div>
    </div>
</x-firstLayout>
