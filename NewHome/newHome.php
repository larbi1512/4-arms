<?php
session_start();
require_once "../db.php";
$user_id = $_SESSION["user_id"];
$sql_workout = "SELECT * FROM progress WHERE user_id = $user_id order by update_date desc limit 1";
$result = $conn->query($sql_workout);
$row = $result->fetch_assoc();
$currentDate = date("Y-m-d");
$targetDate = date("Y-m-d", strtotime($row['update_date'] . " +30 days"));
if ($currentDate >= $targetDate) {
  header("Location: ../monthly/first.php");
  exit();
}

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
      <style>
        .nav-bar a {
          text-decoration: none;
          color: #ff182c !important;
        }
      </style>
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
          <img src="<?php echo $user_img ?>" style="height:25%;width:17%; border-radius:15%;margin-right:20%;margin-left:10%;margin-top:4%" />
        </div>
        <div class="larbi-saidchikh" style="margin-top:6%">
          <?php echo $user_name ?>
        </div>
        <div class="larbisckgmailcom">
          <?php echo $user_email ?>
        </div>
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
          <a href="../Shop/bascket.php" style="color:black !important">My Orders</a>
        </div>
      </div>
    </div>


    <div class="be-strong-be">Be strong Be fit</div>
    <div class="make-yourself-stronger-container">
      <p class="make-yourself-stronger">Make yourself stronger</p>
      <p class="make-yourself-stronger">than your excuses</p>
    </div>



    <div class="container">
      <div class="box" style=" --clr: #db3846;">
      <?php
      $sql_workout = "SELECT * FROM assigned inner join workout_plan on workout_plan.workout_id = assigned.workout_id WHERE user_id = $user_id LIMIT 1";
      $result = $conn->query($sql_workout);
      $row = $result->fetch_assoc();
      ?>
      <div class="content">
        <div class="image"><img src="../workout/<?php echo $row['workout_img_link'] ?>" alt="work" onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0.7" style="width: 100%; height: 100%; border-radius: 10px" /></div>      
        <div class="details">
          <h3>Workout</h3>
          <p>Check your progress</p>
          <a href="../workout/workout.php">Go</a>
          </div>
          </div>
      </div>
      <div class="box" style=" --clr: #82b63f;">
      <?php
      $sql = "SELECT * FROM assigned WHERE user_id = $user_id";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $diet_id = $row['diet_id'];
      $sql = "SELECT * FROM diet WHERE diet_id = $diet_id";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      ?>
      <div class="content">
        <div class="image"> <img src="../diet/<?php echo $row['diet_link_img'] ?>" onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0.7"
          alt="Diet" style="width: 100%; border-radius: 10px" /></div>
        <div class="details">
          <h3>Diet</h3>
          <p>Do not forget ur diet</p>
          <a href="../diet/diet.php">Go</a>
          </div>
          </div>
      </div>
      <div class="box" style=" --clr: #79d7ff;">
      <div class="content">
        <div class="image"><img src=" " onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0.7"
          alt="Shop" style="width: 100%; border-radius: 10px" /></div>
        <div class="details">
          <h3>Shop</h3>
          <p>Check the latest supplements</p>
          <a href="../Shop/supplement.php">Go</a>
          </div>
          </div>
      </div>
    </div>
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