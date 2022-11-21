<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $posts = Post::query()->where('user_id', auth()->user()->id)->latest()->paginate(5);

        return view('livewire.posts.index', compact('posts'))->layout('layouts.auth');
    }

    public function remove(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
