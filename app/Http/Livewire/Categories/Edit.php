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

        // WE GET $this->category, because we have $category in mount
        $this->category->update($data);

        session()->flash('message', 'Category successfully updated.');

        return redirect()->route('categories.index');
    }

    public function delete()
    {
        $data = $this->validate($this->rules);

        $this->category->delete($data);
    }
}
