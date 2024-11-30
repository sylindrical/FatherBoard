<x-layout>
    <x-slot:title>
        Product
    </x-slot:title>
    <x-slot:sheet>
        product
    </x-slot:sheet>

    <main id="product">
        <div id="image_container">
            <img src={{asset("images/" . $image)}} alt="Image" id="product_image"/>
        </div>
        <div id="content">
            <h2 id="title">{{ $product->Title}} </h2>
            <p>{{ $product["Description"]}} </p>

            <button id="basket_button">Add to basket</button>
        </div>

        <div id="reviews">
            <p>
                There is no reviews;
            </p>
        </div>

    </main>

</x-layout>