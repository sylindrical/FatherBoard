<x-lowlayout>
<x-slot:head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FatherBoard - Contact Us</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/aboutus.css')}}"> <!-- Link for the header styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/contact.css')}}"> <!-- Link for product-specific styles -->
    <script src="{{asset('js/contactus.js')}}" defer></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script> <!--Scripts needed for jQuery-->
</x-slot:head>

    <!-- Header Section (unchanged, linked to stylesheet.css) -->
    <x-header></x-header>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <body>
        <h1 id="contact-title">Contact Us</h1>
        <p id="subtitle">
            Need to talk to somebody? <br> Fill out the form and an admin will get back to you!
        </p>
        <div class="wrapper inputs">
            <form id="contactForm" name="contactForm">
                <div class="row inputPair">
                    <label for="firstName">
                        First Name
                    </label>
                        <input name="firstName" id="firstName" type="text"required="required">

                    <label for="lastName"> 
                        Last Name
                    </label>
                        <input name="lastName" type="text" id="lastName" required="required">
                </div>
                <label for="emailAddress">
                    Email Address
                </label>
                    <input name="emailAddress" type="email" id="emailAddress" required="required">

                <label for="query">
                    What can we help you with?
                </label>
                    <textarea name="query" id="query" required="required"></textarea>

                <input type="submit" id="contSubmit" value="Submit">
            </form>
        </div>
    </x-lowlayout>