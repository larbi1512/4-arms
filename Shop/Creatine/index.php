<?php
require_once "../../db.php";
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $name = $_POST['name'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];

  // Insert data into database
  $date = date("Y-m-d");
  $datey = date("Y-m-d", strtotime("+15 days"));
  $sql = "INSERT INTO `orders` (`product_id`, `user_id`, `date_order`, `date_delivery`, `user_address`, `quantity`, `phone_number`, `name`) VALUES ('1', '1', '$date', '$datey', '$address', '1', '$phone', '$name')";

  // Execute the query
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("location: ../bascket.php");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  // Close the connection
  $conn->close();
}
?>

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
      <div class="profile">
        <a href=""> Profile</a>
      </div>
    </div>
    <div class="nav-bar">
      <div class="home"><a href="../../NewHome/newHome.html">Home</a></div>
      <div class="nav-bar-child"></div>
      <div class="workout"><a href="../../workout/workout.html">Workout</a></div>
      <div class="diet1"><a href="../../diet/diet.php">Diet</a></div>
      <div class="shop"><a href="../../Shop/shop.html">Shop</a></div>
    </div>
    <style>
      a {
        text-decoration: none;
        color: #ff182c !important;
      }
    </style>
    <div class="creatine" style="color: #ffffff !important; ">Premium Creatine</div>
    <div class="product-description-creatine-container">
      <p class="product-description">Product Description:</p>
      <p class="product-description">&nbsp;</p>
      <p class="product-description">CREATINE POWDER (317GR)</p>
      <ul class="intensely-stimulates-muscle-gr">
        <li class="without-aroma">
          <span>Intensely Stimulates Muscle Growth and Strength</span>
        </li>
        <li class="without-aroma">
          <span>Without aroma</span>
        </li>
        <li class="without-aroma">
          <span>99.9% pure creatine</span>
        </li>
      </ul>
    </div>

    <img class="pngwing-icon" alt="" src="./public/pngwing@2x.png" />

    <img class="pngwing-icon1" alt="" src="./public/pngwing1@2x.png" />

    <img class="pngwing-icon2" alt="" src="./public/pngwing2@2x.png" />

    <div class="diet-child1"></div>



    <div class="client-information-address-container">
      <p class="product-description">Client information:</p>
      <form method="post" action="">
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
<style>
  .diet-child {
    position: absolute;
    top: 250px;
    left: 53px;
    border-radius: 30px;
    background-color: #3E3E3E;
    box-shadow: 7px 6px 11px 2px rgba(43, 43, 46, 0.75);
    width: 1330px;
    height: 1306px;
  }

  .diet-item {
    position: absolute;
    top: 308px;
    left: 130px;
    border-radius: var(--br-xl);
    background-color: var(--color-white);
    width: 1167px;
    height: 849px;
  }

  .diet-inner,
  .frame-icon {
    position: absolute;
    top: 0;
    left: 0;
  }

  .diet-inner {
    background-color: black;
    width: 1440px;
    height: 95px;
  }

  .frame-icon {
    width: 62px;
    height: 51px;
    overflow: hidden;
  }

  .arms,
  .logo {
    position: absolute;
    top: 12px;
    left: 68px;
  }

  .logo {
    top: 20px;
    left: 21px;
    width: 191px;
    height: 51px;
    font-size: 28px;
  }

  .profile {
    position: relative;
  }

  .login-button {
    position: absolute;
    top: 20px;
    left: 1220px;
    border-radius: var(--br-xl);
    background-color: var(--color-gainsboro);
    width: 200px;
    height: 51px;
    display: flex;
    flex-direction: row;
    padding: 9px 40px;
    box-sizing: border-box;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    color: var(--sexy-rouge);
  }

  .home {
    position: absolute;
    top: calc(50% - 20.5px);
    left: calc(50% - 271.5px);
    display: inline-block;
    width: 101.85px;
    height: 33.46px;
  }

  .nav-bar-child {
    position: absolute;
    top: 0;
    left: 441px;
    border-radius: 17px;
    background-color: var(--color-gainsboro);
    width: 102px;
    height: 41px;
  }

  .diet1,
  .workout {
    top: calc(50% - 20.5px);
    display: inline-block;
    height: 33.46px;
  }

  .workout {
    position: absolute;
    left: calc(50% - 125.23px);
    width: 150.6px;
  }

  .diet1 {
    left: calc(50% + 69.79px);
    width: 66.09px;
  }

  .diet1,
  .nav-bar,
  .shop {
    position: absolute;
  }

  .shop {
    top: calc(50% - 20.5px);
    left: calc(50% + 180.31px);
    display: inline-block;
    width: 91.01px;
    height: 33.46px;
  }

  .nav-bar {
    top: calc(50% - 795px);
    left: calc(50% - 327px);
    width: 543px;
    height: 41px;
    color: var(--sexy-rouge);
  }

  .creatine {
    position: absolute;
    top: 169px;
    left: 448px;
    font-size: 60px;
    color: #2b2b2e;
  }

  .product-description {
    margin: 0;
    margin-bottom: -2px;
  }

  .without-aroma {
    margin-bottom: 0;
  }

  .intensely-stimulates-muscle-gr {
    margin: 0;
    font-size: var(--font-size-13xl);
    padding-left: 43px;
  }

  .product-description-creatine-container {
    position: absolute;
    top: 862px;
    left: 150px;
    font-family: var(--font-inherit);
    color: #3E3E3E;
    display: inline-block;
    width: 712px;
    height: 268px;
    font-size: var(--font-size-15xl);
  }

  .rectangle-div {
    position: absolute;
    top: 1084px;
    left: 990px;
    border-radius: var(--br-xl);
    background-color: black;
    width: 209px;
    height: 49px;
  }

  .order {
    position: absolute;
    top: 1090px;
    left: 1028px;
    display: inline-block;
    width: 115px;
    height: 37px;
  }

  .material-symbolsshopping-cart-icon {
    position: absolute;
    top: 27px;
    left: 1163px;
    width: 36px;
    height: 36px;
    overflow: hidden;
  }

  .pngwing-icon,
  .pngwing-icon1 {
    position: absolute;
    top: 564px;
    left: 527px;
    width: 400px;
    height: 209px;
    object-fit: cover;
  }

  .pngwing-icon1 {
    top: 338px;
    left: 150px;
    width: 333px;
    height: 452px;
  }

  .diet-child1 {
    position: absolute;
    top: 1218px;
    left: 141px;
    border-radius: 24px;
    background-color: var(--color-white);
    width: 1155px;
    height: 236px;
  }

  .client-information-address-container {
    position: absolute;
    top: 1240px;
    left: 165px;
    font-size: var(--font-size-15xl);
    color: var(--color-black);
    font-weight: bold;
    display: inline-block;
    width: 1037px;
    height: 226px;
  }

  .pngwing-icon2 {
    position: absolute;
    top: 417px;
    left: 922px;
    width: 381px;
    height: 318px;
    object-fit: cover;
  }

  .diet {
    position: relative;
    background-color: #1E1E1E;
    width: 100%;
    height: 1650px;
    overflow: hidden;
    text-align: left;
    font-size: var(--font-size-11xl);
    color: var(--color-white);
    font-family: var(--font-nasalization);
  }

  .order-button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 12px 24px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 13px;
    font-family: Nasalization;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 12px;
  }

  .order-button:hover {
    background-color: #3e8e41;
  }

  .form-group input[type="text"] {
    border: 3px solid #3E3E3E;
    border-radius: 8px;
    padding: 10px;
    margin-left: 50px;
    font-size: 13px;
    font-family: Nasalization;
    margin-bottom: 10px;
    width: 50%;
    left: 250px;
  }

  .form-group label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
  }

  .form-group {
    display: flex;
    flex-direction: row;
    align-items: center;
    margin-bottom: 10px;
  }

  .control-label {
    width: 110px;
    margin-right: 10px;
  }

  .form-control {
    padding: 5px;
    border-radius: 5px;
    width: 200px;
  }

  .submit-button-container {
    display: flex;
    justify-content: center;
  }

  .submit-button {
    position: absolute;
    background-color: #F93535;
    color: white;
    border: none;
    padding: 20px 40px;
    border-radius: 10px;
    bottom: 100px;
    left: 900px;
    font-size: 24px;
    font-family: Nasalization;
    cursor: pointer;
  }

  .submit-button:hover {
    background-color: #356CF9;
  }
</style>

</html>