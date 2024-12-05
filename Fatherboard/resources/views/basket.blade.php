
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Basket</title>
</head>
<body>
@section('content')
<h1>Basket</h1>
@if(session('success'))
<p>{{session('success')}}</p>
@endif
@if (empty($basket))
<p>Basket is Empty</p>
@else
@foreach($basket as $item)
<div>
    <p>Product ID: {{$item['product_id']}}</p>
    <p> Quantity: {{$item['quantity']}}</p>
    <form method="POST" action="{{route('basketUpdate')}}">
        <input type="hidden" name="product_id" value="product_id">
        <input type="number" name="quantity" value="quantity">
        <button type="submit">Update Quantity</button>
</form>
</body>