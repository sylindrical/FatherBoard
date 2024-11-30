<x-layout>
    <x-slot:title>
        Products
    </x-slot:title>
    <x-slot:sheet>
        products
    </x-slot:sheet>
    <h2>Products</h2>

<br>
<div id="ProductContainer">
    <?php
    foreach($data as $x=>$item)
    {
        
            ?>

            <div class="ProductItem"><p hidden class="product_identity">{{$x}}</p>
            <h2><?php echo $item['Title'] ?></h2>
            <p><?php echo $item['Description'] ?></p>
            <p><?php echo $item['Owner'] ?></p>
            </div>
            <?php

    }
    ?>
    </div>
</x-layout>