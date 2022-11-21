<div class="py-10">
    <div>
        <table class="w-full">
            <thead class="text-xs font-normal">
            <tr>
                <th class="p-3 text-left">TITLE</th>
                {{--            <th class="p-3 text-left">COMMENTS</th>--}}
                <th class="p-3 text-left">CATEGORY</th>
                <th class="p-3 text-left">POSTED AT</th>
                <th class="p-3 text-left">LAST UPDATED</th>
                <th></th>
            </tr>
            </thead>
            <tbody class="bg-white">
            @foreach($posts as $post)
                <tr class="ml-6">
                    <td class="p-3 text-sm text-gray-900 font-normal flex flex-row h-20">
                        <a href="{{ route('posts.show', $post) }}" class="flex flex-row items-center">
                            @if($post->image)
                                <div class="w-20 h-full">
                                    <img src="{{asset($post->image_url)}}" class="w-20 h-full "/>
                                </div>
                            @else
                                <div class="bg-gray-300 w-20 h-full">

                                </div>
                            @endif
                            <p class="ml-2">{{$post->title}}</p>
                        </a>
                    </td>
                    {{--            <td class="p-3 text-xs text-gray-500">{{$post->comments}}</td>--}}
                    <td class="p-3 text-xs text-gray-500">
                        @foreach($post->categories as $category)
                            {{$category->name}}
                        @endforeach
                    </td>
                    <td class="p-3 text-xs text-gray-500">{{$post->created_at->diffForHumans()}}</td>
                    <td class="p-3 text-xs text-gray-500">{{$post->updated_at->diffForHumans()}}</td>
                    <td>
                        @if(auth()->user()->can('update', $post))
                        <x-dropdown>
                            <x:slot name="trigger">
                                <button type="button" class="focus:outline-none">
                                    <x:icons.threedots_vertical class="w-5 h-5"/>
                                </button>
                            </x:slot>
                            <x:slot name="content">
                                <x:dropdown-link href="{{route('posts.edit', $post)}}" class="text-left">
                                    Edit
                                </x:dropdown-link>

                                <x:dropdown-link
                                    wire:click.prevent="remove({{ $post->id }})"
                                    class="text-left">
                                    Delete
                                </x:dropdown-link>
                            </x:slot>
                        </x-dropdown>
                        @endif
                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
    <div class="mt-5">
        {{ $posts->links() }}
    </div>
</div>
