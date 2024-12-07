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
</template>
<!-- header.html -->
<header class="main-header">
    <div class="container">
        <a href="Home.html">
            <img src="{{asset('images/FatherboardTransparentCrop.png')}}" id="logo" alt="FatherBoard Logo" width="100" height="50"></a>
        <form class="SearchBar">
            <input type="text" placeholder="Search.." name="search">
        </form>
        <nav class="main-nav">
            <ul class="main-nav-list">
                <li><a href="About.html" class="active">About Us</a></li>
                <li><a href="Login.html">Account</a></li>
                <li><a href="basket.html">Basket</a></li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <nav class="lower-nav">
            <ul class="lower-nav-list">
                <li>
                    <a href="#product1">Memory</a>
                    <a href="#product2">CPUs</a>
                    <a href="#product3">Prebuilt Computers</a>
                    <a href="#product4">GPUs</a>
                    <a href="#product5">PSUs</a>
                    <a href="#sale">Sale!!!</a>
                </li>
            </ul>
        </nav>
    </div>
</header>

<h2>Products</h2>





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
                <span slot="Description">{{ $item['Description'] }}</span>
                <span slot="Manufacturer"> {{ $item['Manufacturer']  }}</span>

            </product-element>
            <?php

    }};
    ?>
    </div>
</x-lowlayout>

