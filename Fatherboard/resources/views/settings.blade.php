<x-lowlayout>


    <x-slot:head>
        <link rel="stylesheet" href={{ asset('css/settings.css') }}>
        <script src={{ asset('js/settings.js') }}></script>
        <title>Settings</title>
    </x-slot:head>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <template id="address-template">
        <style>
            p
            {
                margin:0;
                padding:0;
            }
            
            </style>


        <p id="Country"><slot name="Country">Unknown Country</slot></p>
        <p id="City"><slot name="City">Unknown City</slot></p>
        <p id="AddressLine"><slot name="AddressLine">Unknown Address</slot></p>
        
        <button name="remove-item">-</button>
    </template>


    <template id="personal-template">
        <style>
            p
            {
                margin:0;
                padding:0;
            }
        </style>
        <label>Email:</label>
        <b><slot name="Email">Unknown Email</slot></b>
        <label>Password:</label>

        <b><slot name="Password">Unknown Password</slot></b>
    </template>
{{-- 
    <template id="template_add_address_box">

    </template> --}}

    <div id="add_address_box"  hidden>
    <div>

    </div>
        <form id="add_address_form" method="POST" action="/add/address">
            <div>
            <label for="Country">Country</label>

            <select id="inp_country">
                <option>UK</option>
                <option>USA</option>
                <option>France</option>
                <option>Germany</option>
                <option>Spain</option>
            </select>
        </div>
            
        <div>
            <label for="City">City</label>
            <input type="text" id="inp_city" name="City"></input>
        </div>

        <div>

            <label for="City">Address Line</label>

            <input type="text" id="inp_addrLine" name="Address Line"></input>
        </div>
        <div>
            <input type="submit" name="add_address_button" id="add_address_submit" value="Add" target=""></input>
        </div>
        </form>

    </div>
    <main id="setting-container">


    
    <div id="settings" >
        <ul>
            <li>
                <button class="option" id="button_personal">Personal</button> 
            </li>
            <li>
                <button class="option" id="button_address">Address</button> 
            </li>
            <li>
                <button class="option" id="button_billing">Billing</button> 
            </li>
            <li>
                <button class="option" id="button_history">History</button> 
            </li>

        </ul>
    </div>

    <div id="option-information">
    <div class="content" id="personal-info">


    </div>

    <div class="content" id="address-info">
        <h3>Address Information</h3>
        <button id="button_show_address_gui">Add Address</button>

        <?php if ($addr->count() >0)
        {
            foreach ($addr as $key => $value) {
                # code...
            
            ?>
            <address-element>
                <span slot="Country">{{ $value["Country"] }}</span>
                <span slot="City">{{ $value["City"] }}</span>
                <span slot="AddressLine">{{$value["Address Line"] }}</span>
                <p name="address_id" value={{ $value["id"] }} hidden></p>
            </address-element>

            <?php }}
        else {
            ?> 

            <p>You do not have an address currently.</p>

        <?php
        }
?>
    </div>
</div>
    </main>

</x-lowlayout>