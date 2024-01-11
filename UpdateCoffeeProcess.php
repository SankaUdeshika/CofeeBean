<?php

require "connection.php";

if (empty($_POST["CName"])) {
    echo ("Pelase Enter Coffee Name");
} else if (empty($_POST["Ccategory"])) {
    echo ("Pelase Select a Category");
} else if (empty($_POST["Cprice"])) {
    echo ("Pelase Enter a Price");
} else if (empty($_POST["Cprice"])) {
    echo ("Pelase Enter a Description");
} else {

    $CoffeeName = $_POST["CName"];
    $CoffeeCategory = $_POST["Ccategory"];
    $CoffeePrice = $_POST["Cprice"];
    $CoffeeDescription = $_POST["Cdescription"];
    $id = $_POST["Cid"];

    Database::iud("UPDATE `coffee` SET `CoffeeName` = '" . $CoffeeName . "' , `price` = '" . $CoffeePrice . "' , `CofeeDescription` = '" . $CoffeeDescription . "' , `CoffeeCategory_Category_id` ='" . $CoffeeCategory . "' WHERE `CoffeeId` = '" . $id . "' ");
    echo ("SUCCESS");
}
