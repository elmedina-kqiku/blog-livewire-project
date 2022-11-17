<?php

namespace App\Http\Livewire\Posts;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\UploadedFile;
use Livewire\Component;

class Create extends PostComponent
{

    public function  mount()
    {
        $this->getCategories();

    }
    public function submit()
    {
        $data = $this->validate()['form'];

        if ($this->image instanceof UploadedFile) {
            $data['image'] = $this->putUploadedFile($this->image);
        }

        $data['user_id'] = auth()->user()->id;

        $post = Post::query()->create($data);

        $post->categories()->sync($this->form['categories']);

        return redirect()->route('posts.index');
    }

}
