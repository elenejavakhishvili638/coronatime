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
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="lg:flex lg:flex-col justify-center items-center">
    <div class="mt-24 ml-16 lg:mt-40 lg:ml-0 ">
        <img class="w-137 h-33" src="{{ asset('https://i.ibb.co/GWNqz2n/logo.png') }}" />
    </div>
    {{ $slot }}

</body>

</html>
