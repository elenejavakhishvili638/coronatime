<x-dashboardLayout>
    <div class="ml-16 mt-24 lg:mr-108 lg:ml-108">
        @include('_navigate')
        <div class="flex items-center lg:mt-40 lg:border lg:w-239 lg:h-48 lg:pl-16 lg:border-light-gray rounded-lg">
            <img src="{{ asset('images/Vector.png') }}" class="mr-8" />
            <input placeholder="Search by country"
                class="placeholder:gray outline-none placeholder:text-sm placeholder:font-medium" />
        </div>
    </div>
    <div class="mt-24 flex flex-col lg:mr-108 lg:ml-108 lg:h-603 lg:overflow-y-scroll mb-56 lg:shadow-statistics">
        <div class="w-full">
            <div class="lg:rounded-t-lg text-sm font-semibold flex justify-between p-18 items-center  gap-8 bg-gr">
                <div class="flex items-center">
                    <p class="mr-5">Location</p>
                </div>
                <div class="flex items-center">
                    <p class="mr-5">New cases</p>
                </div>
                <div class="flex items-center">
                    <p class="mr-5">Deaths</p>
                </div>
                <div class="flex items-center">
                    <p class="mr-5">Recovered</p>
                </div>
            </div>
        </div>
        <div class="w-full ">
            <div class="flex justify-between text-sm items-center pt-16 pb-16 border-b ml-18 border-gr">
                <div class="w-77">
                    <p>Worldwide</p>
                </div>
                <div class="w-77">
                    <p>{{ $sumConfirmed }}</p>
                </div>
                <div class="w-77">
                    <p>{{ $sumDeaths }}</p>
                </div>
                <div class="w-77">
                    <p>{{ $sumRecovered }}</p>
                </div>
            </div>
            @foreach ($countries as $country)
                <div class="flex justify-between text-sm items-center pt-16 pb-16 border-b ml-18 border-gr">
                    <div class="w-77">
                        <p>{{ $country->name }}</p>
                    </div>
                    <div class="w-77">
                        <p>{{ rtrim(number_format($country->covidData->confirmed, 3), '.0') }}</p>
                    </div>
                    <div class="w-77">
                        <p>{{ rtrim(number_format($country->covidData->deaths, 3), '.0') }}</p>
                    </div>
                    <div class="w-77">
                        <p>{{ rtrim(number_format($country->covidData->recovered, 3), '.0') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-dashboardLayout>
