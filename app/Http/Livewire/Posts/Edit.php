<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Illuminate\Http\UploadedFile;
use Livewire\Component;

class Edit extends PostComponent
{
    public function mount(Post $post)
    {
        $this->post = $post;
        $this->getCategories();
        $this->form = [
            'image_url' => $post->image_url,
            'title' => $post->title,
            'body'  => $post->body,
            'categories' =>  $post->categories()->pluck('category_id')->toArray()
        ];
    }

    public function submit()
    {
        $data = $this->validate()['form'];

        if ($this->image instanceof UploadedFile) {
            $data['image'] = $this->putUploadedFile($this->image);
        }

        $this->post->update($data);



        $this->post->categories()->sync($this->form['categories']);

        return redirect()->route('posts.index');
    }
}
