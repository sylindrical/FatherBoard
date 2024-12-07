<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Basket</title>
</head>
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
        <td>{{ $item['price']* $item['quantity'] }}
        </td>
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
</html>
