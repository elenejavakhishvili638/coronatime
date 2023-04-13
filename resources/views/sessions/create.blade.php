<x-firstLayout>
    <div class='mt-43  ml-16 mr-16 lg:ml-108 lg:flex lg:justify-between lg:mr-0'>
        <div class="flex flex-col lg:w-392 lg:mt-56">
            <div>
                <h1 class="text-dark-black font-black text-xl lg:text-2xl">Welcome back</h1>
                <p class="mt-2 text-gray font-normal text-base lg:text-xl">Welcome back! Please enter your details</p>
            </div>
            <form class="mt-24" method="POST" action="{{ route('login.store') }}">
                @csrf
                <div class="flex flex-col">
                    <label for="username" class="mb-8 text-sm font-bold text-dark-black lg:text-base">
                        Username
                    </label>
                    <input name="username" id="username"
                        class="focus:shadow-custom focus:border-bl outline-0 lg:h-56 py-18 pl-24 placeholder:gray rounded-lg border-light-gray border-2"
                        type="text" placeholder='Enter unique username or email' />
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
                        Password
                    </label>
                    <input name="password" id="password"
                        class="focus:shadow-custom focus:border-bl outline-0 lg:h-56 py-18 pl-24 placeholder:gray rounded-lg border-light-gray border-2"
                        type="password" placeholder='Fill in password' />
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
                        <label class="font-semibold text-sm ml-8">Remember this device</label>
                    </div>
                    <a href="#" class="font-semibold text-sm text-blue">Forgot
                        password?</a>
                </div>
                <div class="flex">
                    <button
                        class="text-white w-full rounded-lg text-sm font-black bg-green h-48 lg:h-56 lg:text-base">LOG
                        IN</button>
                </div>
            </form>
            <div class="self-center mt-24">
                <p class="text-gray text-sm">Don't have an account? <a class="text-black font-semibold">Sign up for
                        free</a></p>
            </div>
        </div>
    </div>
</x-firstLayout>
