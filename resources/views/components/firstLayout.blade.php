<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Coronatime</title>

    @vite('resources/css/app.css')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

</head>

<body class="lg:flex lg:justify-between">
    <div>
        <div class="mt-24 ml-16 lg:ml-108">
            <img class="w-137 h-33" src="{{ asset('https://i.ibb.co/GWNqz2n/logo.png') }}" />
            @include('_language')
        </div>
        {{ $slot }}
    </div>
    <div class="hidden lg:block">
        <img class="w-604 h-900" src={{ asset('https://i.ibb.co/FWs4mTh/Rectangle-1.png') }} />
    </div>
</body>

</html>
