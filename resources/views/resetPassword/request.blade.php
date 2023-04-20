<x-notificationLayout>
    <form method="POST" action="{{ route('password.email') }}"
        class=" flex justify-between mt-40 lg:mt-148 flex-col ml-16 mr-16 lg:w-392 ">
        @csrf
        <div>
            <h1 class="text-center text-dark-black font-black text-xl lg:text-2xl">Reset Password</h1>
            <div class="flex mt-40 flex-col lg:mt-56">
                <label class="mb-8 text-sm font-bold text-dark-black lg:text-base">
                    Email
                </label>
                <div
                    class="flex justify-between items-center @if ($errors->has('email')) border-red @else border-light-gray @endif focus-within:shadow-custom focus-within:border-bl lg:h-56 py-18 pl-24 rounded-lg border-2">
                    <input name="email" id="email" type="text"
                        placeholder='{{ __('register.email_placeholder') }}'
                        class="outline-0 w-full placeholder:gray " />
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
        </div>
        <div class="flex mb-40 mt-337 lg:mt-56">
            <button class="text-white w-full rounded-lg text-sm font-black bg-green h-48 lg:h-56 lg:text-base">SIGN
                UP</button>
        </div>
    </form>
</x-notificationLayout>
