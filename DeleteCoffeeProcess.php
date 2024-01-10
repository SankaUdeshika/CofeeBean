<?php
require "connection.php";
if (!isset($_POST["id"])) {
    echo ("SOmething wrong Please Try again later");
} else {
    $id = $_POST["id"];
    $image_rs = Database::search("SELECT * FROM `coffee` WHERE `CoffeeId` = '" . $id . "' ");
    $image_data = $image_rs->fetch_assoc();

    unlink($image_data["CoffeImagePath"]);
    Database::iud("DELETE FROM `coffee` WHERE `CoffeeId` = '" . $id . "'");
    echo ("Delete Success");
}
