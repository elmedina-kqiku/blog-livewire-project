<div class=" grid grid-cols-1 lg:grid-cols-3 lg:max-w-full max-w-2xl gap-20 gap-20 lg:gap-40  pt-12  text-sm ">
    <div class="col-span-1 lg:col-span-2 space-y-4">
        <div class="space-y-3 w-[794px] h-96">
            @if($post->image)
                <div class="w-full h-full">
                    <img src="{{asset($post->image_url)}}" class="w-full object-cover h-full"/>
                </div>
            @else
                <div class="bg-gray-300 w-full object-cover h-full">

                </div>
            @endif
            <p class="text-black font-bold uppercase">
                {{$post->title}}
            </p>
            <div class="py-4 flex flex-row justify-between w-full border-y border-gray-200 ">
                <div class="flex flex-wrap flex-row">
                    <x-icons.profileicon  class=""/>
                    <p class="pl-2">
                        By <a class="text-blue-400">{{$post->user_id}}</a>
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

        {{--            <div class="flex justify-between tracking-wider ">--}}
        {{--                <router-link v-if="previousPost" :to="'/profile/posts/'+previousPost.id">PREVIOUS</router-link>--}}
        {{--                <router-link v-if="nextPost" :to="'/profile/posts/'+nextPost.id" class="uppercase">Next</router-link>--}}
        {{--            </div>--}}
        {{--            <p class="border-b border-gray-200 pb-4 text-sm font-normal text-black tracking-wider ">--}}
        {{--                Comments ({{ comments.length}})--}}
        {{--            </p>--}}
        {{--            <div v-if="comments">--}}
        {{--                <div class="" v-for="comment in comments" :key="comment.id" :post="comment">--}}

        {{--                    <div class="flex flex-row space-x-5 justify-between ml-3 pt-8">--}}
        {{--                        <img v-if="getCommentUserImage(comment)" :src="getCommentUserImage(comment)" class="mb-12 h-14 w-14" />--}}
        {{--                        <img v-if="!getCommentUserImage(comment)" src="@/assets/images/profileicon.svg" class="mb-12 h-14 w-14" />--}}
        {{--                        <div class="flex flex-col py-2 px-6 space-y-1 bg-white w-full">--}}
        {{--                            <div class="flex flex-row space-x-3">--}}
        {{--                                <p class="text-xs text-black font-bold">{{comment.user.first_name}}></p>--}}
        {{--                                <p class="text-xs text-gray-500">{{formatDate(comment.created_at)}}</p>--}}
        {{--                            </div>--}}

        {{--                            <div class="comment-reply flex my-1 mx-2 bg-gray-100 py-1 px-2 rounded-sm" v-if="comment && comment.replyable">--}}
        {{--                                <div class="flex icon items-center justify-center mr-1 transform rotate -rotate-90">--}}
        {{--                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">--}}
        {{--                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-6 6m0 0l-6-6m6 6V9a6 6 0 0112 0v3" />--}}
        {{--                                    </svg>--}}
        {{--                                </div>--}}
        {{--                                <div class="flex flex-col">--}}
        {{--                                    <p class="font-semibold">{{comment.replyable.user.first_name + ' ' + comment.replyable.user.last_name}}</p>--}}
        {{--                                    <p>{{ comment.replyable.text }}</p>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}

        {{--                            <p class="text-xs text-gray-500">--}}
        {{--                                {{comment.text}}--}}
        {{--                            </p>--}}

        {{--                            <div class="w-16" v-if="comment && comment.resources.length >= 1">--}}
        {{--                                <img class="w-full h-full" :src="comment?.resources[0]?.preview_url" alt="comment image">--}}
        {{--                            </div>--}}

        {{--                            <p class="text-xs text-blue-500  font-bold flex justify-end">--}}
        {{--                                <a href="">Reply</a>--}}
        {{--                            </p>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="w-full py-2 flex items-center justify-center">--}}
        {{--                <button @click="loadMore" class="px-3 py-1 bg-transparent border border-blue-400 rounded-sm text-blue-400 uppercase">Load more</button>--}}
        {{--            </div>--}}

        {{--            <div>--}}
        {{--                <div class="send-comment flex flex-row justify-between bg-gray-200 px-5 py-5">--}}
        {{--                    <img src="@/assets/images/profileicon/profileicon.svg" alt="" class="mb-12 h-14 w-14">--}}
        {{--                    <div class="flex flex-col justify-between bg-white w-full ml-6 py-3 px-6">--}}
        {{--                        <textarea name="sendComment" v-model="commentToSend" rows="3"></textarea>--}}
        {{--                        <div class="flex flex-row justify-end items-center">--}}
        {{--                            <img src="@/assets/images/alternate_email_icon.svg" alt="" class="ml-5 -h-4 w-4">--}}
        {{--                            <img src="@/assets/images/emojiicon.svg" alt="" class="ml-5 h-4 w-4">--}}
        {{--                            <ButtonVue class="ml-5" @click="sendComment()">SEND COMMENT</ButtonVue>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}

        {{--            </div>--}}
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
