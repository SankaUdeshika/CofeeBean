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
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      alert(r.responseText);
      window.location.reload();
    }
  };
  r.open("POST", "addCoffeeProcess.php", true);
  r.send(f);
}

function ViewAddCoffeImage() {
  var fileInput = document.getElementById("Cimage");
  var ImageView = document.getElementById("ImageView");
  var ImageFile = fileInput.files[0];
  var url = window.URL.createObjectURL(ImageFile);
  ImageView.src = url;
}
