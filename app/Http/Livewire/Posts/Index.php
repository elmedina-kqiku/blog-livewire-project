<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class Index extends Component
{
    public $posts;
    public $post;

    public function mount()
    {
        $this->getPosts();
    }

    public function getPosts()
    {
        $this->posts = Post::all();
    }

    public function render()
    {
        return view('livewire.posts.index')->layout('layouts.auth');
    }
}
