<?php

use App\Http\Livewire\Categories\Create;
use App\Http\Livewire\Categories\Edit;
use App\Http\Livewire\Categories\Index;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/categories', Index::class)->name('categories.index');
    Route::get('/categories/create', Create::class)->name('categories.create');
    Route::get('/categories/{category}/edit', Edit::class)->name('categories.edit');

    Route::get('/my/posts', \App\Http\Livewire\Posts\Index::class)->name('posts.index');
    Route::get('/my/posts/create', \App\Http\Livewire\Posts\Create::class)->name('posts.create');
    Route::get('/my/posts/{post}/edit', \App\Http\Livewire\Posts\Edit::class)->name('posts.edit');
    Route::get('/my/posts/{post}', \App\Http\Livewire\Posts\Show::class)->name('posts.show');
});
