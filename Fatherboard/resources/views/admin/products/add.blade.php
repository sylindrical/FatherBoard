<x-lowlayout>

    <x-slot:head>
        <link rel="stylesheet" href={{ asset('css/product.css') }}>
        <link rel="stylesheet" href={{asset('css/aboutus.css')}}>

        <script src={{ asset('js/product.js') }}></script>
        <title>Create Product</title>
    </x-slot:head>

    <x-header>

    </x-header>

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <main id="product">
        <div id="content">
            <form action = "{{ route('created')}}" method='POST'>
                @csrf
                <div class="text-input">
                    <input type="text" name="Title" id="Title" placeholder="Title" required>
                </div>
                <div class="text-input">
                    <input type="text" name="Description" id="Description" placeholder="Description" required>
                </div>
                <div class="text-input">
                    <input type="text" name='Manufacturer' id="Manufacturer" placeholder="Manufacturer" required/>
                </div>
                <div class="text-input">
                    <input type="text" name='Type' id ="Type" placeholder="Type" required />
                </div>
                <div class="text-input">
                    <input type="text" name='Price' id ="Price" placeholder="Price" required />
                </div>
                <!--
                <div class="text-input">
                    <input type="text" name='Stock' id ="Stock" placeholder="Current Stock" required />
                </div>
                -->
                <input type="submit"  name="submit" id="submit" value="Create">

            </form>
        </div>
    </main>

</x-lowlayout>
