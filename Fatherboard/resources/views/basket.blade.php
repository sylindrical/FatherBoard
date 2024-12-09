<x-lowlayout>
    <x-slot:head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FatherBoard - Basket</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/aboutus.css')}}"> <!-- Link for the header styles -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/basket.css')}}"> <!-- Link for basket styles -->
        <script src="{{asset('js/basket.js')}}" defer></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script> <!--Scripts needed for jQuery-->
    </x-slot:head>

        <!-- Header Section (unchanged, linked to stylesheet.css) -->
        <x-header></x-header>

<body>
    <main class="basket-page">
        <div class="basket-container">

    <h2>Your Basket</h2>
    @if(session('success'))
    <p>{{ session('success') }}</p>
    @endif

    @if(empty($basketDetails))
    <div id="basket-items" class="basket-items hidden">

    <p> Your Basket is Empty!</p>
    @else

    <table>
        <thead>

            <tr>
<th> Product</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>SubTotal</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
        @foreach($basketDetails as $item)


        <tr>
            <td>     <img src="{{ asset('images/product_images/' . $item['product_id'] . '.jpg') }}" alt="product image" class ="product-image">
            </td>

            <td>{{ $item['name'] }}</td>
            <td>{{ $item['price'] }}</td>
        </div>
            <td>
                <form method="POST" action="{{ route('basketUpdate') }}">
                    @csrf
    <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">
    <button type="submit"> Update</button>
                </form>

            </td>

            <td>{{ $item['price'] * (int)$item['quantity'] }} </td>

            <td>
                <form method="POST" action="{{ route('basketRemove') }}">
                    @csrf
    <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
    <button type="submit">Remove</button>
    </form>

            </td></tr>

    @endforeach
        </tbody>
        </table>

    </div>
    <div class="basket-summary">
        <form method="GET" action="{{ route('basketCheckout') }}">
            @csrf
    <button id="checkout-btn">Proceed To Checkout</button>
        </form>
    @endif
    </div>
</div>
</main>
            </body>
        </x-lowlayout>
