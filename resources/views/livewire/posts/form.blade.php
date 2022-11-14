<div class="pt-10">
    <p class="text-base text-black mt-5">CREATE POST</p>
    <form wire:submit.prevent="submit" class="flex flex-col ">
        <div class="flex flex-row items-center justify-between mt-6">
            <div class="bg-gray-200 w-60 h-60  grid place-content-center">
                <input type="file" accept="" wire:model="form.image">
            </div>
            <div class="flex flex-col w-2/3">
                <div>
                    <label for="">Title</label>
                    <input wire:model="form.title" class="mt-2 py-2 px-4 w-full rounded rounded-full"/>
                </div>
                <div class="w-full mt-6">
                    <label for="categories">Categories:</label>
                    <select name="categories" id="categories" wire:model="form.categories" multiple
                            class="w-full bg-white rounded-lg mt-2 py-2 px-4 border mt-2">
                        @foreach($categories as $category)
                            <option value="{{ $category->id  }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="mt-6">
            <label for="">Content</label>
            <textarea wire:model="form.body" rows="4" class="mt-2 w-full rounded rounded-lg"></textarea>
        </div>
        <div>
            <button type="submit" class="flex justify-end p-2 mt-6 bg-blue-500 w-20 rounded rounded-full shadow text-white">Save</button>
        </div>

    </form>
</div>
