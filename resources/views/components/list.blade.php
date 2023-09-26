@props(['products'])

<ul class="flex">
    @foreach ($products as $product )
        
    <li
        class="bg-black text-white rounded-xl px-3 py-1 mr-2"
    >
        <a href="#">{{ $product }}</a>
    </li>

    @endforeach
</ul>
 