<?php

use App\Livewire\Books;
use App\Livewire\BookForm;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('books');
});

Route::get('/books', Books::class)->name('books');
Route::get('/book-form', BookForm::class)->name('book-form');
