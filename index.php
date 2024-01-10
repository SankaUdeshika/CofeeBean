<?php
require "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <title>Coffee Bean Coffee Shop</title>
</head>

<body>
  <header>
    <div class="logo">
      <a href="#">Coffee <span>Bean</span></a>
    </div>

    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#menu">Menu</a></li>
        <li><a href="#shop">Shop</a></li>
        <li><a href="#contact">Contact Us</a></li>
      </ul>
    </nav>
  </header>

  <div class="content">
    <h2>Welcome To The Coffee Bean</h2>
    <p>"Start your day with Coffee Bean and Make Your Day Chill...!"</p>
  </div>

  <div class="menu" id="menu">
    <div class="menu-header">
      <h4>Coffee Bean Coffee Types</h4>
    </div>

    <!-- Sanka Courasel start -->
    <!-- <hr /> -->
    <div class="carousel">
      <ol class="carousel__Viewport">
        <li class="corousel__Slide">
          <div class="carousel__snapper" style="background-image: url('img/hot-coffees.jpg');">
          </div>
          <div class="imageText">
            <label>Hot Coffe</label>
          </div>
          <div class="paraText">
            <p>Savor the rich aroma and comforting warmth of our freshly brewed hot coffee, a delightful morning indulgence.</p>
          </div>
        </li>

        <li class="corousel__Slide">
          <div class="carousel__snapper" style="background-image: url('img/cold-coffees.jpg');">
          </div>
          <div class="imageText">
            <label>Cold Coffe</label>
          </div>
          <div class="paraText">
            <p>Feel the refreshing chill of our iced coffee, perfect for hot summer days.</p>
          </div>
        </li>


        <li class="corousel__Slide">
          <div class="carousel__snapper" style="background-image: url('img/frappuccino.jpg')"></div>
          <div class="imageText" style="left: 26%;">
            <label>Shakes</label>
          </div>
          <div class="paraText">
            <p>Cool off with our irresistible Frappuccinos and milkshakes, a delightful blend of flavor and refreshment.</p>
          </div>
        </li>
        <li class="corousel__Slide">
          <div class="carousel__snapper" style="background-image: url('img/Mocha.png')"></div>
          <div class="imageText" style="left: 36%;">
            <label>Tea</label>
          </div>
          <div class="paraText">
            <p>Discover the soothing essence of our exquisite tea blends and infusions.</p>
          </div>
        </li>
        <li class="corousel__Slide">
          <div class="carousel__snapper" style="background-image: url('img/mojj.jpg')"></div>
          <div class="imageText" style="left: 28%;">
            <label>Special</label>
          </div>
          <div class="paraText">
            <p>Delight in exclusive coffee shop creations, crafted for your extraordinary taste..</p>
          </div>
        </li>

      </ol>
    </div>
    <!-- <hr /> -->
    <!-- Sanka Courasel End -->

  </div>

  <div class="shop" id="shop">
    <div class="shop-header">
      <h4>Coffee Bean Coffee Menu</h4>
    </div>




    <div class="shop-box">

      <?php
      $coffee_rs = Database::search("SELECT * FROM `coffee`");
      $coffee_num = $coffee_rs->num_rows;

      for ($i = 0; $i < $coffee_num; $i++) {
        $coffee_data = $coffee_rs->fetch_assoc();
      ?>
        <div class="item-1">
          <div class="card">
            <div class="card-image">
              <img src="<?php echo ($coffee_data["CoffeImagePath"]) ?>" />
            </div>
            <div class="card-body">
              <label class="cash">Rs.<?php echo ($coffee_data["price"]) ?></label>
              <h3><?php echo ($coffee_data["CoffeeName"]) ?></h3>
              <label> <?php echo ($coffee_data["CofeeDescription"]) ?> </label>

              <?php
              $cart_rs = Database::search("SELECT * FROM `cart` WHERE `Coffee_CoffeeId` = '" . $coffee_data['CoffeeId'] . "'");
              $cart_num = $cart_rs->num_rows;

              if ($cart_num == 1) {
              ?>
                <button onclick="addcart( <?php echo ($coffee_data['CoffeeId']) ?> );">Add to cart</button>
              <?php
              } else if ($cart_num == 0) {
              ?>
                <button onclick="addcart( <?php echo ($coffee_data['CoffeeId']) ?> );">Remove form cart</button>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      <?php
      }

      ?>




      <!-- <div class="item-1">
        <div class="card">
          <div class="card-image">
            <img src="img/caramel-macchiato.jpg" />
          </div>
          <div class="card-body">
            <label class="cash">Rs.800</label>
            <h3>CARAMEL LATTE</h3>
            <label>
              Experience the perfect harmony of espresso and caramel in our
              lattes.</label>
          </div>
        </div>
      </div>
      <div class="item-2">
        <div class="card">
          <div class="card-image">
            <img src="img/flat-white.png" />
          </div>
          <div class="card-body">
            <label class="cash">Rs.650</label>
            <h3>HOT CHOCOLATE</h3>
            <label>
              Cozy up with our creamy hot chocolate, a delightful winter
              indulgence.</label>
          </div>
        </div>
      </div>
      <div class="item-3">
        <div class="card">
          <div class="card-image">
            <img src="img/chocolate-frappuccino.png" />
          </div>
          <div class="card-body">
            <label class="cash">Rs.1100</label>
            <h3>CHOCOLATE FRAPPUCINO</h3>
            <label>Delight in our luscious chocolate frappuccino, a heavenly blend
              of flavors.</label>
          </div>
        </div>
      </div>
      <div class="item-4">
        <div class="card">
          <div class="card-image">
            <img src="img/frappe.jpg" />
          </div>
          <div class="card-body">
            <label class="cash">Rs.1400</label>
            <h3>FRAPPE</h3>
            <label>Discover a world of frappe flavors, from classic coffee to
              exotic blends.</label>
          </div>
        </div>
      </div>
      <div class="item-5">
        <div class="card">
          <div class="card-image">
            <img src="img/caffe-mocha.png" />
          </div>
          <div class="card-body">
            <label class="cash">Rs.900</label>
            <h3>CAFFE MOCHA</h3>
            <label>Savor the harmonious blend of rich espresso and decadent
              chocolate.</label>
          </div>
        </div>
      </div>
      <div class="item-6">
        <div class="card">
          <div class="card-image">
            <img src="img/vanilla-frappuccino.jpg" />
          </div>
          <div class="card-body">
            <label class="cash">Rs.1000</label>
            <h3>VANILLA FRAPPUCINO</h3>
            <label>Indulge in the creamy sweetness of our classic Vanilla
              Frappuccino.</label>
          </div>
        </div>
      </div>
      <div class="item-7">
        <div class="card">
          <div class="card-image">
            <img src="img/white-chocolate-mocha.jpg" />
          </div>
          <div class="card-body">
            <label class="cash">Rs.950</label>
            <h3>WHITE CHOCOLATE FRAPPUCINO</h3>
            <label>Experience a velvety delight of our White Chocolate Mocha
              perfection.</label>
          </div>
        </div>
      </div>
      <div class="item-8">
        <div class="card">
          <div class="card-image">
            <img src="img/ice-latte.jpg" />
          </div>
          <div class="card-body">
            <label class="cash">Rs.1200</label>
            <h3>ICE LATTE</h3>
            <label>Chill with the invigorating essence of our refreshing and
              creamy iced latte</label>
          </div>
        </div>
      </div>
      <div class="item-9">
        <div class="card">
          <div class="card-image">
            <img src="img/Espresso.jpg" />
          </div>
          <div class="card-body">
            <label class="cash">Rs.500</label>
            <h3>ESPRESSO</h3>
            <label>Embrace the bold and robust flavor of our premium espresso
              shots.</label>
          </div>
        </div>
      </div>
      <div class="item-10">
        <div class="card">
          <div class="card-image">
            <img src="img/americano.jpg.jpg" />
          </div>
          <div class="card-body">
            <label class="cash">Rs.400</label>
            <h3>AMERICANO</h3>
            <label>Savor the simplicity of our classic Americano, a pure coffee
              essence.</label>
          </div>
        </div>
      </div>
      <div class="item-11">
        <div class="card">
          <div class="card-image">
            <img src="img/cappucino.jpeg" />
          </div>
          <div class="card-body">
            <label class="cash">Rs.700</label>
            <h3>CAPPUCCINO</h3>
            <label>Indulge in a rich, creamy cappuccino for a delightful coffee
              experience.</label>
          </div>
        </div>
      </div>
      <div class="item-12">
        <div class="card">
          <div class="card-image">
            <img src="img/Machchiato.jpeg" />
          </div>
          <div class="card-body">
            <label class="cash">Rs.850</label>
            <h3>MACHCHIATO</h3>
            <label>Experience the bold and balanced flavors of a delectable
              macchiato.</label>
          </div>
        </div>
      </div> -->
    </div>
  </div>

  <!-- About Us -->
  <div class="contact" id="contact">


    <div class="contact-box">
      <div class="contact-body">
        <form>
          <h2>About Us</h2>
          <div class="">
            <label style="color: white; font-weight: bold;">Who We Are</label>
            <p style="color: white;">Coffe Bean (PVT) LTD is founded in 2023, our corporate philosophy is “maintaining quality and efficacy without compromising” these important words represent our corporate values to the nation to which we will always be dedicated,</p>
          </div>

          <div style="margin-top: 30px;">
            <label style="color: white; font-weight: bold; margin: 10px;"><i class="bi bi-house"></i></label><span style="color: white; font-weight: bold;"> &nbsp;&nbsp;&nbsp;40/6 Bellanthara Road Dehiwala</span><br>
            <label style="color: white; font-weight: bold; margin: 10px;"><i class="bi bi-envelope-at"></i></label><span style="color: white; font-weight: bold;">&nbsp;&nbsp;&nbsp;CoffeBeans@gmail.com</span><br>
            <label style="color: white; font-weight: bold; margin: 10px;"><i class="bi bi-telephone"></i></label><span style="color: white; font-weight: bold;">&nbsp;&nbsp;&nbsp;0112727526 / 0764213724</span>
          </div>

        </form>
      </div>
    </div>
    <div class="contact-box">
      <div class="contact-image">
        <img src="img/bg-image.jpeg" />
      </div>
    </div>
  </div>



  <!-- Contatct us -->
  <div class="contact" id="contact">
    <div class="contact-box">
      <div class="contact-image">
        <img src="img/coffee-1958233_1280.jpg" />
      </div>
    </div>

    <div class="contact-box">
      <div class="contact-body">
        <form>
          <h2>Contact Us</h2>
          <div class="form-content">
            <input type="text" required />
            <span></span>
            <label>Username</label>
          </div>
          <div class="form-content">
            <input type="email" required />
            <span></span>
            <label>Email</label>
          </div>
          <button type="submit">Send</button>
        </form>
      </div>
    </div>
  </div>

  <div class="footer">
    <div class="footer-box">
      <div class="copyright">
        <label>Developed by H A E S Piumra &copy; 2023</label>
      </div>
      <div class="brand">
        <label>Coffee <span>Bean</span></label>
      </div>
    </div>
  </div>
  <script src="script.js"></script>
</body>

</html>