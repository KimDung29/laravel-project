<x-layout>
    

    <x-card class=" p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit a Product
            </h2>
            <p class="mb-4">Edit: {{$product->title}}</p>
        </header>

        <form action="/products/{{$product->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-form-input name="company" value="{{ $product->company }}"  label="Company Name" placeholder="Example: Company Inc." type="text" />
            <x-form-input name="title" value="{{ $product->title }}" label="Job Title" placeholder="Example: Senior Laravel Developer" type="text"  />
            <x-form-input name="location"   value="{{ $product->location }}" label="Job Location" placeholder="Example: Remote, Boston MA, etc" type="text" />
            <x-form-input name="email"  value="{{ $product->email }}"  label="Contact Email" placeholder="Example: email@example.com" type="text" />
            <x-form-input name="website"  value="{{ $product->website }}"  label="Website/Application URL" placeholder="Example: https://example.com" type="text" />
            <x-form-input name="tags"  value="{{ $product->tags }}"  label="Tags (Comma Separated)" placeholder="Example: Laravel, Backend, Postgres, etc" type="text" />
            <x-form-input name="logo"  value="{{ $product->logo }}"  label="Company Logo" placeholder="Choose a logo image" type="file" />

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">Job Description</label>
                <textarea
                    class="border border-gray-400 rounded p-2 w-full focus:border-blue-500 focus:outline-none"
                    name="description"
                    rows="10"
                    placeholder="Include tasks, requirements, salary, etc"
                >{{ $product->description }}</textarea>

                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Update Product
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>