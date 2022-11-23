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
    public $suggestions;

    public ?Post $nextPost = null;

    public ?Post $prevPost = null;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->getCategories();
        $this->mountSuggestions();

        $this->nextPost = Post::query()->where('id', '>', $post->id)->first();
        $this->prevPost = Post::query()->where('id', '<', $post->id)->first();
    }

    public function render()
    {
        return view('livewire.posts.show', ['comments' => $this->post->comments()->latest()->paginate(2)])->layout('layouts.auth');
    }

    public function getCategories()
    {
        $this->categories = Category::all();
    }

    protected function mountSuggestions()
    {
        $this->suggestions = Post::query()
            ->where('id', '<>', $this->post->id)
            ->take(4)
            ->get();
    }
}
