<?php
require_once "../db.php";
session_start();
$product_id = $_GET['id'];
$user_id = $_SESSION['user_id'];
$product = $conn->query("SELECT * FROM product WHERE product_id = $product_id")->fetch_assoc();
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $name = $_POST['name'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $quantity = $_POST['quantity'];

  // Insert data into database
  $date = date("Y-m-d");
  $datey = date("Y-m-d", strtotime("+15 days"));
  $sql = "INSERT INTO `orders` (`product_id`, `user_id`, `date_order`, `date_delivery`, `user_address`, `quantity`, `phone_number`, `name`) VALUES ($product_id, $user_id , '$date', '$datey', '$address', $quantity, '$phone', '$name')";

  // Execute the query
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("location: bascket.php");

    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="global.css" />
  <link rel="stylesheet" href="order.css" />
</head>

<body>
  <div class="diet">
    <div class="diet-child"></div>
    <div class="diet-item"></div>
    <div class="diet-inner"></div>
    <div class="logo">
      <img class="frame-icon" alt="" src="public/frame.svg" />

      <div class="arms">4-ARMS</div>
    </div>
    <div class="login-button">
      <div class="profile">
        <a href=""> Profile</a>
      </div>
    </div>
    <div class="nav-bar">
      <div class="home"><a href="../NewHome/newHome.php">Home</a></div>
      <div class="nav-bar-child"></div>
      <div class="workout"><a href="../workout/workout.php">Workout</a></div>
      <div class="diet1"><a href="../diet/diet.php">Diet</a></div>
      <div class="shop"><a href="../Shop/supplement.php">Shop</a></div>
    </div>


    <img class="product_image" alt="" src="<?php echo $product['png_link']; ?>" />
    <div class="product-description-creatine-container">
      <div class="product-description" style="color:#1E1E1E; font-size:60px;"> <?php echo $product['product_name'] ?> </div>
      <p class="product-description">&nbsp;</p>
      <p class="product-description">Product Description:</p>
      <p class="product-description">&nbsp;</p>
      <p class="product-description"> <?php echo $product['product_description'] ?> </p>

    </div>

    <div class="diet-child1"></div>



    <div class="client-information-address-container">
      <p class="product-description">Client information:</p>
      <form method="post" action="">
        <div class="form-group">
          <label for="name" class="control-label">Quantity:</label>
          <input type="number" min=0 name="quantity" id="name" class="form-control" value="1" required>
        </div>
        <div class="form-group">
          <label for="name" class="control-label">Name:</label>
          <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="address" class="control-label">Address:</label>
          <input type="text" name="address" id="address" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="phone" class="control-label">Phone:</label>
          <input type="text" name="phone" id="phone" class="form-control" required>
        </div>
        <div class="form-group submit-button-container">
          <input type="submit" name="submit" value="ORDER" class="submit-button">
        </div>
      </form>
    </div>

</body>

</html>