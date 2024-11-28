
<x-layout>
    <x-slot:title>
        s
    </x-slot:title>
    <h2>Log in</h2>

    <form action="./_login" method="POST">
        @csrf
        <input type="text" name="username">
        <input type="text" name="password">

        <input type="submit" name="submit">
    </form>

    <p></p>
</x-layout>