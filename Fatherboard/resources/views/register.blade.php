<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h2>Register</h2>

    <form action="./_register" method="POST">
        @csrf
        <input type="text" name="username">
        <input type="text" name="password">

        <input type="submit" name="submit">
    </form>
</body>
</html>