<?php
require "connection.php";

if (!isset($_POST["qty"])) {
    echo ("Please Enter a Coffee Quantity");
} else {

    $qty = $_POST["qty"];
    $id = $_POST["id"];

    Database::iud("UPDATE `cart` SET `qty` = '" . $qty . "' WHERE `Coffee_CoffeeId` = '" . $id . "' ");
    echo ("Success");
    
}
