
<x-lowlayout>
    <x-slot:head>
    <link rel="stylesheet" href={{ asset('css/login.css') }}>
    <script src={{ asset('js/login.js') }}></script>
    <title>Login</title>
    </x-slot:head>
    <h2>Log in</h2>


    <form action="./_login" method="POST" id="login_form">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <input type="text" name="username" id="username">
        <input type="text" name="password" id="password">
        <label for="permanent">Persist login after close</label>
        <input type="checkbox" name="permanent" id="permanent">
        <input type="submit" name="submit" id="submit">
    </form>



    <div id="notification_container">
    </div>
    <p></p>
</x-lowlayout>