<x-dashboardLayout>
    <div class="ml-16 mt-24 lg:mr-108 lg:ml-108 mb-56">
        @include('_navigate')
        <div class="lg:flex lg:flex-row  lg:gap-6 flex gap-4 flex-wrap">
            <div class="lg:w-392 lg:h-255 relative w-343 h-193 flex justify-center items-center ">
                <div class="absolute inset-0 bg-purple opacity-5 rounded-2xl"></div>
                <div class="flex flex-col justify-center items-center">
                    <img class="w-90 h-50" src={{ asset('images/Group-1797.png') }} />
                    <p class="text-dark-black text-base font-medium">{{ __('dashboard.new_cases') }}</p>
                    <p class="font-black text-2xl text-purple">{{ $sumConfirmed }}</p>
                </div>
            </div>
            <div class="lg:w-392 lg:h-255 relative w-164 h-193 flex justify-center items-center ">
                <div class="absolute inset-0 bg-bggreen opacity-5 rounded-2xl"></div>
                <div class="flex flex-col justify-center items-center">
                    <img class="w-90 h-50" src={{ asset('images/Group-1700.png') }} />
                    <p class="text-dark-black text-base font-medium mt-16 mb-16">{{ __('dashboard.recovered') }}</p>
                    <p class="font-black text-2xl text-bggreen">{{ $sumRecovered }}</p>
                </div>
            </div>
            <div class="lg:w-392 lg:h-255 relative w-164 h-193 flex justify-center items-center ">
                <div class="absolute inset-0 bg-bgyellow opacity-5 rounded-2xl"></div>
                <div class="flex flex-col justify-center items-center">
                    <img class="w-90 h-50" src={{ asset('images/Group-1798.png') }} />
                    <p class="text-dark-black text-base font-medium mt-16 mb-16">{{ __('dashboard.deaths') }}</p>
                    <p class="font-black text-2xl text-bgyellow">{{ $sumDeaths }}</p>
                </div>
            </div>
        </div>
    </div>
</x-dashboardLayout>
