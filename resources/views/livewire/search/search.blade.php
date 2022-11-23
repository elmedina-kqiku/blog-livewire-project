<div class="relative">
    <div class="relative items-center">
        <div class="flex absolute inset-y-0 pl-3 items-center pointer-events-none">
            <x-icons.search class="w-5 h-5"/>
        </div>
        <input type="search" placeholder="Search Posts..."
               wire:model.debounce.500="q"
               class="border border-gray-300 lg:w-96 h-full rounded-full px-9 py-2 text-left text-sm text-gray-500 outline-none">
    </div>

    @if($posts->isNotEmpty())
        <div class="absolute rounded-md bg-white w-full z-10 overflow-auto max-h-[400px] shadow p-2 space-y-4">
            @foreach($posts as $post)
                <a href="#"
                   wire:click.prevent="goToPost('{{ $post->id }}')"
                   class="flex flex-row items-center gap-4 hover:bg-gray-50"><p
                        class="flex shrink-0">
                        <img
                            alt="img"
                            src="{{ $post->image_url }}"
                            class="object-cover w-16 h-16"></p>
                    <div class="flex flex-col justify-between space-y-2 text-xs">
                        <p class="font-normal tracking-wider uppercase">
                            {{ $post->title }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>
