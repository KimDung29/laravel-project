<x-layout>
    @auth
        @else
        @include('partials._hero')   
    @endauth
    @include('partials._search')
    
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @if (is_array($products ) && count($products) === 0)
            <p>No products found.</p>
        @else
            @foreach ($products as $product)
                <x-product-card :product="$product" />              
            @endforeach
        @endif
    </div>
    {{-- Pagination --}}
    <div class=" mt-6 mx-4">
        {{-- {{ $products->links() }} --}}
    </div>
    
</x-layout>