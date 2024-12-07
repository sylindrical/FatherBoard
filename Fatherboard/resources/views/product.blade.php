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
            <p>{{ $product["price"] }}</p>
            <form action="{{ route('basketAdd') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" id="basket_button">Add To Basket</button>
            </form>
        </div>
        
        
        <div id="review_form">
            

            <div class="input">
            <select id="rating">
                <option >1</option>
                <option >2</option>
                <option >3</option>
                <option >4</option>
                <option >5</option>   
            </select>

            <div class="input">
                <textarea name="review_text" id="review_text"></textarea>
                </div>
        </div>
            <input type="submit" name="submit" id="review_submit"/>
        </div>
        
        <div id="review-area">
            <h3>Reviews</h3>
            <button id="review_button">Add review</button>
            <p>{{$rating}}</p>
            <div id="rating_summary">
                <?php

                for ($i = 0; $i < $amount; $i++)
                {
                    ?>
                   <img class="star" src="{{asset('images/full_star.png')}}"/>
                    <?php

                } ?>
            </div>
     
            <p>
            
            
        
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
                    <div>
                    <?php
                }
            }

                ?>
            </p>
        </div>
    </div>

    </main>

</x-lowlayout>
