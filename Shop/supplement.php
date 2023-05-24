<?php
session_start();
$user_id = $_SESSION["user_id"] ?? 1;
require_once "../db.php";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="global.css" />
  <link rel="stylesheet" href="supplement.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nasalization:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=font:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Damion:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Habibi:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Google Sans:wght@400;500&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open Sans:wght@400;600&display=swap" />

  <style>
    @font-face {
      font-family: "Nasalization";
      src: url("fonts/nasalization-rg.otf");
      font-weight: 400;
    }

    @font-face {
      font-family: "font";
      src: url("fonts/nasalization-rg.otf");
      font-weight: 400;
    }
  </style>
</head>

<body>

  <div class="diet">
    <div class="diet-child"></div>
    <div class="diet-item"></div>
    <div class="diet-inner"></div>
    <div class="rectangle-div"></div>
    <div class="diet-child1"></div>
    <div class="diet-child2"></div>
    <div class="diet-child3"></div>
    <div class="diet-child4"></div>
    <div class="diet-childbl"></div>
    <div class="diet-childbr"></div>
    <div class="diet-child5"></div>
    <div class="logo">
      <img class="frame-icon" alt="" src="./public/frame.svg" />
      <div class="arms">4-ARMS</div>
    </div>
    <div class="login-button">
      <div class="profile">Profile</div>
    </div>
    <div class="nav-bar">
      <div class="nav-bar1">
        <style>
          a {
            text-decoration: none;
            color: #ff182c !important;
          }
        </style>
        <div class="home"><a href="../NewHome/newHome.php">home</a></div>
        <div class="nav-bar-child"></div>
        <div class="workout" id="workoutText"><a href="../workout/workout.php">Workout</a></div>
        <div class="diet1"><a href="../diet/diet.php">Diet</a></div>
        <div class="supplement"><a href="../Shop/supplement.php">Shop</a></div>
      </div>
    </div>
    <div class="diet-child6"></div>
    <img class="x38-1-icon" alt="" src="./public/Rope.png" />
    <div class="diet-child7"></div>
    <div class="our-supplements-and">Our supplements and equipements :</div>
    <div class="protein-shake">Whey Protein</div>
    <div class="protein-shake1">Rope </div>
    <div class="protein-shake2">Dumbbells</div>
    <div class="protein-shake3">All-in-one Bar</div>
    <div class="protein-shake4">C4 Pre Workout</div>
    <div class="protein-shake5">Creatine</div>
    <div class="diet-child8"></div>
    <div class="diet-child9"></div>
    <div class="diet-child10"></div>
    <div class="diet-child11"></div>
    <div class="diet-child12"></div>
    <div class="diet-child13"> </div>
    <div class="buy"><a href="./Creatine/index.php" style="text-decoration: none; color: #ffffff !important; ">ORDER</a></div>
    <div class="buy1"><a href="./Creatine/index.php" style="text-decoration: none;  color: #ffffff !important;">ORDER</a></div>
    <div class="buy2"><a href="./Creatine/index.php" style="text-decoration: none;  color: #ffffff !important;">ORDER</a></div>
    <div class="buy3"><a href="./Creatine/index.php" style="text-decoration: none;  color: #ffffff !important;">ORDER</a></div>
    <div class="buy4"><a href="./Creatine/index.php" style="text-decoration: none;  color: #ffffff !important;">ORDER</a></div>
    <div class="buy5"><a href="./Creatine/index.php" style="text-decoration: none;  color: #ffffff !important;">ORDER</a> </div>

    <img class="diet-child14" alt="" src="./public/whey.png" /><img class="diet-child15" alt="" src="./public/c4-pre-workout.png" /><img class="group-icon" alt="" src="./public/Creatine.png" /><img class="x38-1-icon1" alt="" src="./public/Dumbbells.png" /><img class="x38-1-icon2" alt="" src="./public/All-in-one Bar.png" />
    <div class="da">13000 DA</div>
    <div class="da1">6000 DA</div>
    <div class="da2">5950 DA</div>
    <div class="da3">2000 DA</div>
    <div class="da4">15000 DA</div>
    <div class="da5">7000 DA</div>
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
        <a href="./workout.php" style="color:black !important">My progress</a>
      </div>
      <div class="my-diet">
        <a href="../diet/diet.php" style="color:black !important">My diet</a>
      </div>
      <div class="log-out">
        <a href="../logout.php" style="color:black">Log out</a>
      </div>
      <div class="my-supplements">
            <a href="./bascket.php" style="color:black !important">My Orders</a>
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