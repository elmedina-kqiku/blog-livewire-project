<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class Edit extends PostComponent
{
    public function mount(Post $post)
    {
        $this->form = $post;
        $this->categories = $post->categories()->get();
    }


}
