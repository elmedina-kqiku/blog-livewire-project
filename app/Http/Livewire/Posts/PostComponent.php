<?php

namespace App\Http\Livewire\Posts;

use App\Models\Category;
use Livewire\Component;

class PostComponent extends Component
{
    public $form = [
        'title' => null,
        'body' => null,
        'categories' => []
    ];
    public $image;
    public $categories = [];

    protected $rules = [
        'form.title' => 'required|string|min:3|max:255',
        'form.body' => 'required|string',
        'form.image' => 'nullable|string',
        'form.categories' => 'required|exists:categories,id'
    ];


    public function  getCategories()
    {
        $this->categories = Category::query()->get();
    }
    public function render()
    {
        return view('livewire.posts.form')->layout('layouts.auth');
    }
}
