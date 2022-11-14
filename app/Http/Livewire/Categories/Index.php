<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class Index extends Component
{

    public $categories;
    public $category;
    public $open = false;

    protected $listeners = [
        'deleteModal'
    ];

    public function mount()
    {
        $this->getCategories();
    }

    public function getCategories()
    {
        $this->categories = Category::all();
    }

    public function delete()
    {
        $this->category->delete();

        return redirect()->route('categories.index');
    }

    public function deleteModal(Category $category)
    {
        $this->category = $category;
        $this->open = true;
    }

    public function render()
    {
        return view('livewire.categories.index')->layout('layouts.auth');
    }
}

