<x-lowlayout>
    <x-slot:head>
        <link rel="stylesheet" href={{ asset('css/register.css') }}>
        <script src={{ asset('js/register.js') }}></script>
        <title>Register</title>
    </x-slot:head>
    <h2>Register</h2>

    <form action="./_register" method="POST" id="register_form">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <input type="text" name="username" id="username">
        <input type="text" name="password" id="password">

        <input type="submit" name="submit">
    </form>

    <div id="notification_container">
    </div>
</x-lowlayout>