<?php
session_start();
require_once "../db.php";
$user_id = $_SESSION["user_id"];
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
    <div class="your-results-are">Monthly Progress Checker!</div>
    <div class="based-on-your-container">
      <span>A month passed from your last progress check test, fill the form again to continue your workout journey, taking it to the next level</span>
    </div>

    <a href="./second.php">
      <div class="quiz-question-child4"></div>
      <div class="let-s-start">
        Fill The Form!
      </div>
  </div>
  </a>
</body>

</html>