<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class Books extends Component
{


    public function render()
    {
        return view('livewire.book-form', [
            'books' => Book::all(),
        ]);
    }
}
