<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Create a Product
            </h2>
        </header>

        <form action="/products" method="POST" enctype="multipart/form-data">
            @csrf

            <x-form-input name="company"  value="{{ old('company') }}"  label="Company Name" placeholder="Example: Company Inc." type="text" />
            <x-form-input name="title" value="{{ old('title') }}"  label="Job Title" placeholder="Example: Senior Laravel Developer" type="text"  />
            <x-form-input name="location"   value="{{ old('location') }}" label="Job Location" placeholder="Example: Remote, Boston MA, etc" type="text" />
            <x-form-input name="email"  value="{{ old('email') }}"  label="Contact Email" placeholder="Example: email@example.com" type="text" />
            <x-form-input name="website"  value="{{ old('website') }}"  label="Website/Application URL" placeholder="Example: https://example.com" type="text" />
            <x-form-input name="tags"  value="{{ old('tags') }}"  label="Tags (Comma Separated)" placeholder="Example: Laravel, Backend, Postgres, etc" type="text" />
            <x-form-input name="logo"  value="{{ old('logo') }}"  label="Company Logo" placeholder="Choose a logo image" type="file" />

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">Job Description</label>
                <textarea
                    class="border border-gray-400 rounded p-2 w-full focus:border-blue-500 focus:outline-none"
                    name="description"
                    rows="10"
                    placeholder="Include tasks, requirements, salary, etc"
                >{{ old('description') }}</textarea>

                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">Create Products</button>
                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
