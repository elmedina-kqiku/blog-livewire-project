<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class Index extends Component
{

    public function remove(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index');
    }


    public function render()
    {
        return view('livewire.categories.index', [
            'categories' => Category::paginate(10),
        ])->layout('layouts.auth');
    }
}

