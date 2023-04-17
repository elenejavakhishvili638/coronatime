<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    @vite('resources/css/app.css')
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="">
    <div>
        <div class="border-b pb-24 border-gr">
            <div class="mt-24 ml-16 lg:ml-108 flex items-center justify-between mr-32">
                <img class="w-137 h-33" src="{{ asset('https://i.ibb.co/GWNqz2n/logo.png') }}" />
                <div class="flex items-center">
                    <div class="w-58 mr-16">

                    </div>
                    <div class="hidden md:block pr-16 border-r border-gray">
                        <p class="font-bold text-base">Takeshi K.</p>
                    </div>
                    <div class="ml-8">
                        <a href="#" x-data="{}"
                            @click.prevent="document.querySelector('#logout-form').submit()" class="">
                            Log out</a>
                        <form id="logout-form" method="POST" action="/logout" class="hidden">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{ $slot }}
    </div>
</body>

</html>
