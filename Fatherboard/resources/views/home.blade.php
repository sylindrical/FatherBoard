<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href={{asset("/css/home.css")}} />
    <title>Home</title>
</head>
<body>
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
</body>
</html>