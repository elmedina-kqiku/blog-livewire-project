<?php

use App\Http\Livewire\Categories\Create;
use App\Http\Livewire\Categories\Edit;
use App\Http\Livewire\Categories\Index;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/', \App\Http\Livewire\Dashboard\Dashboard::class)->name('dashboard');

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/home', \App\Http\Livewire\Home\Index::class)->name('home.index');
    Route::get('/categories', Index::class)->name('categories.index');
    Route::get('/categories/create', Create::class)->name('categories.create');
    Route::get('/categories/{category}/edit', Edit::class)->name('categories.edit');

    Route::get('/my/posts', \App\Http\Livewire\Posts\Index::class)->name('posts.index');
    Route::get('/my/posts/create', \App\Http\Livewire\Posts\Create::class)->name('posts.create');
    Route::get('/my/posts/{post}/edit', \App\Http\Livewire\Posts\Edit::class)->name('posts.edit');
    Route::get('/my/posts/{post}', \App\Http\Livewire\Posts\Show::class)->name('posts.show');
});
