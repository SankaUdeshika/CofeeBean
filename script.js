function addCoffee() {
  var CName = document.getElementById("Cname").value;
  var Ccategory = document.getElementById("Ccategory").value;
  var Cprice = document.getElementById("Cprice").value;
  var Cdescription = document.getElementById("Cdescription").value;
  var Cimage = document.getElementById("Cimage");

  var f = new FormData();
  f.append("CName", CName);
  f.append("Ccategory", Ccategory);
  f.append("Cprice", Cprice);
  f.append("Cdescription", Cdescription);
  f.append("Cimage", Cimage.files[0]);

  var r = new XMLHttpRequest();

  r.open("POST", "addCoffeeProcess.php", true);
  r.send(f);

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      alert(r.responseText);
      window.location.reload();
    }
  };
}

function ViewAddCoffeImage() {
  var fileInput = document.getElementById("Cimage");
  var ImageView = document.getElementById("ImageView");
  var ImageFile = fileInput.files[0];
  var url = window.URL.createObjectURL(ImageFile);
  ImageView.src = url;
}

function UpdateCofeeInfo(id) {
  var CName = document.getElementById("Cname").value;
  var Ccategory = document.getElementById("Ccategory").value;
  var Cprice = document.getElementById("Cprice").value;
  var Cdescription = document.getElementById("Cdescription").value;

  var f = new FormData();
  f.append("CName", CName);
  f.append("Ccategory", Ccategory);
  f.append("Cprice", Cprice);
  f.append("Cdescription", Cdescription);
  f.append("Cid", id);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      alert(r.responseText);
      window.location.reload();
    }
  };
  r.open("POST", "UpdateCoffeeProcess.php", true);
  r.send(f);
}

function DeleteCoffeeInfo(id) {
  var f = new FormData();
  f.append("id", id);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      alert(r.responseText);
      window.location.reload();
    }
  };
  r.open("POST", "DeleteCoffeeProcess.php", true);
  r.send(f);
}

function addcart(id) {
  var f = new FormData();
  f.append("id", id);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      alert(r.responseText);
      window.location.reload();
    }
  };
  r.open("POST", "addcartProcess.php", true);
  r.send(f);
}

function UpdateQty(id) {
  var qty = document.getElementById("qty").value;

  var f = new FormData();
  f.append("id", id);
  f.append("qty", qty);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      alert(r.responseText);
      window.location.reload();
    }
  };
  r.open("POST", "updateCartQty.php", true);
  r.send(f);
}



