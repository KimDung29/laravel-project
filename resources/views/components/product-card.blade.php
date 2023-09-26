@props(['product'])

<x-card> 
    <div class="flex">
        {{-- <img
            class="hidden w-48 mr-6 md:block"
            src="{{$product->logo ? asset('storage/'. $product->logo) : asset('images/no-image.png')}}"
            alt=""
        /> --}}
        <x-image :product='$product' />
        <div>
            <h3 class="text-xl font-bold">
                <a href="/products/{{$product->id}}">{{$product->title}}</a>
            </h3>
            <div class="text-lg  mb-4">{{$product->company}}</div>
            
            <x-product-tags :tagsProp="$product->tags"/>
                 
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot text-red-500"></i> {{$product->location}}
            </div>
        </div>
    </div>
</x-card>