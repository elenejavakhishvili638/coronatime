<x-dashboardLayout>
    <div class="ml-16 mt-24 lg:mr-108 lg:ml-108">
        @include('_navigate')
        <div class="flex items-center lg:mt-40 lg:border lg:w-239 lg:h-48 lg:pl-16 lg:border-light-gray rounded-lg">
            <img src="{{ asset('images/Vector.png') }}" class="mr-8" />
            <input placeholder="Search by country"
                class="placeholder:gray outline-none placeholder:text-sm placeholder:font-medium" />
        </div>
    </div>
</x-dashboardLayout>
