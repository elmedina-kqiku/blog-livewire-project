<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;

class Create extends CategoryComponent
{

    public function create()
    {
        $data = $this->validate($this->rules);

        $category = Category::create($data);

        session()->flash('message', 'Category successfully updated.');

        return redirect()->route('categories.index');

    }
}
