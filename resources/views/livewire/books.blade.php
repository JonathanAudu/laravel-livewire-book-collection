<div>
    <h1 class="text-2xl font-bold mb-4 text-center">Book List</h1>
    <ul class="space-y-4">
        @foreach($books as $book)
            <li class="p-4 bg-white rounded shadow">
                <h2 class="text-xl font-semibold">{{ $book->title }}</h2>
                <p class="text-gray-600">{{ $book->author }}</p>
                <p class="text-gray-800">{{ $book->description }}</p>
                <p class="text-gray-600">Published Year: {{ $book->published_year }}</p>
                <div class="mt-2">
                    <button class="text-blue-500" wire:click="$emitTo('book-form', 'edit', {{ $book->id }})">Edit</button>
                    <button class="text-red-500" wire:click="$emitTo('book-form', 'delete', {{ $book->id }})">Delete</button>
                </div>
            </li>
        @endforeach
    </ul>
</div>
