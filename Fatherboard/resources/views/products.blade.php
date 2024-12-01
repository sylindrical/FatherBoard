<x-lowlayout>

    <x-slot:head>
        <link rel="stylesheet" href={{ asset('css/products.css') }}>
        <script src={{ asset('js/products.js') }}></script>
        <title>Products</title>
    </x-slot:head>
    <h2>Products</h2>

<br>
<meta name="csrf-token" content="{{ csrf_token() }}">
<select name="type" id="product_type">
    <option value="gpu">GPU</option>
    <option value="cpu">CPU</option>
    <option value="psu">PSU</option>
    <option value="memory">Memory</option>
    <option value="prebuilt-pcs">Pre-built pcs</option>
</select>

<button id="filter-button">Filter</button>

<template  id="template_product">
    <h2><slot name="Title">Unknown Title</slot></h2>
    <p><slot name="Description">Unknown Description</slot></p>
    <p><slot name="Manufacturer">Unknown Manufacturer</slot></p>
</template>


<div id="ProductContainer">
    <?php
    foreach($data as $x=>$item)
    {
        
            ?>


            <product-element class="ProductItem">
                <p hidden class="product_identity"> {{$item["id"]}} </p>
                <span slot="Title">{{ $item['Title'] }}</span>
                <span slot="Description">{{ $item['Description'] }}</span>
                <span slot="Manufacturer"> {{ $item['Manufacturer']  }}</span>

            </product-element>
            <?php

    }
    ?>
    </div>
</x-lowlayout>