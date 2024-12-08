<x-lowlayout>

    <x-slot:head>
        <link rel="stylesheet" href={{ asset('css/products.css') }}>
        <script src={{ asset('js/products.js') }}></script>
        <link rel="stylesheet" href={{asset('css/aboutus.css')}}>
        <title>Products</title>
    </x-slot:head>

<meta name="csrf-token" content="{{ csrf_token() }}">



<template  id="template_product">
    <h2><slot name="Title">Unknown Title</slot></h2>
    <p><slot name="Description">Unknown Description</slot></p>
    <p><slot name="Manufacturer">Unknown Manufacturer</slot></p>
    <p><slot name="Buttons">No buttons</slot></p>
</template>
<!-- header.html -->
<x-header></x-header>

<h2>Products <a href="{{ route('create') }}" ><button id='addProduct'>Add Product</button></a></h2>





<div class="filter-sidebar filter"> <!--https://dev.to/clairecodes/how-to-make-a-sticky-sidebar-with-two-lines-of-css-2ki7-->
    <h3>Filter By:</h3>
    <div class="categories"> <!--https://stackoverflow.com/a/48316156-->
        <h4 style="padding-left: 1.563rem;">Category:</h4>
        <br>
        <div class="checkbox">
            <label><input type="checkbox" rel="Memory"/>Memory</label>
            </div>   
        <br>
        <div class="checkbox">
            <label><input type="checkbox" rel="CPU" href="CPUs"/>CPUs</label>
        </div>   
        <br>
        <div class="checkbox">
            <label><input type="checkbox" rel="Prebuilt" />Prebuilt Computers</label>
        </div>   
        <br>
        <div class="checkbox">
            <label><input type="checkbox" rel="GPU" />GPUs</label>
        </div>   
        <br>
        <div class="checkbox">
            <label><input type="checkbox" rel="PSU" />PSUs</label>
        </div>   
        <br>

    </div>

    <br>
    <hr>
    <br>

    <h4 style="padding-left: 1.563rem;">Price:</h4>
    <br>

    <div class="prices">
        <div class="checkbox">
            <label><input type="checkbox" rel="50-100" /> £50-100 </label>
        </div>
        <br>

        <div class="checkbox">
            <label><input type="checkbox" rel="100-200"/> £100-200 </label>
        </div>
        <br>
        <div class="checkbox">
            <label><input type="checkbox" rel="200-300" />£200-300 </label>
        </div>
        <br>

        <div class="checkbox">
            <label><input type="checkbox" rel="300-400" />£300-400</label>
        </div>
        <br>

        <div class="checkbox">
            <label><input type="checkbox" rel="400-500" /> £400-500</label>
        </div>
        <br>

        <div class="checkbox">
            <label><input type="checkbox" rel="500+" /> £500+ </label>
        </div>

    </div>
    <button id="filter-button">Filter</button>

</div>
<div id="ProductContainer">
    <?php
    if (count($data) > 0) {
    foreach($data as $item)
    {
            ?>


            <product-element class="ProductItem">
                <p hidden class="product_identity"> {{$item["id"]}} </p>
                <span slot="Title">{{ $item['Title'] }}</span>
                <span slot="Description"> {{ $item['Description'] }}</span>
                <span slot="Manufacturer"> {{ $item['Manufacturer']  }}</span>
                <span slot='Buttons'>
                    <a href="{{ route('edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('delete', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                    </form>
                </span>
            </product-element>
            <?php

    }};
    ?>
    </div>
</x-lowlayout>

