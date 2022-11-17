<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <livewire:styles/>
    <livewire:scripts/>
</head>
<body class="font-sans antialiased bg-red-500">
<div class="bg-red-500">
    <div class="flex flex-row overflow-hidden">
        <div class="hidden md:block">
            <div class="w-64 flex-shrink-0 h-screen bg-white flex flex-col justify-between bg-white p-10">
                <div class="">
                    <div class="flex flex-col shrink-0 items-center space-y-3 pb-5 border-b border-gray-200"><a
                            aria-current="page" href="/profile/categories"
                            class="router-link-active router-link-exact-active">
                            <x-icons.blog class="h-9 mb-9"/>
                        </a>
                        <div>
                            <x-icons.profileicon class="h-20 w-20 rounded-full|"/>
                        </div>
                        <p class="text-base font-normal tracking-wider text-black">{{ auth()->user()->name }}</p>
                        <p class="text-xs font-normal text-gray-500">{{ auth()->user()->email }}</p></div>
                    <ul class="pt-9 flex flex-col h-full">
                        <li class="flex flex-row items-center space-x-6 text-xs font-normal tracking-wider">
                            <x-icons.dashboard class="w-6 h-6"/>
                            <x-nav-link href="">Dashboard</x-nav-link>
                        </li>
                        <li class="flex flex-row items-center space-x-6 text-xs font-normal tracking-wider mt-6">
                            <x-icons.categories class="w-6 h-6"/>
                            <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')" >Categories</x-nav-link>
                        </li>

                        <li class="flex flex-row items-center space-x-6 text-xs font-normal tracking-wider mt-6">
                            <x-icons.post class="w-6 h-6"/>
                            <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.*')">Posts</x-nav-link>
                        </li>
                    </ul>
                </div>
                <div class="flex flex-row space-x-6 text-xs font-normal tracking-wider mt-auto">
                    <x-icons.logout/>
                    <button>Log Out</button>
                </div>
            </div>
        </div>

        <div class="w-full bg-neutral-100 pt-6 px-12 pb-12 overflow-auto h-screen">
            <div class="flex flex-row justify-between">
                <form action="">
                    <label class="">
                        <div class="relative">
                            <div class="relative items-center">
                                <div class="flex absolute inset-y-0 pl-3 items-center pointer-events-none">
                                    <x-icons.search/>
                                </div>
                                <input type="search" placeholder="Search Posts..."
                                       class=" lg:w-96 h-full rounded-full px-9 py-2 text-left text-sm text-gray-500 outline-none">
                            </div>
                        </div>
                    </label>
                </form>

                <div class="flex flex-col space-y-2 md:flex-row md:space-x-9 md:space-y-0">
                    <div class="bg-white rounded-full p-1">
                        <!-- width po rritet kur bohet zoom-->
                    <x-icons.notification class="h-full w-full"/>
                    </div>
                    <a href="{{route('posts.create')}}"
                       class="bg-blue-500 hover:bg-blue-600 text-white rounded-full w-auto px-6 py-2 text-center text-sm font-normal tracking-wider">CREATE
                        POST
                    </a>
                </div>

            </div>

            {{ $slot }}

        </div>
    </div>
</div>
</body>
</html>
