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

        $product_rs = Database::search("SELECT * FROM `cart` INNER JOIN `coffee` ON `cart`.`Coffee_CoffeeId` = `coffee`.`CoffeeId` ");
        $product_num = $product_rs->num_rows;

        $total = 0;

        for ($i = 0; $i < $product_num; $i++) {
            $product_data = $product_rs->fetch_assoc();
            $total = $total + $product_data["price"] * $product_data["qty"];
        ?>
            <div>
                <img src="<?php echo ($product_data["CoffeImagePath"]) ?>" style="width: 100px; height: auto;" alt="">
                <span><?php echo ($product_data["CoffeeName"]) ?></span>
                <span> X <?php echo ($product_data["price"]) ?></span>
                <input type="number" id="qty" value="<?php echo ($product_data["qty"]) ?>">
                <button onclick="UpdateQty(<?php echo ($product_data['Coffee_CoffeeId']) ?>)">Update quantity</button>
                <button onclick="addcart(<?php echo ($product_data['Coffee_CoffeeId']) ?>)">Delete from cart</button>
                <hr>
            </div>
        <?php
        }


        ?>

    </div>
    <div style="width: 20%;">
        <hr>
        <h1>Total = Rs. <?php echo ($total) ?></h1>
        <hr>
        <button>Buy Now</button>
    </div>


    <script src="script.js"></script>
</body>

</html>