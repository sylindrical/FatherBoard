<x-layout>
    <x-slot:title>
        Product
    </x-slot:title>

    <x-slot:sheet>
        product
    </x-slot:sheet>
    <h2>{{ $product->Title}} </h2>
    <p>{{ $product["Description"]}} </p>
</x-layout>