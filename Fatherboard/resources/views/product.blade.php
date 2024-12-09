<x-lowlayout>

    <x-slot:head>
        <link rel="stylesheet" href={{ asset('css/product.css') }}>
        <link rel="stylesheet" href={{asset('css/aboutus.css')}}>

        <script src={{ asset('js/product.js') }}></script>
        <title>Product</title>
    </x-slot:head>

    <x-header>

    </x-header>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="product_identity" content="{{ $product->id }}">


    <main id="product">
        <div id="image_container">

            <img src={{asset("images/product_images/" . $image)}} alt="Image" id="product_image"/>

        </div>
        <div id="content">
            <h2 id="title">{{ $product->Title}} </h2>
            <p>{{ $product["Description"]}} </p>
            <p>{{ $product["Manufacturer"] }}</p>
            <p>{{ $product["price"] }}</p>

            <form action="{{ route('basketAdd') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="number" name="quantity" value="1" min="1">
                <button type="submit" id="basket_button">Add To Basket</button>
            </form>
        </div>


        <form action="/add/review" method="POST" id="review_form">
            <div class="input">
                <label for="rating">Rating</label>

                <select id="rating">
                    <option >1</option>
                    <option >2</option>
                    <option >3</option>
                    <option >4</option>
                    <option >5</option>
                </select>
                </div>

            <div class="input">
                <label for="rating">Description</label>

            <textarea name="review_text" id="review_text"></textarea>
            </div>


            <input type="submit" name="submit" id="review_submit" value="Submit"/>
        </form>

        <div id="review-area">
            <h3>Reviews</h3>
            <button id="review_button">Add review</button>
            <div id="rating_summary">
                <div id="star_container">
                <?php

                for ($i = 0; $i < $amount; $i++)
                {
                    ?>
                   <img class="star" src="{{asset('images/full_star.png')}}"/>
                    <?php

                } ?>
                </div>
                <b>{{$rating}}</b>

            </div>





        <div id="reviews">

                <?php
                if (count($product->reviews()->get()) == 0)
                {
                    ?><p>There is no reviews</p><?php
                }
                else
                {
                foreach($product->reviews()->get() as $rev)
                {
                    ?>
                    <div class="review">
                    <p>{{$rev["review"]}}</p>
                    <p>{{$rev["rating"]}}</p>
                    {{-- <p>{{$rev["person"]}}</p> --}}
                    </div>
                    <?php
                }
            }

                ?>
            </p>
        </div>
    </div>

    </main>

</x-lowlayout>
