<div>
    <nav class="pt-14">
        <ul class="flex flex-col lg:flex-row border-b  lg:space-x-8 text-sm font-medium tracking-wider text-gray-400 ">
            @foreach($categories as $category)
                <a href="#"
                   class="{{ $category->id == $categoryId ? 'border-b-2 text-blue-500 border-blue-500'  : 'border-b border-gray-200'}}"
                   wire:click="$set('categoryId', '{{ $category->id }}')">
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
                        <div
                            class="flex flex-row absolute justify-around items-center px-1 py-0 bg-white w-12 h-5 top-1 right-1">
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
                        <x-icons.profileicon/>

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
