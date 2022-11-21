<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public $posts;
    public $categories;

    public function render()
    {
        $posts = $this->getPosts();
        $categories = $this->getCategories();
        return view('livewire.dashboard.dashboard', compact('posts', 'categories'));
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
