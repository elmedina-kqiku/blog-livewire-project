<?php

namespace App\Http\Livewire\Posts;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class Show extends Component
{
    public $post;
    public $categories;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->getCategories();
    }

    public function render()
    {
        return view('livewire.posts.show')->layout('layouts.auth');
    }

    public function getCategories()
    {
        $this->categories = Category::all();
    }

}
