<x-lowlayout>

    <x-slot:head>
        <link rel="stylesheet" href={{ asset('css/product.css') }}>
        <script src={{ asset('js/product.js') }}></script>
        <title>Product</title>
    </x-slot:head>
{{-- 
    <header class="main-header">
        <div class="container">
            <a href="#default"><img src="FatherboardTransparentCrop.png" id="logo" alt="FatherBoard Logo" width="100" height="50"></a>
            <form class="SearchBar">
                <input type="text" placeholder="Search.." name="search">
            </form>
            <nav class="main-nav">
                <ul class="main-nav-list">
                    <li><a href="#register" class="active">About Us</a></li>
                    <li><a href="#login">Account</a></li>
                    <li><a href="#products">Basket</a></li>
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
    </header> --}}
    

    <main id="product">
        <div id="image_container">
            <img src={{asset("images/" . $image)}} alt="Image" id="product_image"/>
        </div>
        <div id="content">
            <h2 id="title">{{ $product->Title}} </h2>
            <p>{{ $product["Description"]}} </p>

            <button id="basket_button">Add to basket</button>
        </div>

        <div id="review-area">
        <p>
            There is no reviews;
            <p>{{$rating}}</p>
        
        <div id="reviews">

                <?php


                foreach($product->reviews()->get() as $rev)
                {
                    ?>
                    <div class="review">
                    <p>{{$rev["review"]}}</p>
                    <p>{{$rev["rating"]}}</p>
                    <div>
                    <?php
                }

                ?>
            </p>
        </div>
    </div>

    </main>

</x-lowlayout>