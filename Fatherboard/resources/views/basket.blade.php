
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Basket</title>
</head>
<body>
    <form method="POST" action="{{route('basketAdd')}}">
        @csrf
        <h1> Product ID</h1>
        <input type="hidden" id="quantity" name="product_id" required>
        <h1>Quantity:</h1>
        <input type="number" id="quantity" name="quantity" value="1" Required>
        <button type="submit">Add to basket</button>
</form>
</body>
