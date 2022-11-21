<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Category;
use App\Models\Post;

use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public ?int $categoryId = null;

    protected $queryString = [
        'categoryId'
    ];

    public function render()
    {
        $posts = $this->getPosts();
        $categories = $this->getCategories();

        return view('livewire.dashboard.dashboard', compact('posts', 'categories'));
    }

    public function getPosts()
    {
        return Post::query()
            ->when(
                $this->categoryId,
                fn(Builder $builder) => $builder->whereRelation('categories', 'categories.id', $this->categoryId)
            )
            ->paginate(8);
    }

    public function getCategories()
    {
        return Category::query()->get();
    }
}
