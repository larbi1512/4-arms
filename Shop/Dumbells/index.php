<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./global.css" />
  <link rel="stylesheet" href="./index.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nasalization:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open Sans:wght@600;700&display=swap" />
</head>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $name = $_POST['name'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];

  // Connect to database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "4-arms";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Insert data into database
  $sql = "INSERT INTO `delivery info` (Address, phone, name) VALUES ('$address', '$phone', '$name')";

  if (mysqli_query($conn, $sql)) {
    echo "";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  // Close database connection
  mysqli_close($conn);
}
?>

<body>
  <div class="diet">
    <div class="diet-child"></div>
    <div class="diet-item"></div>
    <div class="diet-inner"></div>
    <div class="logo">
      <img class="frame-icon" alt="" src="./public/frame.svg" />

      <div class="arms">4-ARMS</div>
    </div>
    <div class="login-button">
      <div class="profile">Profile</div>
    </div>
    <div class="nav-bar">
      <div class="home"><a href="../../NewHome/newHome.html">Home</a></div>
      <div class="nav-bar-child"></div>
      <div class="workout"><a href="../../workout/workout.html">workout</a></div>
      <div class="diet1"><a href="../../diet/diet.php">Diet</a></div>
      <div class="shop"><a href="../../Shop/shop.html">Shop</a></div>
    </div>
    <style>
      a {
        text-decoration: none;
        color: #ff182c !important;
      }
    </style>
    <div class="creatine">Dumbells</div>
    <div class="product-description-dumbbells-container">
      <p class="product-description">Product Description:</p>
      <ul class="dumbbells-are-a-versatile-fitn">
        <li class="metal-grip-on-both-ends">
          <span>Dumbbells are a versatile fitness accessory that are used to
            strengthen various muscle groups</span>
        </li>
        <li class="metal-grip-on-both-ends">
          <span>Metal grip on both ends</span>
        </li>
        <li class="metal-grip-on-both-ends">
          <span>Various sizes and weights suitable for different exercises</span>
        </li>
      </ul>
      <p class="blank-line">&nbsp;</p>
    </div>

    <img class="material-symbolsshopping-cart-icon" alt="" src="./public/materialsymbolsshoppingcart.svg" />

    <div class="diet-child1"></div>
    <div class="client-information-address-container">
      <p class="blank-line">Client information:</p>
      <p class="blank-line">Name:</p>
      <p class="blank-line">Address:</p>
      <p class="blank-line">Phone:</p>
    </div>
    <img class="studio-portrait-bearded-brutal-icon" alt="" src="./public/studioportraitbeardedbrutalmaleisolatedgraybackgroundremovebgpreview-1@2x.png" />

    <img class="pngwing-1-icon" alt="" src="./public/pngwing-1@2x.png" />

    <img class="pngwing-2-icon" alt="" src="./public/pngwing-2@2x.png" />
  </div>
  <div class="client-information-address-container">
    < <form method="post" action="">
      <div class="form-group">
        <label for="name" class="control-label"></label>
        <input type="text" name="name" id="name" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="address" class="control-label"></label>
        <input type="text" name="address" id="address" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="phone" class="control-label"></label>
        <input type="text" name="phone" id="phone" class="form-control" required>
      </div>
      <div class="form-group submit-button-container">
        <input type="submit" name="submit" value="ORDER" class="submit-button">
      </div>
      </form>
  </div>
</body>

</html>