<x-layout>
    <x-slot:title>Settings</x-slot:title>

    <main>
    <div>
        <ul>
            <li>Personal </li>
            <li>Address </li>
            <li>Billing </li>
            <li>History</li>

        </ul>
    </div>
    <h3>Address Information</h3>
    <p>{{ $address["Country"] }} </p>

    <p>{{ $address["City"]}} </p>

    <p>{{ $address["Address Line"]}} </p>
    </main>

</x-layout>