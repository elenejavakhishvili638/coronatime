<x-firstLayout>
    <div class='mt-43  ml-16 mr-16 lg:ml-108 lg:flex lg:justify-between lg:mr-0'>
        <div class="flex flex-col lg:w-392 lg:mt-56">
            <div>
                <h1 class="text-dark-black font-black text-xl lg:text-2xl">Welcome to Coronatime</h1>
                <p class="mt-2 text-gray font-normal text-base lg:text-xl">Please enter required to sign up</p>
            </div>
            <form method="POST" action="#" class="mt-24">
                @csrf
                <div class="flex flex-col">
                    <label for="username" class="mb-8 text-sm font-bold text-dark-black lg:text-base">
                        Username
                    </label>
                    <input name="username" id="username"
                        class=" focus:shadow-custom focus:border-bl outline-0 lg:h-56 py-18 pl-24 placeholder:gray rounded-lg border-light-gray border-2"
                        type="text" placeholder='Enter unique username or email' />
                </div>
                <div class="flex mt-16 flex-col">
                    <label for="email" class="mb-8 text-sm font-bold text-dark-black lg:text-base">
                        Email
                    </label>
                    <input name="email" id="email"
                        class="focus:shadow-custom focus:border-bl outline-0 lg:h-56 py-18 pl-24 placeholder:gray rounded-lg border-light-gray border-2"
                        type="text" placeholder='Enter your email' />
                </div>
                <div class="flex flex-col mt-16 mb-24">
                    <label for="password" class="mb-8 text-sm font-bold text-dark-black lg:text-base">
                        Password
                    </label>
                    <input name="password" id="password"
                        class=" focus:shadow-custom focus:border-bl outline-0 lg:h-56 py-18 pl-24 placeholder:gray rounded-lg border-light-gray border-2"
                        type="password" placeholder='Fill in password' />
                </div>
                <div class="flex flex-col mt-16 mb-24">
                    <label for="checkPassword" class="mb-8 text-sm font-bold text-dark-black lg:text-base">
                        Password
                    </label>
                    <input name="checkPassword" id="checkPassword"
                        class=" focus:shadow-custom focus:border-bl outline-0 lg:h-56 py-18 pl-24 placeholder:gray rounded-lg border-light-gray border-2"
                        type="password" placeholder='Repeat password' />
                </div>
                <div class="flex">
                    <button type="submit"
                        class="text-white w-full rounded-lg text-sm font-black bg-green h-48 lg:h-56 lg:text-base">SIGN
                        UP</button>
                </div>
            </form>
            <div class="self-center mt-24">
                <p class="text-gray text-sm">Already have an account? <a href="#"
                        class="text-black font-semibold">Log in</a></p>
            </div>
        </div>
    </div>
</x-firstLayout>
