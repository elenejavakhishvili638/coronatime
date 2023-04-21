<x-dashboardLayout>
    <div class="ml-16 mt-24 lg:mr-108 lg:ml-108">
        @include('_navigate')
        <form method="GET" action="#"
            class="flex items-center lg:mt-40 lg:border  lg:h-48 lg:pl-16 lg:border-light-gray rounded-lg lg:w-392">
            <img src="{{ asset('images/Vector.png') }}" class="mr-8" />
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="{{ __('dashboard.placeholder') }}"
                class="placeholder:gray outline-none placeholder:text-sm placeholder:font-medium w-392" />
        </form>
    </div>
    <div class="mt-24 flex flex-col lg:mr-108 lg:ml-108 lg:h-603 lg:overflow-y-scroll mb-56 lg:shadow-statistics">
        <div class="w-full">
            <div class="lg:rounded-t-lg text-xs font-semibold flex justify-between p-18 items-center  gap-4 bg-gr">
                <div class="flex items-center">
                    <p class="mr-3 break-words max-w-65">{{ __('dashboard.location') }}</p>
                    <div class="flex flex-col ml-3">
                        <!-- Up icon -->

                        <svg class="mb-1.5" width="10" height="6" viewBox="0 0 10 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 0.5L10 5.5L0 5.5L5 0.5Z" fill="#BFC0C4" />
                        </svg>
                        <!-- Down icon -->
                        {{-- #010414 --}}
                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 5.5L0 0.5H10L5 5.5Z" fill="#BFC0C4" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-center">
                    <p class="mr-5 break-words max-w-65">{{ __('dashboard.new_cases') }}</p>
                    <div class="flex flex-col ml-3">
                        <!-- Up icon -->

                        <svg class="mb-1.5" width="10" height="6" viewBox="0 0 10 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 0.5L10 5.5L0 5.5L5 0.5Z" fill="#BFC0C4" />
                        </svg>
                        <!-- Down icon -->
                        {{-- #010414 --}}
                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 5.5L0 0.5H10L5 5.5Z" fill="#BFC0C4" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-center">
                    <p class="break-words max-w-65">{{ __('dashboard.deaths') }}</p>
                    <div class="flex flex-col ml-3">
                        <!-- Up icon -->

                        <svg class="mb-1.5" width="10" height="6" viewBox="0 0 10 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 0.5L10 5.5L0 5.5L5 0.5Z" fill="#BFC0C4" />
                        </svg>
                        <!-- Down icon -->
                        {{-- #010414 --}}
                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 5.5L0 0.5H10L5 5.5Z" fill="#BFC0C4" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-center">
                    <p class="mr-5 break-words max-w-65">{{ __('dashboard.recovered') }}</p>
                    <div class="flex flex-col ml-3">
                        <!-- Up icon -->

                        <svg class="mb-1.5" width="10" height="6" viewBox="0 0 10 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 0.5L10 5.5L0 5.5L5 0.5Z" fill="#BFC0C4" />
                        </svg>
                        <!-- Down icon -->
                        {{-- #010414 --}}
                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 5.5L0 0.5H10L5 5.5Z" fill="#BFC0C4" />
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
