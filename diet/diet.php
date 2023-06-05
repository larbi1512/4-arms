<?php
session_start();
require_once "../db.php";
$user_id = $_SESSION["user_id"];
$sql = "SELECT * FROM assigned WHERE user_id = $user_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$diet_id = $row['diet_id'];
$sql = "SELECT * FROM diet WHERE diet_id = $diet_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$carbs_consumed = $_SESSION['carbs_consumed'] ?? 0;
$calories_consumed = $_SESSION['calories_consumed'] ?? 0;
$proteins_consumed = $_SESSION['proteins_consumed'] ?? 0;

// initialize the remaining variables
$carbs_remaining = max($row['carbs'] - $carbs_consumed, 0);
$calories_remaining = max($row['Calories'] - $calories_consumed, 0);
$proteins_remaining = max($row['Proteins'] - $proteins_consumed, 0);

// check if the form was submitted:
if (isset($_POST['carbs_consumed']) && isset($_POST['calories_consumed']) && isset($_POST['proteins_consumed'])) {
  $newcarbs_consumed = (int) $_POST['carbs_consumed'];
  $newcalories_consumed = (int) $_POST['calories_consumed'];
  $newproteins_consumed = (int) $_POST['proteins_consumed'];

  // Validate input for negative numbers
  if ($newcarbs_consumed < 0 || $newcalories_consumed < 0 || $newproteins_consumed < 0) {
    $error_message = "Please enter positive values.";
  } else {
    $carbs_consumed += $newcarbs_consumed;
    $calories_consumed += $newcalories_consumed;
    $proteins_consumed += $newproteins_consumed;

    // Ensure the consumed values do not exceed the actual values
    $carbs_consumed = min($carbs_consumed, $row['carbs']);
    $calories_consumed = min($calories_consumed, $row['Calories']);
    $proteins_consumed = min($proteins_consumed, $row['Proteins']);

    // store the updated consumed variables in the session
    $_SESSION['carbs_consumed'] = $carbs_consumed;
    $_SESSION['calories_consumed'] = $calories_consumed;
    $_SESSION['proteins_consumed'] = $proteins_consumed;

    $carbs_remaining = max($row['carbs'] - $carbs_consumed, 0);
    $calories_remaining = max($row['Calories'] - $calories_consumed, 0);
    $proteins_remaining = max($row['Proteins'] - $proteins_consumed, 0);
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="global.css" />
  <link rel="stylesheet" href="diet.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nasalization:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open Sans:wght@400;600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Google Sans:wght@400;500&display=swap" />
</head>

<body>
  <div class="diet">
    <div class="diet-child"></div>
    <div class="logo">
      <img class="frame-icon" alt="" src="./public/frame.svg" />
      <div class="arms">4-ARMS</div>
    </div>

    <div class="nav-bar sticky-nav">
      <div class="nav-bar1">
        <a class="home" id="home" href="../NewHome/newHome.php">Home</a>
        <a class="workout" id="workout" href="../workout/workout.php">Workout</a>
        <a class="diet1" href="./diet.php">Diet</a><a class="supplement" href="../Shop/supplement.php">Supplement</a>
      </div>
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
          <img class="profile-item" alt="" src="./public/ellipse-800.svg" />
          <img src="<?php echo $user_img ?>" style="height:25%;width:17%; border-radius:15%;margin-right:20%;margin-left:10%;margin-top:4%" />
        </div>
        <div class="larbi-saidchikh" style="margin-top:6%">
          <?php echo $user_name ?>
        </div>
        <div class="larbisckgmailcom" style="margin-top:2%">
          <?php echo $user_email ?>
        </div>
        <div class="my-progress">
          <a href="../workout/workout.php" style="color:black !important">My progress</a>
        </div>
        <div class="my-diet">
          <a href="./diet.php" style="color:black !important">My diet</a>
        </div>
        <div class="log-out">
          <a href="../logout.php" style="color:black">Log out</a>
        </div>
        <div class="my-supplements">
          <a href="../Shop/supplement.php" style="color:black !important">My supplements</a>
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




    <h1 class=" top">Your daily nutrition:</h1>

    <p class="text">Eat healthy while having fun :3 </p>

      <form method="post" action="" class="form-container">
            <?php if (isset($error_message)) { ?>
              <p style="color: #e8e7e2;  text-align: center; margin-left: 10%;">
                <?php echo $error_message; ?>
              </p>
            <?php } ?>
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
            <td><input type="number" name="carbs_consumed" value="0" required></td>
            <td><span class="remaining">

                <?php echo $carbs_remaining ?>
              </span></td>
          </tr>
          <tr>
            <td>Calories</td>
            <td><?php echo $row['Calories'] ?></td>
            <td><input type="number" name="calories_consumed" value="0" required></td>
            <td><span class="remaining">
                <?php echo $calories_remaining ?>
              </span></td>
          </tr>
          <tr>
            <td>Proteins</td>
            <td><?php echo $row['Proteins'] ?></td>
            <td><input type="number" name="proteins_consumed" value="0" required></td>
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
        <p style="font-size:70%">
          <?php echo $row['description'] ?>
        </p>
        <a href="<?php echo $row['diet_link'] ?>">Learn More</a>
      </div>
    </div>
  </div>
    <script>
    // Function to update the remaining values dynamically
    function updateRemainingValues() {
      var carbsConsumed = parseInt(document.querySelector('input[name="carbs_consumed"]').value);
      var caloriesConsumed = parseInt(document.querySelector('input[name="calories_consumed"]').value);
      var proteinsConsumed = parseInt(document.querySelector('input[name="proteins_consumed"]').value);
      var carbsRemaining = <?php echo $row['carbs'] ?> - (carbsConsumed + <?php echo $carbs_consumed ?>);
        var caloriesRemaining = <?php echo $row['Calories'] ?> - (caloriesConsumed + <?php echo $calories_consumed ?>);
        var proteinsRemaining = <?php echo $row['Proteins'] ?> - (proteinsConsumed + <?php echo $proteins_consumed ?>);

        // Update the remaining values in the HTML
        document.getElementById('carbs_remaining').textContent = carbsRemaining;
        document.getElementById('calories_remaining').textContent = caloriesRemaining;
        document.getElementById('proteins_remaining').textContent = proteinsRemaining;
      }

      // Add an event listener to the form submission
      document.getElementById('myForm').addEventListener('submit', function (e) {
        e.preventDefault();

        // Perform AJAX request to submit the form data
        var formData = new FormData(this);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'your_php_script.php', true);
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
          s
            updateRemainingValues();
          }
        };
        xhr.send(formData);
      });

      // Update the remaining values on page load
      updateRemainingValues();
    </script>

  <div id="goto" class="popup-overlay" style="display: none">
    <div class="gotopopup">
      <div class="my-overview">
        <a href="#act" style="color:black">My OverView</a>
      </div>
      <div class="my_workout_plan">
        <a href="#plan" style="color:black">My WorkOut Plan</a>
      </div>
      <div class="my-gym_sapce">
        <a href="#gym" style="color:black">The Gym Space</a>
      </div>
    </div>
  </div>


  <script>
    var loginButton = document.getElementById("go");
    if (loginButton) {
      loginButton.addEventListener("click", function() {
        var popup = document.getElementById("goto");
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