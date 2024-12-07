<x-lowlayout>
    <x-slot:head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FatherBoard - Review</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/aboutus.css')}}"> <!-- Link for the header styles -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/homepage.css')}}"> <!-- Link for basket styles -->
        <script src="{{asset('js/home.js')}}" defer></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script> <!--Scripts needed for jQuery-->
    </x-slot:head>

        <!-- Header Section (unchanged, linked to stylesheet.css) -->
        <x-header></x-header>

<body>
    <h1>Submit A Review</h1>
    <form action="{{ route('submitReview') }}" method ="POST">
    @csrf

<h2> Product:</h2>
<input type="integer" name="product_id">

<h2>Rating:</h2>
<input type="number" name="rating" min="1"max="5">
<h2>Review:</h2>
<textarea name="review" maxlength="500"></textarea>
<button type="submit">submit your review!</button>

</form>
@if(session('success'))
<div class ="alert alert-success">
    {{session('success')}}
</div>
@endif

</body>
</x-lowlayout>
