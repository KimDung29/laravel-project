@props(['action1', 'message', 'redirect','action2'])

<div class="mb-6 mt-8">
    <button
        type="submit"
        class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
    >
        {{ $action1 }}
    </button>
</div>

<div class="mt-2">
    <p>
        {{ $message }}
        <a href="/{{ $redirect }}" class="text-laravel"
            >{{ $action2 }}</a
        >
    </p>
</div>