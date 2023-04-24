@props(['name', 'label', 'placeholder', 'type' => 'text'])
<x-form.field>
    <x-form.label label="{{ $label }}" name="{{ $name }}" />
    <div
        class="flex justify-between items-center @if ($errors->has($name)) border-red @elseif(old($name)) border-bggreen @else border-light-gray @endif focus-within:shadow-custom focus-within:border-bl lg:h-56 py-18 pl-24 rounded-lg border-2">

        <input name="{{ $name }}" id="{{ $name }}" type="{{ $type }}"
            placeholder='{{ $placeholder }}' class="placeholder:text-sm outline-0 w-full placeholder:gray " />
        @if (old($name) && !$errors->has($name))
            <img class="mr-18" src="{{ asset('images/vector-green.png') }}" />
        @endif
    </div>
    <x-form.error name="{{ $name }}" />
</x-form.field>
