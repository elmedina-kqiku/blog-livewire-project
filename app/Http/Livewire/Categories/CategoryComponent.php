<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;

class CategoryComponent extends Component
{
    public $name;
    public $category;

    protected $rules = ['name' => 'required|max:20'];

    public function render()
    {
        return view('livewire.categories.form')->layout('layouts.auth');;
    }

}
