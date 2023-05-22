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
  <div class="quiz-question1">
    <img class="red-lines-icon3" alt="" src="./public/red-lines3.svg" /><img class="red-lines-icon4" alt="" src="./public/red-lines4.svg" /><img class="red-lines-icon5" alt="" src="./public/red-lines4.svg" /><img class="vector-icon" alt="" src="./public/vector-2.svg" /><img class="quiz-question-child2" alt="" src="./public/vector-3.svg" /><img class="quiz-question-child3" alt="" src="./public/vector-4.svg" />
    <div class="your-results-are">Your results are in !</div>
    <div class="based-on-your-container">
      <span>Based on your answers, </span><span class="name-of-the"> <?php echo $workout_name ?> </span><span>is the right fit for your body type and goals. Use it to build lean
        muscle, take your gains to the next level, and finally create the body
        of your dreams.</span>
    </div>

    <a href="../signup_login/signup.php">
      <div class="quiz-question-child4"></div>
      <style>
        a {
          text-decoration: none;
          color: white !important;
        }
      </style>
      <div class="let-s-start">
        Let‘s Start Now!
      </div>
  </div>
  </a>
</body>

</html>