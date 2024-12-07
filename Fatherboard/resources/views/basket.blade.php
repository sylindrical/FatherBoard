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
<h1>Your Basket</h1>
@if(session('success'))
<p>{{ session('success') }}</p>
@endif

@if(empty($basket))
<p> Your Basket is Empty!</p>
@else
<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>SubTotal</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($basket as $item)
    <tr>
        <td>{{ $item['name'] }}</td>
        <td>{{ $item['price'] }}</td>

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
    <a href="{{ route('basketCheckout') }}">Proceed To Checkout</a>
    @endif
            </body>
        </x-lowlayout>
