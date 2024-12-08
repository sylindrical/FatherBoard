<x-lowlayout>
    <x-slot:head>
        <link rel="stylesheet" href={{asset('css/aboutus.css')}}>
    </x-slot:head>
    <x-header></x-header>
    <div class="split left"> <!--https://www.w3schools.com/howto/howto_css_split_screen.asp -->
            <div class="centered"> 
            <h1>About Us</h1>
            <br>

            <p style="text-align: left;">FatherBoard was founded in 2024 by 9 Computer Science students. <br>
                Our goal is to provide reasonably priced PC parts to hobbyists, fanatics and professionals alike.
                <br>
                <br>
                <br>
                As students, we understand the difficulty in finding appropriately priced computer parts, and how these prices create a high barrier to entry.
                This means that many individuals interesed in PC building, cannot reasonably access the hobby.
                <br>
                <br>
                We wanted to fix this, and share our enjoyment of PC parts and PC building. 
                <br>
                <br>
                At FatherBoard, we believe in transparent communication. If you have any issues or queries, please <a href="Contact.html">contact us.</a>
            </p>
            </div>
        </div>
        <div class="split right">
            <div class="centered">
                <br>
                <br>
                <br>
                <br>
                <img src="{{asset('images/front_images/FatherboardBackground.png')}}" id="logo"alt="FatherBoard Logo" width="1000" height="700">
            </div>
            
        </div>

</x-lowlayout>