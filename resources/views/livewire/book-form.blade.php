<div class="p-4 mb-4 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Book Collection</h1>
    @if (session()->has('message'))
        <div class="p-4 mb-4 bg-green-500 text-white rounded">
            {{ session('message') }}
        </div>
    @endif
    <form wire:submit.prevent="save">
        <div class="mb-4">
            @error('title')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            <label class="block text-gray-700">Title</label>
            <input type="text" wire:model="title" class="w-full px-4 py-2 border rounded">
        </div>
        <div class="mb-4">
            @error('author')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            <label class="block text-gray-700">Author</label>
            <input type="text" wire:model="author" class="w-full px-4 py-2 border rounded">
        </div>
        <div class="mb-4">
            @error('description')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            <label class="block text-gray-700">Description</label>
            <textarea wire:model="description" class="w-full px-4 py-2 border rounded"></textarea>
        </div>
        <div class="mb-4">
            @error('published_year')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            <label class="block text-gray-700">Published Year</label>
            <input type="number" wire:model="published_year" class="w-full px-4 py-2 border rounded">
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Save</button>
    </form>
</div>
