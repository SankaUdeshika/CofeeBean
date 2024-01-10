<?php
require "connection.php";
$id = $_POST["id"];

$cart_rs = Database::search("SELECT * FROM `cart` WHERE `Coffee_CoffeeId` = '".$id."'");
$cart_num = $cart_rs->num_rows;

if($cart_num == 1 ){
    Database::iud("DELETE FROM `cart` WHERE `Coffee_CoffeeId` = '".$id."' ");
    echo("remove from cart");
}else if($cart_num == 0){
    Database::iud("INSERT INTO `cart` (`Coffee_CoffeeId`,`qty`) VALUES ('".$id."', '1')");
    echo("add to cart");
}

?>