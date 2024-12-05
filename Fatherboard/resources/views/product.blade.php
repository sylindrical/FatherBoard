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


<template  id="template_product">
    <h2><slot name="Title">Unknown Title</slot></h2>
    <p><slot name="Description">Unknown Description</slot></p>
    <p><slot name="Manufacturer">Unknown Manufacturer</slot></p>
</template>

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