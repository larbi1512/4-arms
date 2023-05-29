<?php
session_start();
include_once "../db.php";
$user_id = $_SESSION["user_id"];
//query to fetch all products in an array to be used in the foreach loop
$products = $conn->query("select * from product");
require_once "../db.php";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nasalization:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=font:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Damion:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Habibi:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Google Sans:wght@400;500&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open Sans:wght@400;600&display=swap" />
  <!-- include latest bootstrap and javascrip libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <link rel="stylesheet" href="global.css" />
  <link rel="stylesheet" href="supplement.css" />
</head>

<body>
  <div class="body">
    <section class="banner">
      <div class="diet-child">
        <div class="logo">
          <img class="frame-icon" alt="" src="public/frame.svg" />
          <div class="arms">4-ARMS</div>
        </div>

        <div class="nav-bar sticky-nav">

          <a class="diet1" href="../diet/diet.php">Diet</a><a class="supplement" href="../Shop/supplement.php">Supplement</a>
          <a class="home" id="home" href="../NewHome/newHome.php">Home</a>
          <a class="workout" id="workout" href="../workout/workout.php">Workout</a>
        </div>
        <button class="login-button" id="profile">
          <div class="profile1">Profile</div>
        </button>
      </div>
      <div class="our-supplements-and">Our supplements and equipements :</div>
    </section>



    <div class="container">
      <div class="row">
        <?php
        $i = 0;
        while ($product = $products->fetch_assoc()) {
        ?>
          <div class="col-md-4">
            <div class="card">
              <div class="white-card">
                <img class="product-picture" alt="" src="<?php echo $product['png_link']; ?>" />
              </div>
              <div class="product-name"> <?php echo $product['product_name']; ?> </div>
              <div class="flex">
                <div class="price"><?php echo $product['price']; ?> Da</div>
                <div class="order-button">
                  <a href="order.php?id=<?php echo $product['product_id']; ?>" style="text-decoration: none; color: #ffffff !important;">ORDER</a>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>




  <button class="login-button" id="profile">
    <div class="profile1">Profile</div>
  </button>
  <div id="pROFILEContainer" class="popup-overlay" style="display: none">
    <div class="profile">
      <?php
      $query = $conn->query(
        "select * from user_signup where user_id=$user_id"
      );
      foreach ($query as $data) {
        $user_name = $data['user_name'];
        $user_email = $data['user_email'];
        $user_img = $data['user_img'];
      }
      ?>
      <div class="profile-child">
        <img src="<?php echo $user_img ?>" style="height:25%;width:17%; border-radius:15%;margin-right:20%;margin-left:10%;margin-top:4%" />
      </div>
      <div class="larbi-saidchikh" style="margin-top:6%">
        <?php echo $user_name ?>
      </div>
      <div class="larbisckgmailcom"><?php echo $user_email ?></div>
      <div class="my-progress">
        <a href="../workout/workout.php" style="color:black !important">My progress</a>
      </div>
      <div class="my-diet">
        <a href="../diet/diet.php" style="color:black !important">My diet</a>
      </div>
      <div class="log-out">
        <a href="../logout.php" style="color:black">Log out</a>
      </div>
      <div class="my-supplements">
        <a href="bascket.php" style="color:black !important">My Orders</a>
      </div>
    </div>
  </div>




  <script>
    var loginButton = document.getElementById("profile");
    if (loginButton) {
      loginButton.addEventListener("click", function() {
        var popup = document.getElementById("pROFILEContainer");
        if (!popup) return;
        var popupStyle = popup.style;
        if (popupStyle) {
          popupStyle.display = "flex";
          popupStyle.zIndex = 100;
          popupStyle.backgroundColor = "rgba(113, 113, 113, 0.3)";
          popupStyle.alignItems = "center";
          popupStyle.justifyContent = "center";
        }
        popup.setAttribute("closable", "");

        var onClick =
          popup.onClick ||
          function(e) {
            if (e.target === popup && popup.hasAttribute("closable")) {
              popupStyle.display = "none";
            }
          };
        popup.addEventListener("click", onClick);
      });
    }
  </script>
</body>

</html>