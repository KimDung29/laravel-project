@props(['product'])

<x-card class="mt-4 p-2 flex space-x-6">
    <a href="/products/{{$product->id}}/edit">
        <i class="fa-solid fa-pencil"></i> Edit
    </a>

    <form method="POST" action="/products/{{$product->id}}">
        @csrf
        @method('DELETE')
        <button class="text-red-500">
            <i class="fa-solid fa-trash"></i> Delete
        </button>
    </form>
</x-card>