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
    public $bookId,$deleteId, $edit = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'description' => 'required|string',
        'published_year' => 'required|integer',
    ];

    public function render()
    {
        $books = Book::all();
        return view('livewire.book-form', compact('books'));
    }

    public function save()
    {
        $validatedData = $this->validate();

        Book::create($validatedData);

        session()->flash('message', 'Book created successfully');

        $this->reset(['title', 'author', 'description', 'published_year']);
    }

    public function editBook($id)
    {
        $this->bookId = $id;
        $this->edit = true;

        $book = Book::findOrFail($id);
        $this->title = $book->title;
        $this->author = $book->author;
        $this->description = $book->description;
        $this->published_year = $book->published_year;
    }

    public function update()
    {
        $validatedData = $this->validate();

        $book = Book::findOrFail($this->bookId);
        $book->update($validatedData);

        session()->flash('message', 'Book updated successfully');

        $this->reset(['title', 'author', 'description', 'published_year', 'edit', 'bookId']);
    }

    public function setDelete($id){
        $this->deleteId = $id;

    }

    public function deleteBook(){
        $book = Book::findOrFail($this->bookId);
        $book->delete();
        session()->flash('message', 'Book deleted');
        $this->reset('bookId');
        $this->dispatchBrowserEvent('closeModal');
    }
}
