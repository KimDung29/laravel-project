@props(['product'])
<img
    class="w-48 mr-6 mb-6"

    src="{{$product->logo ? asset('storage/'. $product->logo) : asset('images/no-image.png')}}"
    alt=""
/>