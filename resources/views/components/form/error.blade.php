@props(['name'])
@error($name)
    <div class="flex mt-10">
        <img class="w-20 h-20 mr-10" src="{{ asset('images/Vector.jpg') }}" />
        <p class="text-red text-sm font-medium mt-2">
            {{ $message }}</p>
    </div>
@enderror
