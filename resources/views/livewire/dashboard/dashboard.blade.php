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
<body>


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
            <nav class="pt-14">
                <ul class="flex flex-col lg:flex-row border-b border-gray-200 lg:space-x-8 text-sm font-medium tracking-wider text-gray-400 ">
                    @foreach($categories as $category)
                        <a href="#">
                            {{$category->name}}

                        </a>
                    @endforeach
                </ul>
            </nav>

            <div class="pt-8 pl-0 grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach($posts as $post)
                    <a href="{{ route('posts.show', $post) }}">
                        <div class="space-y-2 text-sm">
                            <div class="relative">
                                <div class="flex flex-row absolute justify-around items-center px-1 py-0 bg-white w-12 h-5 top-1 right-1">
                                    <x-icons.message class="mt-1 h-3 w-3"/>
                                    <p class="text-xs"> ({{ $post->comments()->count() }}) </p>
                                </div>
                                @if($post->image)
                                    <div>
                                        <img src="{{asset($post->image_url)}}" alt="image" class=" w-full h-40 object-cover">
                                    </div>
                                @else
                                    <div class=" w-full h-40 object-cover bg-gray-500">
                                    </div>
                                @endif
                            </div>

                            <p class="text-gray-700 font-bold truncate">
                                {{ $post->title }}
                            </p>

                            <div class="py-1 flex flex-row justify-between w-full border-y border-gray-200 ">
                                <x-icons.profileicon />

                                <p class="text-gray-500 text-xs tracking-wider">
                                    Posted at {{ $post->created_at->diffForHumans()}}
                                </p>
                            </div>
                            <p class="text-gray-500 truncate">{{ $post->content }}</p>
                            <p class="text-blue-400 font-medium tracking-wider ">
                                <span class=" hover:border-b border-blue-200 ">READ MORE</span>
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-5">
                {{ $posts->links() }}
            </div>

        </div>
    </div>
</div>
</body>
