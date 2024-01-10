<?php
require "connection.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin Manage Coffee</title>
</head>

<body>

    <?php
    $Coffee_rs = Database::search("SELECT * FROM `coffee`");
    $Cofffe_num = $Coffee_rs->num_rows;

    for ($i = 0; $i < $Cofffe_num; $i++) {
        $Coffee_data = $Coffee_rs->fetch_assoc();
    ?>
        <div>
            <img src="<?php echo ($Coffee_data["CoffeImagePath"]) ?>" style="width: 100px; height: auto;" alt="">
            <input type="text" id="Cname" value="<?php echo ($Coffee_data["CoffeeName"]) ?>">
            <input type="text" id="Cprice" value="<?php echo ($Coffee_data["price"]) ?>">
            <textarea name="" id="Cdescription" cols="30" rows="10"><?php echo ($Coffee_data["CofeeDescription"]) ?></textarea>
            <select id="Ccategory">
                <?php
                $category_rs = Database::search("SELECT * FROM `coffeecategory`");
                $category_num = $category_rs->num_rows;

                for ($x = 0; $x < $category_num; $x++) {
                    $category_data = $category_rs->fetch_assoc();
                ?>
                    <option value="<?php echo ($category_data["Category_id"]) ?>"><?php echo ($category_data["Category_name"]) ?></option>
                <?php
                }
                ?>
            </select>
            <button onclick="UpdateCofeeInfo(<?php echo ($Coffee_data['CoffeeId']) ?>);">Upadate</button>
            <button>Delete</button>
        </div>
    <?php
    }


    ?>

    <script src="script.js"></script>

</body>

</html>