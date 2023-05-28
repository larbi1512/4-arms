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

  </style>
</head>

<body>
  <style>
    .diet-child,
    .diet-inner,
    .diet-item,
    .rectangle-div {
      position: absolute;
      top: 849px;
      left: 523px;
      border-radius: var(--br-11xl);
      background-color: #2B2B2E;
      box-shadow: 7px 6px 11px 2px rgba(43, 43, 46, 0.75);
      width: 412px;
      height: 563px;
    }

    .diet-inner,
    .diet-item,
    .rectangle-div {
      top: 239px;
      left: 993px;
    }

    .diet-inner,
    .rectangle-div {
      left: 523px;
    }

    .rectangle-div {
      left: 53px;
    }

    .diet-child1,
    .diet-child2,
    .diet-child3,
    .diet-child4,
    .diet-child6,
    .diet-childbl,
    .diet-childbr,
    .diet-child7 {
      position: absolute;
      top: 262px;
      left: 77px;
      border-radius: var(--br-xl);
      background-color: var(--color-white);
      width: 361px;
      height: 366px;
    }

    .diet-child2,
    .diet-child3,
    .diet-child4 {
      top: 264px;
      left: 547px;
    }

    .diet-child3,
    .diet-child4 {
      top: 870px;
      left: 545px;
    }

    .diet-child4 {
      top: 264px;
      left: 1017px;
    }

    .diet-child5,
    .frame-icon {
      position: absolute;
      top: 0;
      left: 0;
    }

    .diet-child5 {
      background-color: #1E1E1E;
      width: 1440px;
      height: 95px;
    }

    .diet-childbr {
      position: absolute;
      top: 870px;
      left: 77px;
      border-radius: var(--br-xl);
      background-color: var(--color-white);
      width: 361px;
      height: 366px;
      z-index: 999;
    }

    .diet-childbl {
      position: absolute;
      top: 870px;
      left: 1020px;
      border-radius: var(--br-xl);
      background-color: var(--color-white);
      width: 361px;
      height: 366px;
      z-index: 9;
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
      font-size: var(--font-size-9xl);
    }

    .profile {
      position: relative;
    }

    .login-button {
      position: absolute;
      top: 20px;
      left: 1220px;
      border-radius: var(--br-xl);
      background-color: var(--color-gainsboro-200);
      width: 200px;
      height: 51px;
      display: flex;
      flex-direction: row;
      padding: var(--padding-4xs) var(--padding-21xl);
      box-sizing: border-box;
      align-items: center;
      justify-content: center;
      font-size: var(--font-size-xl);
      color: var(--sexy-rouge);
    }

    .home {
      position: absolute;
      top: calc(50% - 19px);
      left: calc(50% - 311.5px);
    }

    .workout {
      position: absolute;
      top: calc(50% - 19px);
      left: calc(50% - 176.5px);
      cursor: pointer;
    }

    .diet1,
    .nav-bar,
    .nav-bar1,
    .supplement {
      position: absolute;
      top: calc(50% - 19px);
      left: calc(50% + 3.5px);
    }

    .nav-bar,
    .nav-bar1,
    .supplement {
      left: calc(50% + 105.5px);
    }

    .nav-bar,
    .nav-bar1 {
      left: calc(50% - 311.5px);
      width: 623px;
      height: 38px;
    }

    .nav-bar {
      top: calc(50% - 792px);
      left: calc(50% - 339px);
      color: var(--sexy-rouge);
    }

    .diet-child6 {
      position: absolute;
      top: 849px;
      left: 59px;
      border-radius: var(--br-11xl);
      background-color: #2B2B2E;
      box-shadow: 7px 6px 11px 2px rgba(43, 43, 46, 0.75);
      width: 412px;
      height: 563px;
    }

    .x38-1-icon {
      position: absolute;
      height: 17.01%;
      width: 13.41%;
      top: 55.94%;
      right: 74.86%;
      bottom: 27.05%;
      left: 10.74%;
      max-width: 100%;
      overflow: hidden;
      max-height: 100%;
      z-index: 1000;
    }

    .diet-child7 {
      position: absolute;
      top: 849px;
      left: 999px;
      border-radius: var(--br-11xl);
      background-color: #2B2B2E;
      box-shadow: 7px 6px 11px 2px rgba(43, 43, 46, 0.75);
      width: 412px;
      height: 563px;
    }

    .our-supplements-and {
      position: absolute;
      top: 156px;
      left: 57px;
      color: #D9D9D9;
    }

    .protein-shake,
    .protein-shake1 {
      position: absolute;
      top: 636px;
      left: 141px;
      color: #D9D9D9;
    }

    .protein-shake1 {
      top: 1242px;
      left: 165px;
    }

    .protein-shake2,
    .protein-shake3,
    .protein-shake4,
    .protein-shake5 {
      position: absolute;
      top: 1247px;
      left: 650px;
      color: #D9D9D9;
    }

    .protein-shake3,
    .protein-shake4,
    .protein-shake5 {
      top: 1240px;
      left: 1100px;
    }

    .protein-shake4,
    .protein-shake5 {
      top: 636px;
      left: 605px;
    }

    .protein-shake5 {
      left: 1120px;
    }

    .diet-child10,
    .diet-child11,
    .diet-child12,
    .diet-child13,
    .diet-child8,
    .diet-child9 {
      position: absolute;
      top: 724px;
      left: 300px;
      border-radius: var(--br-xl);
      background-color: #F93535;
      width: 152px;
      height: 47px;
    }

    .diet-child10,
    .diet-child11,
    .diet-child12,
    .diet-child13,
    .diet-child9 {
      left: 759px;
    }

    .diet-child10,
    .diet-child11,
    .diet-child12,
    .diet-child13 {
      top: 728px;
      left: 1235px;
    }

    .diet-child11,
    .diet-child12,
    .diet-child13 {
      top: 1329px;
    }

    .diet-child12,
    .diet-child13 {
      left: 767px;
    }

    .diet-child13 {
      top: 1334px;
      left: 283px;
    }

    .buy,
    .buy1,
    .buy2 {
      position: absolute;
      top: 1340px;
      left: 300px;
    }

    .buy1,
    .buy2 {
      top: 1334px;
      left: 790px;
    }

    .buy2 {
      left: 1263px;
    }

    .buy3,
    .buy4,
    .buy5,
    .see-more- {
      position: absolute;
      top: 729px;
      left: 325px;
    }

    .buy4,
    .buy5,
    .see-more- {
      left: 787px;
    }

    .buy5,
    .diet-child14,
    .diet-child15 {
      position: absolute;
      top: 280px;
      left: 143px;
      width: 227px;
      height: 329.87px;
    }

    .diet-child15 {
      left: 621px;
    }

    .group-icon,
    .x38-1-icon1,
    .x38-1-icon2 {
      position: absolute;
      height: 19.99%;
      width: 15.76%;
      top: 16.85%;
      right: 8.96%;
      bottom: 63.16%;
      left: 71.28%;
      max-width: 100%;
      overflow: hidden;
      max-height: 100%;
    }

    .x38-1-icon1,
    .x38-1-icon2 {
      height: 17.01%;
      width: 13.41%;
      top: 55.82%;
      right: 42.7%;
      bottom: 27.17%;
      left: 40.89%;
    }

    .x38-1-icon2 {
      top: 55.94%;
      right: 11.58%;
      bottom: 27.05%;
      left: 73.01%;
      z-index: 10;
    }

    .da,
    .da1,
    .da2,
    .da3,
    .da4,
    .da5 {
      position: absolute;
      top: 730px;
      left: 87px;
      font-size: var(--font-size-13xl);
      font-family: var(--font-font);
      color: #D9D9D9;
    }

    .da1,
    .da2,
    .da3,
    .da4,
    .da5 {
      top: 724px;
      left: 546px;
    }

    .da2,
    .da3,
    .da4,
    .da5 {
      top: 726px;
      left: 1008px;
    }

    .da3,
    .da4,
    .da5 {
      top: 1330px;
      left: 1019px;
    }

    .da4,
    .da5 {
      top: 1335px;
      left: 555px;
    }

    .da5 {
      top: 1340px;
      left: 87px;
    }

    .diet {
      position: relative;
      background-color: #1E1E1E;
      width: 100%;
      height: 1650px;
      overflow: hidden;
      text-align: center;
      font-size: var(--font-size-11xl);
      color: var(--color-white);
      font-family: var(--font-nasalization);
    }

    .profile-child {
      margin-top: 17%;
      background-color: var(--color-gainsboro-200);
      width: 430px;
      height: 87%;
      border-radius: 7%;
    }

    .ls {
      position: absolute;
      top: 99px;
      left: 60px;
      font-size: var(--font-size-13xl);
    }

    .larbi-saidchikh {
      position: absolute;
      top: 16%;
      left: 27%;
    }

    .larbisckgmailcom {
      position: absolute;
      top: 27%;
      left: 27%;
      font-size: var(--font-size-xl);
      font-family: var(--font-damion);
      color: var(--grey-grey-800);
    }

    .my-progress {
      position: absolute;
      top: 50%;
      left: 10%;
    }

    .my-diet {
      position: absolute;
      top: 60%;
      left: 10%;
    }

    .my-supplements {
      position: absolute;
      top: 70%;
      left: 10%;
    }

    .log-out {
      position: absolute;
      top: 90%;
      left: 50%;
    }

    .profile {
      position: relative;
      border-radius: 20%;
      width: 511px;
      height: 733px;
      max-width: 90%;
      max-height: 90%;
      text-align: left;
      font-size: var(--font-size-5xl);
      color: var(--black-like-ur-heart);
      font-family: var(--font-nasalization);
    }
  </style>
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