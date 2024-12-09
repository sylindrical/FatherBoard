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
    <form action="{{ route('submitReview') }}" method ="POST">
    @csrf

<h1> Product:</h1>
<input type="integer" name="product_id">

<h1>Rating:</h1>
<input type="number" name="rating" min="1"max="5">
<h1>Review:</h1>
<textarea name="review" maxlength="500"></textarea>
<button type="submit">submit your review!</button>

</form>
@if(session('success'))
<div class ="alert alert-success">
    {{session('success')}}
</div>
@endif

</body>
</html>

