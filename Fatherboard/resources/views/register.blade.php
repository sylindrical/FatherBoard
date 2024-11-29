<x-layout>
    <x-slot:title>
        Register
    </x-slot:title>
    <x-slot:sheet>
        register
    </x-slot:sheet>
    <h2>Register</h2>

    <form action="./_register" method="POST">
        @csrf
        <input type="text" name="username">
        <input type="text" name="password">

        <input type="submit" name="submit">
    </form>
</x-layout>