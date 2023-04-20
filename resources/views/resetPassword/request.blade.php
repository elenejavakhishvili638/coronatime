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
                <input
                    class="focus:shadow-custom focus:border-bl outline-0 lg:h-56 py-18 pl-24 placeholder:gray rounded-lg border-light-gray border-2"
                    name="email" type="text" placeholder='Enter your email' />
            </div>
        </div>
        <div class="flex mb-40 mt-337 lg:mt-56">
            <button class="text-white w-full rounded-lg text-sm font-black bg-green h-48 lg:h-56 lg:text-base">SIGN
                UP</button>
        </div>
    </form>
</x-notificationLayout>
