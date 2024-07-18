<div>
    <div class="container mt-4 p-4 bg-light rounded shadow">
        <h1 class="h3 mb-4 text-center">{{ $edit ? 'Update' : 'Book Collection' }}</h1>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <form wire:submit.prevent="{{ $edit ? 'update' : 'save' }}">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" wire:model.defer="title" class="form-control @error('title') is-invalid @enderror">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Author</label>
                <input type="text" wire:model.defer="author" class="form-control @error('author') is-invalid @enderror">
                @error('author')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea wire:model.defer="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Published Year</label>
                <input type="number" wire:model.defer="published_year" class="form-control @error('published_year') is-invalid @enderror">
                @error('published_year')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">{{ $edit ? 'Update' : 'Save' }}</button>
            </div>
        </form>
    </div>

    <hr>

    <div class="container mt-4 p-4 bg-light rounded shadow">
        <h1 class="h3 mb-4 text-center">Book Lists</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Description</th>
                        <th scope="col">Published Year</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $index => $book)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="fw-bold">{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->description }}</td>
                            <td>{{ $book->published_year }}</td>
                            <td>
                                <button class="btn btn-sm btn-primary mr-2" wire:click="editBook({{ $book->id }})">Edit</button>
                                <button class="btn btn-sm btn-danger" wire:click='setDelete({{ $book->id }})' data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Delete Modal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this book?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" wire:click="deleteBook">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
