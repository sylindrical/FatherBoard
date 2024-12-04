

@extends('layouts.app')
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
    <form method="POST" action="{{route('basket.update')}}">
        @csrf 
        <input type="hidden" name="product_id" value="{{$item['product_id']}}">
        <input type="number" name="quantity" value="{{$item['quantity']}}">
        <button type="submit">Update Quantity</button>
</form>
