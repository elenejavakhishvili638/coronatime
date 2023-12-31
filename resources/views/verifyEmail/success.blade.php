<x-notificationLayout>
    <div class="text-center mt-214 flex flex-col items-center justify-center lg:mt-252">
        <img src={{ asset('images/icons8-checkmark.gif') }} />
        <div>
            <p class="w-186 mt-16 lg:text-lg text-base font-normal lg:w-auto">{{ __('verification.email_success') }}</p>
        </div>
        <a href="{{ route('login') }}"
            class="text-white w-343 rounded-lg text-sm font-bold bg-green h-48 lg:h-56 lg:text-base mb-40 mt-191 lg:mt-94 flex items-center justify-center">{{ __('verification.sign_in') }}</a>
    </div>
</x-notificationLayout>
