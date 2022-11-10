<div class="pt-10">
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    <p >{{isset($category) ? 'Edit' : 'Create'}} Category</p>
    <form wire:submit.prevent="{{isset($category) ? 'edit' : 'create'}}" class="flex flex-col my-4">

        <input type="text" wire:model="name" class="w-1/3 rounded rounded-full border shadow p-2 mr-2 my-2" placeholder="Name" />
        @error('name')
        <div  class="text-sm text-red-600 mt-1">{{ $message }}</div>
        @enderror
        <button type="submit" class="p-2 mt-5 bg-blue-500 w-20 rounded rounded-full shadow text-white">{{isset($category) ? 'Edit' : 'Create'}}</button>
    </form>

</div>
