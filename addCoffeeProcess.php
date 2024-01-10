<?php

require "connection.php";

if (!isset($_POST["CName"])) {
    echo ("Please Enter Coffee Name");
} else if (!isset($_POST["Ccategory"])) {
    echo ("Please Select Coffe Category");
} else if (!isset($_POST["Cprice"])) {
    echo ("Please Enter Coffe price");
} else if (!isset($_POST["Cdescription"])) {
    echo ("Please Enter Coffe Description");
} else if (isset($_FILES['Cimage'])) {

    $CoffeeName = $_POST["CName"];
    $CoffeeCategory = $_POST["Ccategory"];
    $CoffeePrice = $_POST["Cprice"];
    $CoffeeDescription = $_POST["Cdescription"];

    $file = $_FILES["Cimage"];
    $fileType = $file["type"];
    $allowed_image_extentions = array("image/jpg", "image/png", "image/jpeg", "image/svg+xml");

    if (in_array($fileType, $allowed_image_extentions)) {
        $newImageExtentions;
        if ($fileType == "image/jpg") {
            $newImageExtentions = ".jpg";
        } else if ($fileType == "image/png") {
            $newImageExtentions = ".png";
        } else if ($fileType == "image/jpeg") {
            $newImageExtentions = ".jpeg";
        } else if ($fileType == "image/svg+xml") {
            $newImageExtentions = ".svg";
        }

        $newImageFileName = "img//CofeeImages//" . $CoffeeName . $newImageExtentions;
        move_uploaded_file($file["tmp_name"], $newImageFileName);
        Database::iud("INSERT INTO `coffee` (`CoffeeName`,`price`,`CofeeDescription`,`CoffeeCategory_Category_id`,`CoffeImagePath`) VALUES('" . $CoffeeName . "','" . $CoffeePrice . "','".$CoffeeDescription."','".$CoffeeCategory."','".$newImageFileName."') ");
        echo ("Success");
    } else {
        echo ("InvalidImageType");
    }
} else {
    echo ("PleaseSelectImage");
}
