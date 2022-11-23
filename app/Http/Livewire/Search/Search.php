<?php

namespace App\Http\Livewire\Search;

use App\Models\Post;
use Illuminate\Support\Collection;
use Livewire\Component;

class Search extends Component
{
    public $q;

    public function render()
    {
        $posts = $this->getPosts();

        return view('livewire.search.search', compact('posts'));
    }

    protected function getPosts(): Collection
    {
        if (strlen($this->q) < 3) {
            return collect();
        }

        return Post::query()
            ->where('user_id', auth()->id())
            ->where(function ($query) {
                $query->where('title', 'like', "%{$this->q}%")
                    ->orWhere('body', 'like', "%{$this->q}%");
            })
            ->take(25)
            ->get();
    }

    /*
     *
     *
     */

    public function goToPost(Post $post)
    {
        return to_route('posts.show', $post);
    }
}
