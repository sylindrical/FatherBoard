<x-lowlayout>
    <x-slot:head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FatherBoard - Checkout</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/aboutus.css')}}"> <!-- Link for the header styles -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/checkout.css')}}"> <!-- Link for homepage-specific styles -->
    </x-slot:head>
    <x-header></x-header>
<body>
<main>
    <div class="contents">
    <div class="shipping-information">
        <h2>Shipping Information</h2>
        <form action = "{{ route('checkout.process')}}" method='POST'>
            @csrf
            <div class="row">
                <input type="text" placeholder="Address Line 1" name="Address Line 1"  required >
                <input type="text" placeholder="Zip/Postal Code" name="Postcode" required>  
            </div>
            <div class="row">
                <select name="Country" required>
                    <option value="" disabled selected>Country<option>
                        <option value="UK">United Kingdom</option>
                        <!-- ADD CODE HERE -->
                    </select>
                    <input type="text" placeholder="City" name="City" required>
                </div>
                <!--<div class="row">
                    <input type="text" placeholder="First Name" name="First Name" required>
                    <input type="text" placeholder="Last Name" name="Last Name" required>
                </div>-->
                <!--<div class="row">
                    <select required>
                        <option value="" disabled selected>Shipping Method</option>
                         </select>
                </div> -->
                <button type="submit">Continue to Payment</button>
                </form>
                </div>

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
                        <td>{{$item['quantity']}}</td>
            
                        <td>{{ $item['price'] * (int)$item['quantity'] }} </td>
                        </tr>
            
                @endforeach
                @endif
                    </tbody>
                    </table>
            
                </div>
</main>
  </body>
</x-lowlayout>