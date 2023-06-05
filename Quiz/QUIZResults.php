<?php
session_start();
require_once "../db.php";
$choice = $_SESSION["choice"];
$sql = "SELECT workout_name FROM workout_plan WHERE workout_id = '$choice'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$workout_name = $row["workout_name"];
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./global.css" />
  <link rel="stylesheet" href="./QUIZResults.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open Sans:wght@400;600;800&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Google Sans:wght@400;500&display=swap" />

</head>

<body>
  <div class="quiz-question1">
    <img class="red-lines-icon" alt="" src="./public/red-lines.svg" /><img class="red-lines-icon1" alt="" src="./public/red-lines.svg" /><img class="vector-icon" alt="" src="./public/vector-2.svg" /><img class="quiz-question-child2" alt="" src="./public/vector-3.svg" /><img class="quiz-question-child3" alt="" src="./public/vector-4.svg" />
    <div class="your-results-are">Your results are in !</div>
    <div class="based-on-your-container">
      <span>Based on your answers, </span><span class="name-of-the"> <?php echo $workout_name ?> </span><span>is the right fit for your body type and goals. Use it to build lean
        muscle, take your gains to the next level, and finally create the body
        of your dreams.</span>
    </div>
    <?php
    if (isset($_SESSION["user_id"])) { ?>
      <a href="../NewHome/newHome.php">
        <div class="quiz-question-child4"></div>
        <div class="let-s-start">
          Let‘s Start Now!
        </div>
  </div>
  </a>

<?php
      $user_id = $_SESSION["user_id"];
      $sql = "INSERT INTO assigned (user_id, workout_id, diet_id) VALUES (?,?,?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('iii', $user_id, $choice, $choice);
      $stmt->execute();
      $currentDate = date("Y-m-d");
      //extract weight from user_signup table and insert into progress table
      $sql = "SELECT weight FROM user_signup WHERE user_id = '$user_id'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $weight = $row["weight"];
      $sql = "INSERT INTO `progress`(`weight`, `update_date`, `workout_id`, `diet_id`, `user_id`) VALUES ('$weight','$currentDate','$choice','$choice','$user_id')";
      mysqli_query($conn, $sql);
      //update the gender of the user
      $sql = "UPDATE user_signup SET gender = '" . $_SESSION['gender'] . "' WHERE user_id = '" . $user_id . "'";
      mysqli_query($conn, $sql);
    } else { ?>
  <a href="../Login/signup.php">
    <div class="quiz-question-child4"></div>
    <div class="let-s-start">
      Let‘s Start Now!
    </div>
    </div>
  </a>
<?php
    }
?>
</body>

</html>