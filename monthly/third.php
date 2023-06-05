<?php
session_start();
require_once "../db.php";
$user_id = $_SESSION["user_id"];
$weight = trim($_POST["weight"]);
$goal = $_POST["goal"];
 
// Validate and sanitize the data (optional)
$weight = filter_var($weight, FILTER_SANITIZE_NUMBER_FLOAT);
$goal = htmlspecialchars($goal, ENT_QUOTES, 'UTF-8');
$currentDate = date("Y-m-d");
$sql = "INSERT INTO `progress`(`weight`, `update_date`, `workout_id`, `diet_id`, `user_id`) VALUES ('$weight','$currentDate','$goal','$goal','$user_id')";
$set = "UPDATE `assigned` SET `workout_id` = '$goal',`diet_id`= '$goal' WHERE `user_id` = '$user_id'";

if (mysqli_query($conn, $sql) && mysqli_query($conn, $set)) {
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$sql_workout = "SELECT * FROM assigned inner join workout_plan on workout_plan.workout_id = assigned.workout_id WHERE user_id = $user_id";
$result = $conn->query($sql_workout);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="global.css" />
  <link rel="stylesheet" href="next.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open Sans:wght@400;600;800&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Google Sans:wght@400;500&display=swap" />
</head>

<body>
  <div class="quiz-question1">
    <img class="red-lines-icon3" alt="" src="./public/red-lines3.svg" /><img class="red-lines-icon4" alt="" src="./public/red-lines4.svg" /><img class="red-lines-icon5" alt="" src="./public/red-lines4.svg" /><img class="vector-icon" alt="" src="./public/vector-2.svg" /><img class="quiz-question-child2" alt="" src="./public/vector-3.svg" /><img class="quiz-question-child3" alt="" src="./public/vector-4.svg" />
    <div class="your-results-are">Your results are in !</div>
    <div class="based-on-your-container">
      <span>Your new journey will start now, up to your progress we changed your workout plan to,</span><span class="name-of-the"> <?php echo $row['workout_name'] ?> </span><span>, together creating the body
        of your dreams.</span>
    </div>

    <a href="../NewHome/newHome.php">
      <div class="quiz-question-child4"></div>
      <div class="let-s-start">
        Continue thriving!
      </div>
  </div>
  </a>
</body>

</html>