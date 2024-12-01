<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Central</title>
</head>
<body>
    <h1>Submit A Review</h1>
    <form method="POST" action="{{ route('submitReview')}}">
    @csrf

    //here to
    @if($customer)
<input type="hidden" name="customer_id" value="{{ $customer->id}}">
@else
<input type="hidden" name="customer_id" value="">
@endif

<input type="hidden" name="product_id" value="{{ $product->id}}">
//here has a problem

<h1>rating:</h1>
<input type="integer" name="rating" min="1"max="5">
<h1>review</h1>
<input name="review" maxlength="500">
<button type="submit">submit your review!</button>
</form>
</body>
</html>

