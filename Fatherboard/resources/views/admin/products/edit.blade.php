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
            <img src={{asset("images/" . $image)}} alt="Image" id="product_image"/>
        </div>
        <div id="content">
            <h2 id="title">{{ $product->Title}} </h2>
            <p>{{ $product["Description"]}} </p>
            <p>{{ $product["Manufacturer"] }}</p>
            <p>{{ $product["price"] }}</p>
        </div>
        <div>
        <form action = "{{ route('update', $product->id)}}" method='POST'>
            @csrf
            @method('PUT')
            <div class="text-input">
                <input type="text" name="Title" id="Title" placeholder="Title">
            </div>
            <div class="text-input">
                <input type="text" name="Description" id="Description" placeholder="Description">
            </div>
            <div class="text-input">
                <input type="text" name='Manufacturer' id="Manufacturer" placeholder="Manufacturer"/>
            </div>
            <div class="text-input">
                <input type="text" name='Type' id ="Type" placeholder="Type"/>
            </div>
            <div class="text-input">
                <input type="text" name='Price' id ="Price" placeholder="Price"/>
            </div>
            <!--
            <div class="text-input">
                <input type="text" name='Stock' id ="Stock" placeholder="Current Stock" required />
            </div>
            -->
            <input type="submit"  name="submit" id="submit" value="Update">

        </form>
        </div>        
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
