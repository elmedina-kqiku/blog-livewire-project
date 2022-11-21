<?php

namespace App\Http\Livewire\Comments;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Create extends Component
{
    use WithPagination;

    public $content;
    public $post;

    protected $rules = [ 'content' => 'required|max:255'];

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function submit()
    {
        $data = $this->validate();

        $data['post_id'] = $this->post->id;
        $data['user_id'] = auth()->user()->id;

        $comment = Comment::query()->create($data);

        return redirect()->route('posts.show', $this->post);
    }

    public function render()
    {
        return view('livewire.comments.create');
    }
}
