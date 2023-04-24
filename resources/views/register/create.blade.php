<x-firstLayout>
    <div class='mb-56 mt-43  ml-16 mr-16 lg:ml-108 lg:flex lg:justify-between lg:mr-0'>
        <div class="flex flex-col lg:w-392 lg:mt-56">
            <div>
                <h1 class="text-dark-black font-bold text-xl lg:text-2xl">{{ __('register.title') }}</h1>
                <p class="mt-8 text-gray font-normal text-base lg:text-xl">{{ __('register.body') }}</p>
            </div>
            <form method="POST" action="{{ route('register.store') }}">
                @csrf
                <x-form.input name="username" label="{{ __('register.username') }}"
                    placeholder="{{ __('register.username_placeholder') }}" />
                <x-form.input type="email" name="email" label="{{ __('register.email') }}"
                    placeholder="{{ __('register.email_placeholder') }}" />
                <x-form.input type="password" name="password" label=" {{ __('register.password') }}"
                    placeholder="{{ __('register.password') }}" />
                <x-form.input type="password" name="checkPassword" label="{{ __('register.re_password') }}"
                    placeholder="{{ __('register.re_password') }}" />
                <div class="flex mt-24">
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
