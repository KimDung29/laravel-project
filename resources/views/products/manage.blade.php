<x-layout>
    <x-card class="p-10 ">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Products
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless ($products->isEmpty())
                    @foreach ($products as $product )
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="show.html">
                                    {{ $product->title }}
                                </a>
                            </td>
                          
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">                            
                                <x-edit-delete :product='$product' />
                            </td>
                        </tr>
                        
                    @endforeach
                    @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">No products Found.</p>
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </x-card>
</x-layout>
