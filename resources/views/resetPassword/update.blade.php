<x-notificationLayout>
    <div class="text-center mt-214 flex flex-col items-center justify-center lg:mt-252">
        <img src={{ asset('images/icons8-checkmark.gif') }} />
        <div>
            <p class="w-186 mt-16 lg:text-lg text-base font-normal lg:w-auto">Your password has been
                updeted successfully</p>
        </div>
        <div class="w-343 mb-40 mt-191 lg:mt-94">
            <a href="{{ route('login') }}"
                class="text-white w-full rounded-lg text-sm font-black bg-green h-48 lg:h-56 lg:text-base">SIGN
                IN</a>
        </div>
    </div>
</x-notificationLayout>
