<x-dashboardLayout>
    <div class="ml-16 mt-24 lg:mr-108 lg:ml-108">
        @include('_navigate')
        <form method="GET" action="{{ route('country.show') }}"
            class="flex items-center lg:mt-40 lg:border  lg:h-48 lg:pl-16 lg:border-light-gray rounded-lg lg:w-392">
            <img src="{{ asset('images/Vector.png') }}" class="mr-8" />
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="{{ __('dashboard.placeholder') }}"
                class="placeholder:gray outline-none placeholder:text-sm placeholder:font-medium w-392" />
            <input type="hidden" name="sort_by" value="{{ request('sort_by') }}" />
            <input type="hidden" name="sort_order" value="{{ request('sort_order') }}" />
        </form>
    </div>
    <div class=" mt-24 flex flex-col lg:mr-108 lg:ml-108 lg:h-603  mb-56 lg:shadow-statistics">
        <div class="w-full">
            <div class=" lg:rounded-t-lg text-xs font-semibold flex justify-between p-18 items-center  gap-4 bg-gr">
                <x-property name="name" property="{{ __('dashboard.location') }}" asc="asc" desc="desc" />
                <x-property name="confirmed" property="{{ __('dashboard.new_cases') }}" asc="desc" desc="asc" />
                <x-property name="deaths" property="{{ __('dashboard.deaths') }}" asc="desc" desc="asc" />
                <x-property name="recovered" property="{{ __('dashboard.recovered') }}" asc="desc" desc="asc" />
            </div>
        </div>
        <div class="w-full lg:overflow-y-scroll  scrollbar-custom">
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
