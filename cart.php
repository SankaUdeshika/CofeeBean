<?php
require "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>

<body>
    <div style="width: 50%;background-color: red;">

        <div style="display: flex; justify-content:  center;">
            <h1>Cart</h1>
        </div>
        <hr>

        <?php

        $product_rs = Database::search("SELECT * FORM `cart` ");

        ?>

    </div>
    <div style="width: 50%;"></div>


    <script src="script.js"></script>
</body>

</html>