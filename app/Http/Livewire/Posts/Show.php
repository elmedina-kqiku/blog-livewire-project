<?php

namespace App\Http\Livewire\Posts;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public $post;
    public $categories;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->getCategories();
    }

    public function render()
    {
        return view('livewire.posts.show', ['comments' => $this->post->comments()->latest()->paginate(2)])->layout('layouts.auth');
    }

    public function getCategories()
    {
        $this->categories = Category::all();
    }

}
