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

<body class="">
    <div>
        <div class="border-b pb-24 border-gr">
            <div class="mt-24 ml-16 lg:ml-108 flex items-center justify-between mr-10">
                <img class="w-137 h-33" src="{{ asset('https://i.ibb.co/GWNqz2n/logo.png') }}" />
                <div class="flex items-center">
                    @include('_language')
                    <div x-data="{ show: false }" @click.away="show=false" class="relative">
                        <div @click="show=!show" class=" mr-8 lg:hidden">
                            <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0H18V2H0V0ZM6 7H18V9H6V7ZM0 14H18V16H0V14Z" fill="#09121F" />
                            </svg>
                        </div>
                        <div x-show="show"
                            class=" top-6 absolute right-0 z-10 mt-2 w-32 origin-top-right rounded-md bg-white
                            shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="p-8" role="none">
                                <div
                                    class=" pb-8 mb-8 md:block lg:pr-16 lg:border-r lg:border-gray border-b border-gray">
                                    <p class="font-bold text-base">{{ auth()->user()->username }}</p>
                                </div>
                                <div>
                                    <a href="#" x-data="{}"
                                        @click.prevent="document.querySelector('#logout-form').submit()" class="">
                                        {{ __('login.logout') }}</a>
                                    <form id="logout-form" method="POST" action="/logout" class="hidden">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden lg:block pr-16 border-r border-gray ml-16">
                        <p class="font-bold text-base">{{ auth()->user()->username }}</p>
                    </div>
                    <div class="ml-8 hidden lg:block">
                        <a href="#" x-data="{}"
                            @click.prevent="document.querySelector('#logout-form').submit()" class="">
                            {{ __('login.logout') }}</a>
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
