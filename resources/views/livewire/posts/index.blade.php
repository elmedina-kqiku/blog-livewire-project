<div>
    {{-- Do your work, then step back. --}}

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
                <td class="p-3 text-sm text-gray-900 font-normal flex flex-row">
                    <img alt="" class="w-16 h-10"/>
                    <p class="ml-2">{{$post->title}}</p>
                </td>
                {{--            <td class="p-3 text-xs text-gray-500">{{$post->comments}}</td>--}}
                <td class="p-3 text-xs text-gray-500">
                    @foreach($post->categories as $category)
                        {{$category->name}}
                    @endforeach
                </td>
                <td class="p-3 text-xs text-gray-500">{{$post->created_at->diffForHumans()}}</td>
                <td class="p-3 text-xs text-gray-500 flex flex-row">
                    <p>{{$post->updated_at->diffForHumans()}}</p>
                </td>
                <td>
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
                                wire:click.prevent=""
                                class="text-left">
                                Delete
                            </x:dropdown-link>
                        </x:slot>
                    </x-dropdown>
                </td>
                {{--                <button  class="w-4 h-4">--}}
                {{--                    <img src="@/assets/images/threedots_vertical.svg" alt="" class=""/>--}}
                {{--                </button>--}}

                {{--                <div v-if="detailsAreVisible" class="bg-white border border-md ">--}}
                {{--                    <ul>--}}
                {{--                        <li class="flex flex-row hover:bg-gray-100 p-2">--}}
                {{--                            <img src="@/assets/images/pen_icon.svg" class="w-4 h-4"/>--}}
                {{--                            <x-icons.pen />--}}
                {{--                            <p class="ml-3">Edit Post</p>--}}
                {{--                        </li>--}}
                {{--                        <li class="flex flex-row hover:bg-gray-100 p-2">--}}
                {{--                            <img src="@/assets/images/delete_icon.svg" class="w-4 h-4"/>--}}
                {{--                            <x-icons.delete />--}}
                {{--                            <p class="ml-3">Delete Post</p>--}}
                {{--                        </li>--}}
                {{--                    </ul>--}}
                {{--                </div>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
