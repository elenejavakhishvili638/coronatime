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
    {{-- <div class="mt-24 lg:mr-108 lg:ml-108 lg:h-603  mb-56 flex flex-col">
        <div class="overflow-x-auto ">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8 ">
                <div class="lg:shadow-statistics">
                    <table class="min-w-full text-left text-sm font-light ">
                        <thead class="lg:rounded-t-lg text-xs font-semibold p-18 items-center bg-gr">
                            <tr>
                                <th scope="col" class="p-18">
                                    <x-property name="name" property="{{ __('dashboard.location') }}" asc="asc"
                                        desc="desc" />
                                </th>
                                <th scope="col" class="p-18">
                                    <x-property name="confirmed" property="{{ __('dashboard.new_cases') }}"
                                        asc="desc" desc="asc" />
                                </th>
                                <th scope="col" class="p-18">
                                    <x-property name="deaths" property="{{ __('dashboard.deaths') }}" asc="desc"
                                        desc="asc" />
                                </th>
                                <th scope="col" class="p-18">
                                    <x-property name="recovered" property="{{ __('dashboard.recovered') }}"
                                        asc="desc" desc="asc" />
                                </th>
                            </tr>
                        </thead>

                        <tbody class="border-b border-gr ">
                            <tr class="w-85 border-b border-gr ">
                                <td class="pt-16 pb-16 pl-18">{{ __('dashboard.worldwide') }}</td>
                                <td class="pt-16 pb-16 pl-18">{{ $sumConfirmed }}</td>
                                <td class="pt-16 pb-16 pl-18">{{ $sumDeaths }}</td>
                                <td class="pt-16 pb-16 pl-18">{{ $sumRecovered }}</td>
                            </tr>
                            @foreach ($countries as $country)
                                <tr class="border-b ml-18 border-gr">
                                    <td class="break-words max-w-80 pt-16 pb-16 pl-18">{{ $country->name }}
                                    </td>
                                    <td class="break-words max-w-80 pt-16 pb-16 pl-18">
                                        {{ number_format($country->confirmed, 3) }}
                                    </td>
                                    <td class="break-words max-w-80 pt-16 pb-16 pl-18">
                                        {{ number_format($country->deaths, 3) }}
                                    </td>
                                    <td class="break-words max-w-80 pt-16 pb-16 pl-18">
                                        {{ number_format($country->recovered, 3) }}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="w-screen mt-24 flex flex-col lg:mr-108 lg:ml-108 lg:h-603  mb-56 lg:shadow-statistics overflow-x-auto ">
        {{-- <div class="w-full"> </div> --}}
        <div class="lg:rounded-t-lg text-xs font-semibold flex justify-between items-center gap-2 p-18 bg-gr">
            <x-property name="name" property="{{ __('dashboard.location') }}" asc="asc" desc="desc" />
            <x-property name="confirmed" property="{{ __('dashboard.new_cases') }}" asc="desc" desc="asc" />
            <x-property name="deaths" property="{{ __('dashboard.deaths') }}" asc="desc" desc="asc" />
            <x-property name="recovered" property="{{ __('dashboard.recovered') }}" asc="desc" desc="asc" />
        </div>
        <div class="w-full lg:overflow-y-scroll  scrollbar-custom">
            <div class=" flex justify-between text-xs items-center pt-16 pb-16 border-b ml-18 border-gr">
                <div class="w-85">
                    <p class="break-words">{{ __('dashboard.worldwide') }}</p>
                </div>
                <div class="w-85">
                    <p class="break-words">{{ $sumConfirmed }}</p>
                </div>
                <div class="w-85">
                    <p class="break-words">{{ $sumDeaths }}</p>
                </div>
                <div class="w-85">
                    <p class="break-words">{{ $sumRecovered }}</p>
                </div>
            </div>
            @foreach ($countries as $country)
                <div class=" flex justify-between text-xs items-center pt-16 pb-16 border-b ml-18 border-gr">
                    <div class="w-85">
                        <p class="break-words">{{ $country->name }}</p>
                    </div>
                    <div class="w-85">
                        <p class="break-words">{{ number_format($country->confirmed, 3) }}</p>
                    </div>
                    <div class="w-85">
                        <p class="break-words">{{ number_format($country->deaths, 3) }}</p>
                    </div>
                    <div class="w-85">
                        <p class="break-words">{{ number_format($country->recovered, 3) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-dashboardLayout>
