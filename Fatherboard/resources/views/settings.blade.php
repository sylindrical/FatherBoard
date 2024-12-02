<x-layout>
    <x-slot:title>Settings</x-slot:title>
    <x-slot:sheet>
        settings
    </x-slot:sheet>
    <main>
        <template id="address-template">
            <p id="Country">TCo</p>
            <p id="City">TCi</p>
            <p id="AddressLine">TAl</p>

        </template>
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