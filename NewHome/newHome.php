<?php
session_start();
require_once "../db.php";
$user_id = $_SESSION["user_id"]?? 1;
?>

<!DOCTYPE html>
<html>

<head>
  <title>Home</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./global.css" />
  <link rel="stylesheet" href="./newHome.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open Sans:wght@400;600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Google Sans:wght@400;500&display=swap" />


</head>

<body>
  <div class="home-page">
    <img class="white-lines" alt="" src="./public/white-lines.svg" />
    <img class="skipping-rope-bro-1" alt="" src="./public/skipping-ropebro-1.svg" />
    <div class="logo">
      <img class="frame-icon" alt="" src="./public/frame.svg" />
      <div class="arms">4-ARMS</div>
    </div>
    <div class="nav-bar">
      <div class="arms"><a href="./newHome.php">Home</a></div>
      <div class="arms"><a href="../workout/workout.php">Workout</a></div>
      <div class="arms"><a href="../diet/diet.php">Diet</a></div>
      <div class="arms"><a href="../Shop/supplement.php">Supplement</a></div>
      <button class="login-button" id="profile">
        <div class="profile1">Profile</div>
      </button>
    </div>

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
              <img src="<?php echo $user_img ?>"
                style="height:25%;width:17%; border-radius:15%;margin-right:20%;margin-left:10%;margin-top:4%" />
            </div>
            <div class="larbi-saidchikh" style="margin-top:6%">
              <?php echo $user_name ?>
            </div>
            <div class="larbisckgmailcom">
              <?php echo $user_email ?>
            </div>
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
              <a href="../Shop/supplement.php" style="color:black !important">My supplements</a>
            </div>
          </div>
        </div>


    <div class="be-strong-be">Be strong Be fit</div>
    <div class="make-yourself-stronger-container">
      <p class="make-yourself-stronger">Make yourself stronger</p>
      <p class="make-yourself-stronger">than your excuses</p>
    </div>



    <a href="../workout/workout.php" style="display: block; width: 100%; height: 100%">
      <div class="card">
        <?php
        $sql_workout = "SELECT * FROM assigned inner join workout_plan on workout_plan.workout_id = assigned.workout_id WHERE user_id = $user_id LIMIT 1";
        $result = $conn->query($sql_workout);
        $row = $result->fetch_assoc();
        ?>
        <img src="<?php echo $row['workout_img_link'] ?>" alt="" style="width: 100%; border-radius: 10px" />
        <div class="container">
          <h4><b><?php echo $row['workout_name'] ?></b></h4>
          <p>check your workout progress</p>
        </div>
      </div>
    </a>

    <a href="../diet/diet.php" style="display: block; width: 100%; height: 100%">
      <div class="cardyuh">
        <?php
        $sql = "SELECT * FROM assigned WHERE user_id = $user_id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $diet_id = $row['diet_id'];
        $sql = "SELECT * FROM diet WHERE diet_id = $diet_id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        ?>
        <img src="<?php echo $row['diet_link_img'] ?>" onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0.7" alt="Diet" style="width: 100%; border-radius: 10px" />
        <div class="container">
          <h4><b>Be healthy</b></h4>
          <p>Do not forget ur diet</p>
        </div>
      </div>
    </a>

    <a href="../Shop/supplement.php" style="display: block; width: 100%; height: 100%">
      <div class="cardib">

        <img src="" alt="" style="width: 100%; border-radius: 10px" />
        <div class="container">
          <h4><b>
              our shop
            </b></h4>
          <p>check the latest supplements</p>
        </div>
      </div>
    </a>
    <img class="white-lines" alt="" src="./public/white-lines.svg" />

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
          popupStyle.zIndex = 999;
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