@props(['name', 'label', 'type', 'placeholder', 'value' ])

<div class="mb-6">
    <label for="{{ $name }}" class="inline-block text-lg mb-2">{{ $label }}</label>
    <input 
        name="{{ $name }}" 
        type="{{ $type }}" 
        @if(isset($value)) value="{{ $value }}" @endif
        @if(isset($placeholder)) placeholder="{{ $placeholder }}" @endif
        class="border border-gray-400 rounded p-2 w-full focus:border-blue-500 focus:outline-none"
    >
    @error( $name )
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>