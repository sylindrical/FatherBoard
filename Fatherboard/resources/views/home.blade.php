<x-layout>
    <x-slot:title>
        Home
    </x-slot:title>
    <h2>Home Page</h2>

<br>
<div id="ProductContainer">
    <?php
    foreach($data as $x=>$item)
    {

            ?>
            <div class="ProductItem">
            <h2><?php echo $item['Title'] ?></h2>
            <p><?php echo $item['Description'] ?></p>
            <p><?php echo $item['Owner'] ?></p>
            </div>
            <?php

    }
    ?>
    </div>
</x-layout>