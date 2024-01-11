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
  var CName = document.getElementById("Cname" + id).value;
  var Ccategory = document.getElementById("Ccategory" + id).value;
  var Cprice = document.getElementById("Cprice" + id).value;
  var Cdescription = document.getElementById("Cdescription" + id).value;

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

function adminLogin() {
  var Email = document.getElementById("Email").value;
  var passwrod = document.getElementById("Password").value;

  var f = new FormData();
  f.append("Email", Email);
  f.append("passwrod", passwrod);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var responseText = r.responseText;
      if (responseText == "Success") {
        window.location = "amdinDashboard.php";
      } else {
        alert(r.responseText);
      }
    }
  };
  r.open("POST", "adminLoginProcess.php", true);
  r.send(f);
}

function adminsignup() {
  var Email = document.getElementById("email").value;
  var passwrod = document.getElementById("passwrod").value;

  var f = new FormData();
  f.append("Email", Email);
  f.append("passwrod", passwrod);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var responseText = r.responseText;
      alert(responseText);
    }
  };
  r.open("POST", "adminsignupProcess.php", true);
  r.send(f);
}
