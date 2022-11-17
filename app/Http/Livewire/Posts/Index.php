<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class Index extends Component
{
    public $posts;
    public $post;
    protected $appends = [
        'image_url',
    ];

    public function mount()
    {
        $this->getPosts();
    }

    public function getPosts()
    {
        $this->posts = Post::query()->where('user_id', auth()->user()->id)->get();
    }

    public function render()
    {
        return view('livewire.posts.index')->layout('layouts.auth');
    }
}
