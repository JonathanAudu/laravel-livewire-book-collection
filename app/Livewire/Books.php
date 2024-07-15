<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class Books extends Component
{
    protected $listeners = ['bookUpdated' => '$refresh'];

    public function render()
    {
        return view('livewire.books', [
            'books' => Book::all(),
        ]);
    }
}
