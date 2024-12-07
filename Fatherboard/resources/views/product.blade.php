<x-lowlayout>

    <x-slot:head>
        <link rel="stylesheet" href={{ asset('css/product.css') }}>
        <link rel="stylesheet" href={{asset('css/aboutus.css')}}>

        <script src={{ asset('js/product.js') }}></script>
        <title>Product</title>
    </x-slot:head>

    <x-header>

    </x-header>

    <main id="product">
        <div id="image_container">
            <img src={{asset("images/" . $image)}} alt="Image" id="product_image"/>
        </div>
        <div id="content">
            <h2 id="title">{{ $product->Title}} </h2>
            <p>{{ $product["Description"]}} </p>
            <p>{{ $product["Manufacturer"] }}</p>
            <p>{{ $product->price["price"] }}</p>
            <form action="{{ route('basketAdd') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" id="basket_button">Add To Basket</button>
            </form>
        </div>

        <div id="review-area">
            <h3>Reviews</h3>
            <div id="rating_summary">
                <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" style="background: red; color:pink">
                    <path
                      d="M 10,30
                             A 20,20 0,0,1 50,30
                             A 20,20 0,0,1 90,30
                             Q 90,60 50,90
                             Q 10,60 10,30 z" />
                  </svg>
                              </div>
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
