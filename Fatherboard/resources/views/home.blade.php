<x-lowlayout>
    <x-slot:head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FatherBoard - Homepage</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/aboutus.css')}}"> <!-- Link for the header styles -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}"> <!-- Link for homepage-specific styles -->
    </x-slot:head>


    <x-header></x-header>

<!-- Banner Section -->
<section class="banner">
    <div class="banner-text">
        <h1>Welcome to FatherBoard</h1>
    </div>
</section>

<!-- Category Icons Section -->
<section class="category-icons">
<div class="category-item">
    <a href="/products?category=memory">
        <img src="images/front_images/memory.png" alt="Memory">
        <p>Memory</p>
    </a>
</div>
<div class="category-item">
    <a href="/products?category=cpu">
        <img src="images/front_images/cpu.png" alt="CPU">
        <p>CPUs</p>
    </a>
</div>
<div class="category-item">
    <a href="/products?category=prebuilt">
        <img src="images/front_images/prebuilt.png" alt="Prebuilt Computers">
        <p>Prebuilt Computers</p>
    </a>
</div>
<div class="category-item">
    <a href="/products?category=gpu">
        <img src="images/front_images/gpu.png" alt="GPU">
        <p>GPUs</p>
    </a>
</div>
<div class="category-item">
    <a href="/products?category=psu">
        <img src="images/front_images/psu.png" alt="PSU">
        <p>PSUs</p>
    </a>
</div>
</section>
<footer class="main-footer">
<div class="footer-container">
    <div class="social-icons">
        <a href="https://facebook.com" target="_blank">
            <img src="images/front_images/facebook.png" alt="Facebook">
        </a>
        <a href="https://x.com" target="_blank">
            <img src="images/front_images/twitter.png" alt="Twitter">
        </a>
        <a href="https://instagram.com" target="_blank">
            <img src="images/front_images/instagram.png" alt="Instagram">
        </a>
        <a href="https://linkedin.com" target="_blank">
            <img src="images/front_images/linkedin.png" alt="LinkedIn">
        </a>
    </div>
    <p>&copy; 2024 FatherBoard. All Rights Reserved.</p>
</div>
</footer>
<br>
</x-lowlayout>