<?php
require "connection.php";

if (empty($_POST["Email"])) {
    echo ("Please Enter a Email  address");
} else if (empty($_POST["passwrod"])) {
    echo ("Please Enter a password");
} else {

    $email = $_POST["Email"];
    $passwrod = $_POST["passwrod"];

    Database::iud("INSERT INTO `admin` (`adminEmail`,`password`) VALUES ('" . $email . "','" . $passwrod . "')");
    echo ("Insert Success");
}
