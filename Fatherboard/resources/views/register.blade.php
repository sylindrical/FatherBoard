<x-lowlayout>
    <x-slot:head>
        <link rel="stylesheet" href={{ asset('css/register.css') }}>
        <script src={{ asset('js/register.js') }}></script>
        <title>Register</title>
    </x-slot:head>
    <h2>Register</h2>

    <form action="./_register" method="POST">
        @csrf
        <input type="text" name="username">
        <input type="text" name="password">

        <input type="submit" name="submit">
    </form>
</x-lowlayout>