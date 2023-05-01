@props(['property', 'name', 'asc', 'desc'])

<div class="flex items-center">
    <p
        class="{{ App::getLocale() === 'ka' ? 'text-[0.5rem]' : 'text-sm' }} lg:text-xs mr-3 break-words lg:max-w-150 max-w-77">
        {{ $property }}</p>
    <div class="flex flex-col ml-3">
        <!-- Up icon -->
        <a href="{{ route('country.show', ['search' => request('search'), 'sort_by' => $name, 'sort_order' => $asc]) }}">

            <svg class="mb-1.5" width="10" height="6" viewBox="0 0 10 6" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M5 0.5L10 5.5L0 5.5L5 0.5Z"
                    fill="{{ request('sort_by') === $name && request('sort_order') === $asc ? '#010414' : '#BFC0C4' }}" />
            </svg>
        </a>
        <!-- Down icon -->
        <a
            href="{{ route('country.show', ['search' => request('search'), 'sort_by' => $name, 'sort_order' => $desc]) }}">

            <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 5.5L0 0.5H10L5 5.5Z"
                    fill="{{ request('sort_by') === $name && request('sort_order') === $desc ? '#010414' : '#BFC0C4' }}" />
            </svg>
        </a>
    </div>
</div>
