
<x-lowlayout>
    <x-slot:head>
    <link rel="stylesheet" href={{ asset('css/login.css') }}>
    <script src={{ asset('js/login.js') }}></script>
    <title>Login</title>
    </x-slot:head>
    <h2>Log in</h2>

    <form action="./_login" method="POST">
        @csrf
        <input type="text" name="username">
        <input type="text" name="password">
        <input type="checkbox" name="permanent">
        <input type="submit" name="submit">
    </form>

    <p></p>
</x-lowlayout>