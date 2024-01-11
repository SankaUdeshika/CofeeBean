<?php
require "connection.php";

if (!isset($_POST["Email"])) {
    echo ("Please Enter a Email address");
} else if (!isset($_POST["passwrod"])) {
    echo ("Please Enter a Password");
} else {
    $email = $_POST["Email"];
    $passwrod = $_POST["passwrod"];

    $admin_rs =  Database::search("SELECT * FROM `admin` WHERE `adminEmail` = '" . $email . "' AND `password`= '" . $passwrod . "'");
    $admin_num = $admin_rs->num_rows;
    if ($admin_num == 1) {
        echo ("Success");
    } else {
        echo ("Something Wrong. Please Try again later");
    }

}
