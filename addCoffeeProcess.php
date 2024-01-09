<?php

if (isset($_POST["CName"])) {
    echo("Please Enter Coffee Name");
} else if (isset($_POST["CName"])) {
} else if (isset($_POST["CName"])) {
} else if (isset($_POST["CName"])) {
}


// if (isset($_FILES['CategoryImageInput'])) {
//     $file = $_FILES["CategoryImageInput"];
//     $fileType = $file["type"];
//     $allowed_image_extentions = array("image/jpg", "image/png", "image/jpeg", "image/svg+xml");

//     if (in_array($fileType, $allowed_image_extentions)) {
//         $newImageExtentions;
//         if ($fileType == "image/jpg") {
//             $newImageExtentions = ".jpg";
//         } else if ($fileType == "image/png") {
//             $newImageExtentions = ".png";
//         } else if ($fileType == "image/jpeg") {
//             $newImageExtentions = ".jpeg";
//         } else if ($fileType == "image/svg+xml") {
//             $newImageExtentions = ".svg";
//         }

//         if (!empty($_POST["CategoryText"])) {
//             $text = $_POST["CategoryText"];

//             $newImageFileName = "Resources//images//categoryImages//" . $text . $newImageExtentions;
//             move_uploaded_file($file["tmp_name"], $newImageFileName);
//             Database::iud("INSERT INTO `categoryimage` (`path`,`ImageText`) VALUES('" . $newImageFileName . "','" . $text . "') ");
//             echo ("Success");
//         } else {
//             echo ("PleaseAddText");
//         }
//     } else {
//         echo ("InvalidImageType");
//     }
// } else {
//     echo ("PleaseSelectImage");
// }
