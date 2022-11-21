<div class="pt-10">
    <p class="text-base text-black mt-5">{{isset($post) ? 'EDIT POST' : 'CREATE POST'}}</p>
    <form enctype="multipart/form-data"
          wire:submit.prevent="submit" class="flex flex-col ">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mt-6">
            <div class=" w-60 h-60  grid place-content-center">
                <div class="mt-1 flex items-center">
                    <div class="bg-gray-100 h-20 overflow-hidden rounded-md w-32">
                        @if($url = $form['image_url'] ?? false)
                            <img src="{{ $url }}"
                                 class="w-full h-full object-cover"
                                 alt="img">
                        @else
                            <div class="w-full h-full bg-gray-200"></div>
                        @endif
                    </div>
                    <label type="button"
                           class="cursor-pointer ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span>
                                    @if($form['image_url'] ?? false)
                                        Change
                                    @else
                                        Add Image
                                    @endif
                                </span>
                        <input type="file" wire:model="image" accept="image/*" class="hidden"/>
                    </label>
                </div>
            </div>
            <div class="flex flex-col w-2/3">
                <div>
                    <label for="">Title</label>
                    <input wire:model="form.title" class="mt-2 py-2 px-4 w-full rounded rounded-lg
                    border border-gray-300 focus:outline-none
                        focus:border-indigo-200 focus:ring-indigo-200 focus:ring-1"/>
                </div>
                <div class="w-full mt-6">
                    <p class="mb-2">Categories</p>
                    <x:custom-multiselect
                        :key="Illuminate\Support\Str::random()"
                        selected="form.categories"
                        items="categories"
                        title="Select Categories"
                    >
                        <x:slot name="trigger">Categories</x:slot>
                        <x:slot name="item">
                            <span class="mx-2 truncate" x-text="item.name"></span>
                        </x:slot>
                    </x:custom-multiselect>
                </div>
            </div>
        </div>
        <div class="mt-6">
            <label for="">Content</label>
            <textarea wire:model="form.body" rows="4" class="mt-2 w-full rounded rounded-md
           focus:outline-none focus:border-indigo-200 focus:ring-indigo-200 focus:ring-1
           border border-gray-300
            "></textarea>
        </div>
        <div class="flex justify-end">
            <button type="submit" class=" p-2 mt-6 bg-blue-500 w-20 rounded rounded-full shadow text-white">Save
            </button>
        </div>

    </form>
</div>

