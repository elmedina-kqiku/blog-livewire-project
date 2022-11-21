<?php

namespace App\Http\Livewire\Home;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $posts = $this->getPosts();
        $categories = $this->getCategories();
        return view('livewire.home.index', compact('posts', 'categories'))->layout('layouts.auth');
    }

    public function getPosts()
    {
        return Post::paginate(8);
    }

    public function getCategories()
    {
        return Category::all();
    }
}
