<?php
// start the session
$user_id = 1;
// initialize the consumed variables from the session data, or to 0 if not set
$host = "sql209.epizy.com";
$dbuser = "epiz_34106685";
$dbpass = "f@7EbG#KFdr3tvH";
$dbname = "epiz_34106685_4ARMS";
// Create database connection
$conn = new mysqli($host, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM assigned WHERE user_id = $user_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$diet_id = $row['diet_id'];
$sql = "SELECT * FROM diet WHERE diet_id = $diet_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$conn->close();
$carbs_consumed = $_SESSION['carbs_consumed'] ?? 0;
$calories_consumed = $_SESSION['calories_consumed'] ?? 0;
$proteins_consumed = $_SESSION['proteins_consumed'] ?? 0;

// initialize the remaining variables
$carbs_remaining = $row['carbs'] - $carbs_consumed;
$calories_remaining = $row['Calories'] - $calories_consumed;
$proteins_remaining = $row['Proteins'] - $proteins_consumed;

// check if the form was submitted:
if (isset($_POST['carbs_consumed']) && isset($_POST['calories_consumed']) && isset($_POST['proteins_consumed'])) {
  $newcarbs_consumed = (int) $_POST['carbs_consumed'];
  $newcalories_consumed = (int) $_POST['calories_consumed'];
  $newproteins_consumed = (int) $_POST['proteins_consumed'];

  $carbs_consumed += $newcarbs_consumed;
  $calories_consumed += $newcalories_consumed;
  $proteins_consumed += $newproteins_consumed;

  // store the updated consumed variables in the session
  $_SESSION['carbs_consumed'] = $carbs_consumed;
  $_SESSION['calories_consumed'] = $calories_consumed;
  $_SESSION['proteins_consumed'] = $proteins_consumed;

  $carbs_remaining = $row['carbs'] - $carbs_consumed;
  $calories_remaining = $row['Calories'] - $calories_consumed;
  $proteins_remaining = $row['Proteins'] - $proteins_consumed;
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./global.css" />
  <link rel="stylesheet" href="diet.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nasalization:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open Sans:wght@400;600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Google Sans:wght@400;500&display=swap" />

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
    <div class="logo">
      <img class="frame-icon" alt="" src="./public/frame.svg" />
      <div class="arms">4-ARMS</div>
    </div>

    <div class="nav-bar">
      <div class="nav-bar1">
        <a class="home" id="home" href="../newHome.html">Home</a>
        <a class="workout" id="workout" href="../workout/workout.html">Workout</a>
        <a class="diet1" href="./diet.php">Diet</a><a class="supplement" href="../Shop/supplement.html">Supplement</a>
      </div>
    </div>


    <button class="login-button" id="profile">
      <div class="profile1">Profile</div>
    </button>


    <div id="pROFILEContainer" class="popup-overlay" style="display: none">
      <div class="profile">
        <div class="profile-child"></div>
        <img class="profile-item" alt="" src="./public/ellipse-800.svg" />
        <div class="ls">LS</div>
        <div class="larbi-saidchikh">Larbi SAIDCHIKH</div>
        <div class="larbisckgmailcom">larbisck@gmail.com</div>
        <div class="my-progress">my progress</div>
        <div class="my-diet">my diet</div>
        <div class="settings">Settings</div>
        <div class="log-out">Log out</div>
        <div class="my-supplements">my supplements</div>
      </div>
    </div>

    <h1 class=" top">Your daily nutrition:</h1>
    <p class="text">Eat healthy while having fun :3 </p>



    <!-- Add the remaining values to the HTML table -->
    <!-- Display the form with remaining values -->
    <form method="post" action="">
      <table>
        <thead>
          <tr>
            <th>Nutrient</th>
            <th>Needed</th>
            <th>Consumed</th>
            <th>Remaining</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Carbs</td>
            <td><?php echo $row['carbs'] ?></td>
            <td><input type="number" name="carbs_consumed" value="" required></td>
            <td><span class="remaining">
                <?php echo $carbs_remaining ?>
              </span></td>
          </tr>
          <tr>
            <td>Calories</td>
            <td><?php echo $row['Calories'] ?></td>
            <td><input type="number" name="calories_consumed" value="" required></td>
            <td><span class="remaining">
                <?php echo $calories_remaining ?>
              </span></td>
          </tr>
          <tr>
            <td>Proteins</td>
            <td><?php echo $row['Proteins'] ?></td>
            <td><input type="number" name="proteins_consumed" value="" required></td>
            <td><span class="remaining">
                <?php echo $proteins_remaining ?>
              </span></td>
          </tr>
        </tbody>
      </table>
      <input type="submit" value="Check Progress">
    </form>

    <div class="recommended-activities">Your diet </div>
    <div class="plan">
      <div class="plan-img">
        <a href="<?php echo $row['diet_link'] ?>">
          <img src="<?php echo $row['diet_link_img'] ?>" alt="" onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0.7">
        </a>
      </div>
      <div class="plan-description">
        <p style="font-size:36px">
          <?php echo $row['diet_name'] ?>
        </p>
        <a href="<?php echo $row['diet_link'] ?>">Learn More</a>
      </div>
    </div>
    <style>
      .recommended-activities {
        margin-top: 28%;
        margin-left: 10%;
        color: green;
      }

      .plan {
        position: absolute;
        display: flex;
        flex-direction: row;
        background-color: rgb(28, 86, 28);
        border-radius: 30px;
        width: 95%;
        padding: 20px;
        margin-top: 3%;
        z-index: 9999;
      }

      .plan-img {
        margin-right: 20px;
        top: 50%;
      }

      .plan-img img {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
        top: 50%;
      }

      .plan-description {
        display: flex;
        flex-direction: column;
        top: 50%;
      }

      .plan-description p {
        color: white;
        font-size: 18px;
        margin: 0 0 10px 0;
        top: 50%;
      }

      .plan-description a {
        color: #EEC643;
        font-size: 16px;
        text-decoration: none;
        margin-top: auto;

      }
    </style>
  </div>
  <script>
    var dietText = document.getElementById("dietText");
    if (dietText) {
      dietText.addEventListener("click", function(e) {
        window.location.href = "./diet1.html";
      });
    }

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

    var home = document.getElementById("home");
    if (home) {
      home.addEventListener("click", function(e) {
        // Please sync "4-arms" to the project
      });
    }

    var workout = document.getElementById("workout");
    if (workout) {
      workout.addEventListener("click", function(e) {
        // Please sync "Workout " to the project
      });
    }

    document.querySelector('form').addEventListener('submit', function() {
      var carbs_consumed = parseInt(document.querySelector('input[name="carbs_consumed"]').value);
      var calories_consumed = parseInt(document.querySelector('input[name="calories_consumed"]').value);
      var proteins_consumed = parseInt(document.querySelector('input[name="proteins_consumed"]').value);
      var carbs_consumed += carbs_consumed;
      var calories_consumed += calories_consumed;
      var proteins_consumed += proteins_consumed;
      var carbs_remaining = 100 - carbs_consumed;
      var calories_remaining = 2000 - calories_consumed;
      var proteins_remaining = 200 - proteins_consumed;

      document.querySelector('span.remaining:nth-of-type(1)').textContent = carbs_remaining;
      document.querySelector('span.remaining:nth-of-type(2)').textContent = calories_remaining;
      document.querySelector('span.remaining:nth-of-type(3)').textContent = proteins_remaining;
    });
  </script>
</body>

</html>