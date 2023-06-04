<?php
session_start();
if (isset($_GET["choice"])) {
  $_SESSION["choice"] = $_GET["choice"];
  header("location: QUIZQuestion4.html");
  exit();
}

?>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./global.css" />
  <link rel="stylesheet" href="./QUIZQuestion3.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open Sans:wght@400;600;800&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Google Sans:wght@400;500&display=swap" />

</head>

<body>
  <div class="quiz-question3">
    <img class="icon-park-outlinemuscle2" alt="" src="./public/iconparkoutlinemuscle.svg" /><img class="octicongoal-162" alt="" src="./public/octicongoal162.svg" /><img class="material-symbolsavg-time-outl-icon2" alt="" src="./public/materialsymbolsavgtimeoutlinesharp.svg" />
    <div class="gender2">GENDER</div>
    <div class="age2">AGE</div>
    <div class="goal2">GOAL</div>
    <div class="experience2">EXPERIENCE</div>
    <img class="jamtransgender-icon2" alt="" src="./public/jamtransgender2.svg" /><img class="quiz-question-child9" alt="" src="./public/rectangle-16.svg" /><img class="quiz-question-child10" alt="" src="./public/rectangle-16.svg" /><img class="quiz-question-child11" alt="" src="./public/rectangle-15.svg" /><img class="quiz-question-child12" alt="" src="./public/rectangle-16.svg" />
    <div class="what-is-your1">What is your fitness Goal?</div>

    <a href="QUIZQuestion3.php?choice=2">
      <div class="quiz-question-child13" id="rectangle5"></div>
      <div class="i-have-a-container">
        <p class="i-have-a">I have a low amount of body</p>
        <p class="i-have-a">fat and need to build more muscle</p>
      </div>
    </a>

    <a href="QUIZQuestion3.php?choice=3">
      <div class="quiz-question-child14" id="rectangle4"></div>
      <div class="i-am-a-container">
        <p class="i-have-a">I am a “skinny fat”. I need more</p>
        <p class="i-have-a">muscle but I know there still some</p>
        <p class="i-have-a">fat covering my abs</p>
      </div>
    </a>

    <a href="QUIZQuestion3.php?choice=4">
      <div class="quiz-question-child15" id="rectangle6"></div>
      <div class="i-have-a-container2">
        <p class="i-have-a">I have a high amount of body fat.</p>
        <p class="i-have-a">I need to lose fat as fast as</p>
        <p class="i-have-a">possible</p>
      </div>
    </a>
    <a href="QUIZQuestion3.php?choice=1">
      <div class="quiz-question-child16" id="rectangle7"></div>
      <div class="i-have-a-container1">
        <p class="i-have-a">I have a good amount of muscle</p>
        <p class="i-have-a">but I still need to drop fat to</p>
        <p class="i-have-a">reveal my existing muscle</p>
        <p class="i-have-a">definition</p>
      </div>
    </a>


    <img class="red-lines-icon" alt="" src="./public/red-lines.svg" /><img class="red-lines-icon1" alt="" src="./public/red-lines.svg" />
    <div class="build-muscle">BUILD MUSCLE</div>
    <div class="build-define">BUILD & DEFINE</div>
    <div class="lose-a-lot">LOSE A LOT OF FAT</div>
    <div class="build-tone">BUILD & TONE</div>
  </div>

  <script>
    var rectangle6 = document.getElementById("rectangle6");
    var choice = 1;
    if (rectangle6) {
      rectangle6.addEventListener("click", function(e) {
        sendDivName("rectangle6", 1);
        window.location.href = "./QUIZQuestion4.html";
      });
    }

    var rectangle5 = document.getElementById("rectangle5");
    var choice = 2;
    if (rectangle5) {
      rectangle5.addEventListener("click", function(e) {
        sendDivName("rectangle5", 2);
        window.location.href = "./QUIZQuestion4.html";
      });
    }

    var rectangle4 = document.getElementById("rectangle4");
    var choice = 3;
    if (rectangle4) {
      rectangle4.addEventListener("click", function(e) {
        sendDivName("rectangle4", 3);
        window.location.href = "./QUIZQuestion4.html";
      });
    }

    var rectangle7 = document.getElementById("rectangle7");
    var choice = 4;
    if (rectangle7) {
      rectangle7.addEventListener("click", function(e) {
        sendDivName("rectangle7", 4);
        window.location.href = "./QUIZQuestion4.html";
      });
    }
  </script>
</body>

</html>