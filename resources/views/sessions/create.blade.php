<x-firstLayout>
    <div class='mt-43  ml-16 mr-16 lg:ml-108 lg:flex lg:justify-between lg:mr-0'>
        <div class="flex flex-col lg:w-392 lg:mt-56">
            <div>
                <h1 class="text-dark-black font-bold text-xl lg:text-2xl">{{ __('login.title') }}</h1>
                <p class="mt-8 text-gray font-normal text-base lg:text-xl">{{ __('login.body') }}</p>
            </div>
            <form class="mt-24" method="POST" action="{{ route('login.store') }}">
                @csrf
                <x-form.input name="username" label="{{ __('login.username') }}"
                    placeholder="{{ __('login.username_placeholder') }}" />
                <x-form.input type="password" name="password" label="{{ __('login.password') }}"
                    placeholder="{{ __('login.password_placeholder') }}" />
                <div class="flex justify-between mt-24 mb-24 items-center">
                    <div class="flex justify-center items-center">
                        <input type="checkbox" name="remember" />
                        <label class="font-semibold text-sm ml-8">{{ __('login.remember') }}</label>
                    </div>
                    <a href="{{ route('password.request') }}"
                        class="font-semibold text-sm text-blue">{{ __('login.forget') }}</a>
                </div>
                <div class="flex">
                    <button
                        class="text-white w-full rounded-lg text-sm font-bold bg-green h-48 lg:h-56 lg:text-base">{{ __('login.log_in') }}</button>
                </div>
            </form>
            <div class="self-center mt-24 text-center">
                <p class="text-gray text-sm">{{ __('login.question') }} <a href="{{ route('register.create') }}"
                        class="text-black font-semibold">{{ __('login.solve') }}</a></p>
            </div>
        </div>
    </div>
</x-firstLayout>
