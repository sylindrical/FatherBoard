<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{ asset('css/' . $sheet . '.css') }}" >
    <script src={{ asset('js/products.js') }}></script>
</head>
<body>
    {{$slot}}
</body>
</html>