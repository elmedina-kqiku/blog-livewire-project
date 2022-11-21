<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <script defer  src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <livewire:styles/>
        <livewire:scripts/>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <main>
                <div>
                    <div class="bg-neutral-100 pt-5 pb-12 px-9">

                        <div class="flex flex-col lg:flex-row items-center lg:justify-between space-y-3 lg:space-y-0 font-sans">

                            <div class="flex flex-col lg:flex-row items-center space-y-3 lg:space-y-0 lg:space-x-16">
                                <a href="#">
                                    <x-icons.blog/>
                                </a>

                                <div class="relative">
                                    <div class="relative items-center">
                                        <div class="flex absolute inset-y-0 pl-3 items-center pointer-events-none">
                                            <x-icons.search/>
                                        </div>
                                        <input type="search" placeholder="Search Posts..."
                                               class=" lg:w-96 h-full rounded-full px-9 py-2 text-left text-sm text-gray-500 outline-none">
                                    </div>
                                </div>

                            </div>

                            <div class=" flex flex-row items-center justify-between space-y-3 space-x-2 lg:space-y-0 ">
                                @if (Route::has('login'))
                                    @auth
                                        <div class="">
                                            <a href="{{ url('/dashboard') }}"
                                               class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                                        </div>
                                    @else
                                        <div
                                            class="space-x-2 rounded-full w-auto px-6 py-2 text-center text-sm font-normal tracking-wider bg-blue-500 hover:bg-blue-600 text-white">
                                            <a href="{{ route('login') }}" class="">Log
                                                in</a>
                                        </div>
                                        @if (Route::has('register'))
                                            <div
                                                class="rounded-full w-auto px-6 py-2 text-center text-sm font-normal tracking-wider bg-blue-500 hover:bg-blue-600 text-white">
                                                <a href="{{ route('register') }}"
                                                   class="">Register</a>
                                            </div>
                                        @endif
                                    @endauth

                                @endif

                            </div>
                        </div>
                        <div>
                            <div class="max-w-6xl mx-auto px-4">

                                {{ $slot }}

                            </div>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </body>
</html>
