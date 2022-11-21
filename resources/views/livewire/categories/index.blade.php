<div class="mt-10">
    <div class="mb-4">
        <a href="{{route('categories.create')}}"
            class="bg-blue-500 hover:bg-blue-600 text-white rounded-full w-auto px-6 py-2 text-center text-sm font-normal tracking-wider">
            CREATE
        </a>
    </div>

    <table class="w-full bg-white border-1 border-gray-300 " id="dataTable">
        <thead>
        <tr class="border-b">
            <th class="text-left p-3 text-sm text-gray-500">Name</th>
            <th class="text-left p-3 text-sm text-gray-500">Created At</th>
            <th class="text-left p-3 text-sm text-gray-500">Edit</th>
            <th class="text-left p-3 text-sm text-gray-500">Delete</th>
        </tr>
        </thead>

        <tbody>
        @foreach($categories as $category)
            <tr class="border-b ">
                <td class="p-3 text-sm text-gray-500">{{$category->name}}</td>
                <td class="p-3 text-sm text-gray-500">{{$category->created_at ? $category->created_at->diffForHumans() : 'No Date'}}</td>
                <td class="p-3 text-sm text-white">
                    <a type="button" href="{{ route('categories.edit', $category) }}" class="bg-blue-200 rounded rounded-md py-1 px-2">
                        Edit
                    </a>
                </td>
                <td class="p-3 text-sm text-white">
                    <button class="bg-red-200 rounded rounded-md py-1 px-2"
                            wire:click.prevent="remove({{ $category->id }})">
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
