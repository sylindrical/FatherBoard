<!DOCTYPE home html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FatherBoard - Homepage</title>
    <link rel = "stylesheet" type="text/css" href={{asset("css/stylesheet.css")}}> <!-- Link for the header styles -->
    <link rel = "stylesheet" type="text/css" href={{asset("css/homepage.css")}}> <!-- Link for homepage-specific styles -->
</head>
<body>

    <!-- Header Section (unchanged, linked to stylesheet.css) -->
    <header class="main-header">
        <div class="container">
            <a href="#default"><img src={{asset("images/FatherboardTransparentCrop.png")}} id="logo" alt="FatherBoard Logo" width="100" height="50"></a>
            <form class="SearchBar">
                <input type="text" placeholder="Search.." name="search">
            </form>

            <nav class="main-nav">
                <ul class="main-nav-list">
                    <li><a href="#register" class="active">About Us</a></li>
                    <li><a href="#login">Account</a></li>
                    <li><a href="#products">Basket</a></li>
                </ul>
            </nav>
        </div>

        <div class="container">
            <nav class="lower-nav">
                <ul class="lower-nav-list">
                    <li>
                        <a href="#product1">Memory</a>
                        <a href="#product2">CPUs</a>
                        <a href="#product3">Prebuilt Computers</a>
                        <a href="#product4">GPUs</a>
                        <a href="#product5">PSUs</a>
                        <a href="#sale">Sale!!!</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Banner Section -->
    <section class="banner">
        <div class="banner-text">
            <h1>Welcome to FatherBoard</h1>
        </div>
    </section>

    <!-- Category Icons Section -->
<section class="category-icons">
    <div class="category-item">
        <a href="#memory">
            <img src="images/memory.png" alt="Memory">
            <p>Memory</p>
        </a>
    </div>
    <div class="category-item">
        <a href="#cpu">
            <img src="images/cpu.png" alt="CPU">
            <p>CPUs</p>
        </a>
    </div>
    <div class="category-item">
        <a href="#prebuilt">
            <img src="images/prebuilt.png" alt="Prebuilt Computers">
            <p>Prebuilt Computers</p>
        </a>
    </div>
    <div class="category-item">
        <a href="#gpu">
            <img src="images/gpu.png" alt="GPU">
            <p>GPUs</p>
        </a>
    </div>
    <div class="category-item">
        <a href="#psu">
            <img src="images/psu.png" alt="PSU">
            <p>PSUs</p>
        </a>
    </div>
</section>


</body>
</html>
