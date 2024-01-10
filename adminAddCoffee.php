<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin Add Coffee</title>
    <link rel="stylesheet" href="style.css">
</head>

<body style="display: flex; justify-content: center;  align-items: center; width: 100%; height: 100vh; ">
    <div class="BackCoverDiv">
        <span>Cofee Name</span>
        <input type="text" placeholder="Please Enter Coffee Name" id="Cname">
        <hr>
        <span>Coffee Category</span>
        <select name="" id="Ccategory">
            <option value="1">Hot Coffee</option>
            <option value="2">Cold Coffee</option>
            <option value="3">Shakes</option>
        </select>
        <hr>
        <span>Cofee Price</span>
        <input type="text" placeholder="Please Enter Coffee Price" id="Cprice">
        <hr>
        <span>Cofee Description</span>
        <textarea name="" id="Cdescription" cols="50" rows="5"></textarea>
        <hr>
        <span> Add Cofee Image</span> <br>
        <img src="" alt="" id="ImageView" style="width: 100px; height: auto;">
        <input type="file" id="Cimage" onchange="ViewAddCoffeImage();">
        <hr>
        <button onclick="addCoffee();">Add Coffe Product</button>

    </div>

    <script src="script.js"></script>
</body>

</html>