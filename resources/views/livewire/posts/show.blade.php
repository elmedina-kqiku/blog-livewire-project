<div class=" grid grid-cols-1 lg:grid-cols-3 lg:max-w-full max-w-2xl gap-20 gap-20 lg:gap-40  pt-12  text-sm ">
    <div class="col-span-1 lg:col-span-2 w-[794px] space-y-4">

        <div class="space-y-3 w-full ">
            <div class="w-full h-96">
                @if($post->image)
                    <div class="w-full h-full">
                        <img src="{{asset($post->image_url)}}" class="w-full object-cover h-full"/>
                    </div>
                @else
                    <div class="bg-gray-300 w-full object-cover h-full">

                    </div>
                @endif
            </div>

            <p class="text-black font-bold uppercase">
                {{$post->title}}
            </p>
            <div class="py-4 flex flex-row justify-between w-full border-y border-gray-200 ">
                <div class="flex flex-wrap flex-row">
                    <x-icons.profileicon class=""/>
                    <p class="pl-2">
                        By <a class="text-blue-400">{{$post->user->name}}</a>
                    </p>
                </div>
                <p class="text-gray-500 text-xs tracking-wider">
                    Posted at {{$post->created_at->diffForHumans()}}
                </p>
            </div>
            <div class="flex flex-wrap gap-3 ">
                @foreach($post->categories as $category)
                    <p class="bg-blue-100 rounded-full px-6 py-2 text-black items-center text-xs tracking-wider font-normal ">
                        {{$category->name}}
                    </p>
                @endforeach
            </div>
            <p class="text-xs text-gray-500 tracking-wider">{{$post->body}}</p>
        </div>


        <div class="flex justify-between tracking-wider ">
            <button>PREVIOUS</button>
            <button>Next</button>
        </div>

        <p class="border-b border-gray-200 pb-4 text-sm font-normal text-black tracking-wider ">
            Comments ({{ $post->comments()->count() }})
            {{--                        ({{ comments.length}})--}}
        </p>

        @foreach($comments as $comment)
            <div class="flex flex-row space-x-5 justify-between ml-3 pt-8">
                <x-icons.profileicon class="mb-12 h-14 w-14"/>
                <div class="flex flex-col py-2 px-6 space-y-1 bg-white w-full">
                    <div class="flex flex-row space-x-3">
                        <p class="text-xs text-black font-bold ">
                            {{$comment->user->name}}
                        </p>
                        <p class="text-xs text-gray-500">
                            {{$comment->created_at->diffForHumans()}}
                        </p>
                    </div>
                    <p class="text-xs text-gray-500">
                        {{$comment->content}}
                    </p>
                    <p class="text-xs text-blue-500  font-bold flex justify-end">
                        <a href="">Reply</a>
                    </p>
                </div>
            </div>

        @endforeach
        <div>
            {{ $comments->links() }}
        </div>

        <livewire:comments.create :post="$post"/>

    </div>
    <div class="col-span-1 lg:col-span-1  flex flex-col space-y-14">
        <div class="flex flex-col space-y-3">
            <p class="uppercase text-sm font-normal ">More like this</p>
            <SugesstionsVue v-for="post in posts" :key="post.id" :post="post"/>
        </div>
        <div class="flex flex-col space-y-3">
            <p class="uppercase text-sm font-normal tracking-wider ">Categories</p>
            <ul class="flex flex-col space-y-3 text-sm font-normal text-gray-500 tracking-wider">
                @foreach($categories as $category)
                    <li>{{$category->name}}</li>
                @endforeach
            </ul>
        </div>
        <div class="flex flex-wrap">
            @foreach($post->categories as $category)
                <p class="bg-blue-100 rounded-full px-6 py-2 text-black items-center text-xs tracking-wider font-normal ">
                    {{$category->name}}

                </p>
            @endforeach
        </div>
    </div>
</div>


