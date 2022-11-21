<?php

namespace App\Http\Livewire\Posts;

use App\Models\Category;
use App\Traits\FileManager;
use App\Traits\WithCustomFileUploads;
use Illuminate\Support\Str;
use Livewire\Component;
class PostComponent extends Component
{
    use WithCustomFileUploads;
    use FileManager;

    public $post;
    public $form = [
        'title' => null,
        'body' => null,
        'categories' => []
    ];
    public $image;
    public $categories = [];

    protected $rules = [
        'form.title' => 'required|string|min:3|max:255',
        'form.body' => 'required|string',
        'form.image' => 'nullable|string',
    ];

    public function updatedImage($value)
    {
        $this->form['image_url'] = $value->temporaryUrl();
    }

    public function getCategories()
    {
        $this->categories = Category::query()->orderBy('name')->get()->toArray();
    }
    public function render()
    {
        return view('livewire.posts.form')->layout('layouts.auth');
    }
}
