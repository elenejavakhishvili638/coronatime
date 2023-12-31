<x-dashboardLayout>
    <div class="ml-16 mt-24 lg:mr-108 lg:ml-108 mb-56">
        @include('_navigate')
        <div class="md:mt-40 flex flex-col gap-2 mr-16 md:flex-row md:gap-6 md:justify-between">
            <div
                class="md:hidden xl:flex-1 xl:w-392 xl:h-255 min-w-343 relative h-193 flex justify-center items-center ">
                <div class="absolute inset-0 bg-purple opacity-5 rounded-2xl"></div>
                <div class="flex flex-col justify-center items-center">
                    <img class="w-90 h-50" src={{ asset('images/Group-1797.png') }} />
                    <p class="text-dark-black text-base font-medium mt-16 mb-16">{{ __('dashboard.new_cases') }}</p>
                    <p class="font-black text-2xl text-purple">{{ $sumConfirmed }}</p>
                </div>
            </div>

            <div class="hidden md:flex-1 md:w-392 md:h-255 w-343 relative h-193 md:flex justify-center items-center ">
                <div class="absolute inset-0 bg-purple opacity-5 rounded-2xl"></div>
                <div class="flex flex-col justify-center items-center">
                    <img class="w-90 h-50" src={{ asset('images/Group-1797.png') }} />
                    <p class="text-dark-black text-base font-medium mt-16 mb-16">{{ __('dashboard.new_cases') }}</p>
                    <p class="font-black text-2xl text-purple">{{ $sumConfirmed }}</p>
                </div>
            </div>
            <div
                class="hidden md:flex-1 md:w-392 md:h-255 min-w-164 relative h-193 md:flex justify-center items-center ">
                <div class="absolute inset-0 bg-bggreen opacity-5 rounded-2xl"></div>
                <div class="flex flex-col justify-center items-center">
                    <img class="w-90 h-50" src={{ asset('images/Group-1700.png') }} />
                    <p class="text-dark-black text-base font-medium mt-16 mb-16">{{ __('dashboard.recovered') }}
                    </p>
                    <p class="font-black text-2xl text-bggreen">{{ $sumRecovered }}</p>
                </div>
            </div>
            <div
                class="hidden md:flex-1 md:w-392 md:h-255 min-w-164 relative h-193 md:flex justify-center items-center ">
                <div class="absolute inset-0 bg-bgyellow opacity-5 rounded-2xl"></div>
                <div class="flex flex-col justify-center items-center">
                    <img class="w-90 h-50" src={{ asset('images/Group-1798.png') }} />
                    <p class="text-dark-black text-base font-medium mt-16 mb-16">{{ __('dashboard.deaths') }}
                    </p>
                    <p class="font-black text-2xl text-bgyellow">{{ $sumDeaths }}</p>
                </div>
            </div>
            <div class="flex-1 gap-4 flex xl:gap-6 md:hidden justify-between">
                <div class="flex-1 xl:w-392 xl:h-255 min-w-164 relative h-193 flex justify-center items-center ">
                    <div class="absolute inset-0 bg-bggreen opacity-5 rounded-2xl"></div>
                    <div class="flex flex-col justify-center items-center">
                        <img class="w-90 h-50" src={{ asset('images/Group-1700.png') }} />
                        <p class="text-dark-black text-base font-medium mt-16 mb-16">
                            {{ __('dashboard.recovered') }}
                        </p>
                        <p class="font-black text-2xl text-bggreen">{{ $sumRecovered }}</p>
                    </div>
                </div>
                <div class="flex-1 xl:w-392 xl:h-255 min-w-164 relative h-193 flex justify-center items-center ">
                    <div class="absolute inset-0 bg-bgyellow opacity-5 rounded-2xl"></div>
                    <div class="flex flex-col justify-center items-center">
                        <img class="w-90 h-50" src={{ asset('images/Group-1798.png') }} />
                        <p class="text-dark-black text-base font-medium mt-16 mb-16">{{ __('dashboard.deaths') }}
                        </p>
                        <p class="font-black text-2xl text-bgyellow">{{ $sumDeaths }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-dashboardLayout>
