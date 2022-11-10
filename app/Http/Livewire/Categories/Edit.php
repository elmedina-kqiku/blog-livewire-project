<?php

namespace App\Http\Livewire\Categories;



use App\Models\Category;

class Edit extends CategoryComponent
{


    public function mount(Category $category)
    {
        $this->category = $category;

        $this->name = $category->name;
    }
    public function edit()
    {
        $data = $this->validate($this->rules);

        // WE GET $this->category, because we have this in mount
        $this->category->update($data);

        return redirect()->route('categories.index');
    }


}
