<x-notificationLayout>
    <form method="POST" action="{{ route('password.update') }}"
        class=" flex justify-between mt-40 lg:mt-108 flex-col ml-16 mr-16 lg:w-392 ">
        @csrf
        <input type="hidden" name="email" value="{{ $email }}" />
        <input type="hidden" name="token" value="{{ $token }}">
        <div>
            <h1 class="text-center text-dark-black font-bold text-xl lg:text-2xl">
                {{ __('verification.reset_password') }}</h1>
            <div class="flex mt-40 flex-col lg:mt-56">
                <label class="mb-8 text-sm font-bold text-dark-black lg:text-base">
                    {{ __('verification.new_password') }}
                </label>
                <div
                    class="flex justify-between items-center lg:h-56 py-18 pl-24  rounded-lg border-2 focus-within:shadow-custom focus-within:border-bl {{ $errors->has('password') ? 'border-red' : (old('password') ? 'border-bggreen' : 'border-light-gray') }}">
                    <input class="placeholder:gray outline-0 w-full" type="password"
                        placeholder="{{ __('verification.new_password_placeholder') }}" name="password" />

                    {!! !$errors->has('password') && old('password')
                        ? '<img class="mr-18" src="' . asset('images/vector-green.png') . '" />'
                        : '' !!}
                </div>
                @error('password')
                    <div class="flex mt-10">
                        <img class="w-20 h-20 mr-10" src="{{ asset('images/Vector.jpg') }}" />
                        <p class="text-red text-sm font-medium mt-2">
                            {{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="flex mt-16 flex-col lg:mt-24">
                <label class="mb-8 text-sm font-bold text-dark-black lg:text-base">
                    {{ __('verification.repeat_password') }}
                </label>
                <div
                    class="flex justify-between items-center lg:h-56 py-18 pl-24  rounded-lg border-2 focus-within:shadow-custom focus-within:border-bl {{ $errors->has('password') ? 'border-red' : (old('password') ? 'border-bggreen' : 'border-light-gray') }}">
                    <input class="outline-0 w-full placeholder:gray" type="password"
                        placeholder="{{ __('verification.repeat_password_placeholder') }}"
                        name="password_confirmation" />
                    {!! !$errors->has('password') && old('password')
                        ? '<img class="mr-18" src="' . asset('images/vector-green.png') . '" />'
                        : '' !!}
                </div>
                @error('password')
                    <div class="flex mt-10">
                        <img class="w-20 h-20 mr-10" src="{{ asset('images/Vector.jpg') }}" />
                        <p class="text-red text-sm font-medium mt-2">
                            {{ $message }}</p>
                    </div>
                @enderror
            </div>
        </div>
        <div class="flex mb-40 mt-240 lg:mt-56">
            <button
                class="text-white w-full rounded-lg text-sm font-bold bg-green h-48 lg:h-56 lg:text-base">{{ __('verification.save_changes') }}</button>
        </div>
    </form>

</x-notificationLayout>
