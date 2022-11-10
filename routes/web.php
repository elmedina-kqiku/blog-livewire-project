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
});
