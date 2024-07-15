<div>
    <h1 class="text-2xl font-bold mb-4 text-center">Book Lists</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr class="border-b">
                    <th class="py-2 px-4 text-start">#</th>
                    <th class="py-2 px-8 text-start">Title</th>
                    <th class="py-2 px-8 text-start">Author</th>
                    <th class="py-2 px-8 text-start">Description</th>
                    <th class="py-2 px-4 text-start">Published Year</th>
                    <th class="py-2 px-6 text-start">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $index => $book)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $index + 1 }}</td>
                        <td class="py-2 px-4 font-bold">{{ $book->title }}</td>
                        <td class="py-2 px-4">{{ $book->author }}</td>
                        <td class="py-2 px-4">{{ $book->description }}</td>
                        <td class="py-2 px-4">{{ $book->published_year }}</td>
                        <td class="py-2 px-4">
                            <button class="text-blue-500 mr-2 bg-blue-100 p-2 rounded"
                                wire:click="$dispatchTo('book-form', 'edit', {{ $book->id }})">Edit</button>
                            <button class="text-red-500 bg-red-100 p-2 rounded"
                                wire:click="$dispatchTo('book-form', 'delete', {{ $book->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
