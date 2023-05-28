<?php
session_start();
if (isset($_GET["gender"])) {
  $_SESSION["gender"] = $_GET["gender"];
  header("location: QUIZQuestion2.html");
  exit();
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./global.css" />
  <link rel="stylesheet" href="./Quizindex.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open Sans:wght@400;600;800&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Google Sans:wght@400;500&display=swap" />

</head>

<body>
  <div class="quiz-question">
    <img class="icon-park-outlinemuscle" alt="" src="./public/iconparkoutlinemuscle.svg" /><img class="octicongoal-16" alt="" src="./public/octicongoal16.svg" /><img class="material-symbolsavg-time-outl-icon" alt="" src="./public/materialsymbolsavgtimeoutlinesharp.svg" />
    <div class="gender">GENDER</div>
    <div class="age">AGE</div>
    <div class="goal">GOAL</div>
    <div class="experience">EXPERIENCE</div>
    <img class="jamtransgender-icon" alt="" src="./public/jamtransgender.svg" /><img class="quiz-question-child" alt="" src="./public/rectangle-15.svg" /><img class="quiz-question-item" alt="" src="./public/rectangle-16.svg" /><img class="quiz-question-inner" alt="" src="./public/rectangle-16.svg" /><img class="rectangle-icon" alt="" src="./public/rectangle-16.svg" />
    <div class="are-you">Are you ?</div>
    <a href="QUIZQuestion1.php?gender=male">
      <div class="rectangle-div" id="rectangle4">
      </div>
      <div class="male">Male</div>
    </a>
    <a href="QUIZQuestion1.php?gender=female">
      <div class="quiz-question-child1" id="rectangle5"></div>
      <div class="female">Female</div>
    </a>
    <img class="red-lines-icon" alt="" src="./public/red-lines.svg" /><img class="red-lines-icon1" alt="" src="./public/red-lines1.svg" /><img class="red-lines-icon2" alt="" src="./public/red-lines2.svg" />
  </div>

  <script>
    var rectangle4 = document.getElementById("rectangle4");
    if (rectangle4) {
      rectangle4.addEventListener("click", function(e) {
        window.location.href = "./QUIZQuestion2.html";
      });
    }

    var rectangle5 = document.getElementById("rectangle5");
    if (rectangle5) {
      rectangle5.addEventListener("click", function(e) {
        window.location.href = "./QUIZQuestion2.html";
      });
    }
  </script>
</body>

</html>