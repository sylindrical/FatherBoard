<x-lowlayout>


    <x-slot:head>
        <link rel="stylesheet" href={{ asset('css/settings.css') }}>
        <script src={{ asset('js/settings.js') }}></script>
        <title>Settings</title>
    </x-slot:head>

    <template id="address-template">
        <style>
            p
            {
                margin:0;
            }
            </style>
        <p id="Country"><slot name="Country">Unknown Country</slot></p>
        <p id="City"><slot name="City">Unknown City</slot></p>
        <p id="AddressLine"><slot name="AddressLine">Unknown Address</slot></p>

    </template>

    <main id="setting-container">



    
    <div id="settings">
        <ul>
            <li>
                <button class="option">Personal</button> 
            </li>
            <li>
                <button class="option">Address</button> 
            </li>
            <li>
                <button class="option">Billing</button> 
            </li>
            <li>
                <button class="option">History</button> 
            </li>

        </ul>
    </div>

    <div class="content" id="address-info">
        <h3>Address Information</h3>

        <?php if ($addr->count() >0)
        {
            foreach ($addr as $key => $value) {
                # code...
            
            ?>
            <address-element>
                <span slot="Country">{{ $value["Country"] }}</span>
                <span slot="City">{{ $value["City"] }}</span>
                <span slot="AddressLine">{{$value["Address Line"] }}</span>

            </address-element>

            <?php }}
        else {
            ?> 

            <p>You do not have an address currently.</p>

        <?php
        }
?>
    </div>
    </main>

</x-lowlayout>