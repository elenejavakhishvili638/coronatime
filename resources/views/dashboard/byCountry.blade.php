<x-dashboardLayout>
    <div class="ml-16 mt-24 lg:mr-108 lg:ml-108">
        @include('_navigate')
        <div class="flex items-center lg:mt-40 lg:border  lg:h-48 lg:pl-16 lg:border-light-gray rounded-lg lg:w-392">
            <img src="{{ asset('images/Vector.png') }}" class="mr-8" />
            <input placeholder="{{ __('dashboard.placeholder') }}"
                class="placeholder:gray outline-none placeholder:text-sm placeholder:font-medium w-392" />
        </div>
    </div>
    <div class="mt-24 flex flex-col lg:mr-108 lg:ml-108 lg:h-603 lg:overflow-y-scroll mb-56 lg:shadow-statistics">
        <div class="w-full">
            <div class="lg:rounded-t-lg text-xs font-semibold flex justify-between p-18 items-center  gap-4 bg-gr">
                <div class="flex items-center">
                    <p class="mr-5 break-words max-w-65">{{ __('dashboard.location') }}</p>
                    <div class="flex flex-col ml-3">
                        <!-- Up icon -->
                        <svg class="inline-block w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 -4 20 20">
                            <polygon points="10,7 5,15 15,15" fill="#9CA3AF" />
                        </svg>
                        <!-- Down icon -->
                        <svg class="inline-block w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 2 20 20">
                            <polygon points="10,13 5,5 15,5" fill="#9CA3AF" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-center">
                    <p class="mr-5 break-words max-w-65">{{ __('dashboard.new_cases') }}</p>
                    <div class="flex flex-col ml-3">
                        <!-- Up icon -->
                        <svg class="inline-block w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 -4 20 20">
                            <polygon points="10,7 5,15 15,15" fill="#9CA3AF" />
                        </svg>
                        <!-- Down icon -->
                        <svg class="inline-block w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 2 20 20">
                            <polygon points="10,13 5,5 15,5" fill="#9CA3AF" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-center">
                    <p class="break-words max-w-65">{{ __('dashboard.deaths') }}</p>
                    <div class="flex flex-col ml-3">
                        <!-- Up icon -->
                        <svg class="inline-block w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 -4 20 20">
                            <polygon points="10,7 5,15 15,15" fill="#9CA3AF" />
                        </svg>
                        <!-- Down icon -->
                        <svg class="inline-block w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 2 20 20">
                            <polygon points="10,13 5,5 15,5" fill="#9CA3AF" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-center">
                    <p class="mr-5 break-words max-w-65">{{ __('dashboard.recovered') }}</p>
                    <div class="flex flex-col ml-3">
                        <!-- Up icon -->
                        <svg class="inline-block w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 -4 20 20">
                            <polygon points="10,7 5,15 15,15" fill="#9CA3AF" />
                        </svg>
                        <!-- Down icon -->
                        <svg class="inline-block w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 2 20 20">
                            <polygon points="10,13 5,5 15,5" fill="#9CA3AF" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full ">
            <div class="mr-18 flex justify-between text-xs items-center pt-16 pb-16 border-b ml-18 border-gr">
                <div class="w-65">
                    <p class="break-words">{{ __('dashboard.worldwide') }}</p>
                </div>
                <div class="w-65">
                    <p class="break-words">{{ $sumConfirmed }}</p>
                </div>
                <div class="w-65">
                    <p class="break-words">{{ $sumDeaths }}</p>
                </div>
                <div class="w-65">
                    <p class="break-words">{{ $sumRecovered }}</p>
                </div>
            </div>
            @foreach ($countries as $country)
                <div class="mr-18 flex justify-between text-xs items-center pt-16 pb-16 border-b ml-18 border-gr">
                    <div class="w-65">
                        <p class="break-words">{{ $country->name }}</p>
                    </div>
                    <div class="w-65">
                        <p class="break-words">{{ number_format($country->confirmed, 3) }}</p>
                    </div>
                    <div class="w-65">
                        <p class="break-words">{{ number_format($country->deaths, 3) }}</p>
                    </div>
                    <div class="w-65">
                        <p class="break-words">{{ number_format($country->recovered, 3) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-dashboardLayout>
