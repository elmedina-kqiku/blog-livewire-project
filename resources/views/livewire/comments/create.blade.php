<div>
    <form wire:submit.prevent="submit" class="flex flex-col my-4">
        <div class="send-comment flex flex-row justify-between bg-gray-200 px-5 py-5">
            <x-icons.profileicon class="mb-12 h-14 w-14"/>
            <div class="flex flex-col justify-between bg-white w-full ml-6 py-3 px-6">
                <textarea name="sendComment" wire:model="content" rows="3"></textarea>
                <div class="flex flex-row justify-end items-center mt-2 ">
                    <x-icons.alternate-email class="ml-5 -h-4 w-4"/>
                    <x-icons.emoji class="ml-5 h-4 w-4"/>
                    <button type="submit" class="ml-5 bg-blue-500 hover:bg-blue-600 text-white rounded-full w-auto px-6 py-2 text-center text-sm font-normal tracking-wider">SEND COMMENT</button>
                </div>
            </div>
        </div>
    </form>
</div>
