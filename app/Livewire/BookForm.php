<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class BookForm extends Component
{
    public $title;
    public $author;
    public $description;
    public $published_year;
    public $bookId;

    protected $rules = [
        'title' => 'required|string|unique:books|max:255',
        'author' => 'required|string|max:255',
        'description' => 'required|string',
        'published_year' => 'required|integer',
    ];

    public function save()
    {
        $this->validate();

        if ($this->bookId) {
            $book = Book::find($this->bookId);
            if ($book) {
                $book->update([
                    'title' => $this->title,
                    'author' => $this->author,
                    'description' => $this->description,
                    'published_year' => $this->published_year,
                ]);

                session()->flash('message', 'Book successfully updated.');
                $this->reset(['title', 'author', 'description', 'published_year', 'bookId']);
                $this->dispatch('bookUpdated');
            }

        } else {
            Book::create([
                'title' => $this->title,
                'author' => $this->author,
                'description' => $this->description,
                'published_year' => $this->published_year,
            ]);

            session()->flash('message', 'Book successfully added.');
            $this->reset(['title', 'author', 'description', 'published_year', 'bookId']);
            $this->dispatch('bookAdded');
        }
    }

    public function edit($id)
    {
        $book = Book::find($id);
        if ($book) {
            $this->bookId = $book->id;
            $this->title = $book->title;
            $this->author = $book->author;
            $this->description = $book->description;
            $this->published_year = $book->published_year;
        }
    }

    public function delete($id)
    {
        $book = Book::find($id);
        if ($book) {
            $book->delete();
            session()->flash('message', 'Book successfully deleted.');
            $this->emit('bookUpdated');
        }
    }

    public function render()
    {
        return view('livewire.book-form');
    }
}
