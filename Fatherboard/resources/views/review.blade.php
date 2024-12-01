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
    <form method="POST" action="{{ route('submitReview') }}">
    @csrf

   
<h1>rating:</h1>
<input type="integer" name="rating" min="1"max="5">
<h1>review</h1>
<input name="review" maxlength="500">
<button type="submit">submit your review!</button>
</form>
@if(session('success'))
<div class ="alert alert-success">
    {{session('success')}}
</div>
@endif
</body>
</html>

