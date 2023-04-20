<x-notificationLayout>
    <form method="POST" action="{{ route('password.update') }}"
        class=" flex justify-between mt-40 lg:mt-108 flex-col ml-16 mr-16 lg:w-392 ">
        @csrf
        <input type="hidden" name="email" value="{{ $_REQUEST['email'] }}" />
        <input type="hidden" name="token" value="{{ $token }}">
        <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1 class="text-center text-dark-black font-black text-xl lg:text-2xl">Reset Password</h1>
            <div class="flex mt-40 flex-col lg:mt-56">
                <label class="mb-8 text-sm font-bold text-dark-black lg:text-base">
                    New password
                </label>
                <input
                    class="focus:shadow-custom focus:border-bl outline-0 lg:h-56 py-18 pl-24 placeholder:gray rounded-lg border-light-gray border-2"
                    type="password" placeholder='Enter new password' name="password" />
            </div>
            <div class="flex mt-16 flex-col lg:mt-24">
                <label class="mb-8 text-sm font-bold text-dark-black lg:text-base">
                    Repeat password
                </label>
                <input
                    class="focus:shadow-custom focus:border-bl outline-0 lg:h-56 py-18 pl-24 placeholder:gray rounded-lg border-light-gray border-2"
                    type="password" placeholder='Repeat password' name="password_confirmation" />
            </div>
        </div>
        <div class="flex mb-40 mt-240 lg:mt-56">
            <button class="text-white w-full rounded-lg text-sm font-black bg-green h-48 lg:h-56 lg:text-base">SAVE
                CHANGES</button>
        </div>
    </form>

</x-notificationLayout>
