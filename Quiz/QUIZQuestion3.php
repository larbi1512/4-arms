<?php 
session_start();
$_SESSION["choice"]= $choice;
?>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./QUIZQuestion3.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Open Sans:wght@400;600;800&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Google Sans:wght@400;500&display=swap"
    />

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
    <div class="quiz-question3">
      <img
        class="icon-park-outlinemuscle2"
        alt=""
        src="./public/iconparkoutlinemuscle.svg"
      /><img
        class="octicongoal-162"
        alt=""
        src="./public/octicongoal162.svg"
      /><img
        class="material-symbolsavg-time-outl-icon2"
        alt=""
        src="./public/materialsymbolsavgtimeoutlinesharp.svg"
      />
      <div class="gender2">GENDER</div>
      <div class="age2">AGE</div>
      <div class="goal2">GOAL</div>
      <div class="experience2">EXPERIENCE</div>
      <img
        class="jamtransgender-icon2"
        alt=""
        src="./public/jamtransgender2.svg"
      /><img
        class="quiz-question-child9"
        alt=""
        src="./public/rectangle-16.svg"
      /><img
        class="quiz-question-child10"
        alt=""
        src="./public/rectangle-16.svg"
      /><img
        class="quiz-question-child11"
        alt=""
        src="./public/rectangle-15.svg"
      /><img
        class="quiz-question-child12"
        alt=""
        src="./public/rectangle-16.svg"
      />
      <a href="insert_data.php?choice=2">
        <div class="what-is-your1">What is your fitness Goal?</div>
        <div class="quiz-question-child13" id="rectangle5"></div>
        <div class="i-have-a-container">
          <p class="i-have-a">I have a low amount of body</p>
          <p class="i-have-a">fat and need to build more muscle</p>
        </div>
      </a>

      <a href="insert_data.php?choice=3">
      <div class="quiz-question-child14" id="rectangle4"></div>
      <div class="i-am-a-container">
        <p class="i-have-a">I am a “skinny fat”. I need more</p>
        <p class="i-have-a">muscle but I know there still some</p>
        <p class="i-have-a">fat covering my abs</p>
      </div>
      </a>

      <a href="insert_data.php?choice=1">
      <div class="quiz-question-child15" id="rectangle6"></div>
      <div class="i-have-a-container1">
        <p class="i-have-a">I have a good amount of muscle</p>
        <p class="i-have-a">but I still need to drop fat to</p>
        <p class="i-have-a">reveal my existing muscle</p>
        <p class="i-have-a">definition</p>
      </div>
    </a>
    <a href="insert_data.php?choice=4">

      <div class="quiz-question-child16" id="rectangle7"></div>
      <div class="i-have-a-container2">
        <p class="i-have-a">I have a high amount of body fat.</p>
        <p class="i-have-a">I need to lose fat as fast as</p>
        <p class="i-have-a">possible</p>
      </div>
    </a>
      <img class="red-lines-icon9" alt="" src="./public/red-lines5.svg" /><img
        class="red-lines-icon10"
        alt=""
        src="./public/red-lines4.svg"
      /><img class="red-lines-icon11" alt="" src="./public/red-lines6.svg" />
      <div class="build-muscle">BUILD MUSCLE</div>
      <div class="build-define">BUILD & DEFINE</div>
      <div class="lose-a-lot">LOSE A LOT OF FAT</div>
      <div class="build-tone">BUILD & TONE</div>
    </div>
 
<script>
  var rectangle6 = document.getElementById("rectangle6");
  var choice=1;
  if (rectangle6) {
    rectangle6.addEventListener("click", function (e) {
      sendDivName("rectangle6",1 );
      window.location.href = "./QUIZQuestion4.html";
    });
  }

  var rectangle5 = document.getElementById("rectangle5");
  var choice=2;
  if (rectangle5) {
    rectangle5.addEventListener("click", function (e) {
      sendDivName("rectangle5", 2);
      window.location.href = "./QUIZQuestion4.html";
    });
  }

  var rectangle4 = document.getElementById("rectangle4");
  var choice=3;
  if (rectangle4) {
    rectangle4.addEventListener("click", function (e) {
      sendDivName("rectangle4", 3);
      window.location.href = "./QUIZQuestion4.html";
    });
  }

  var rectangle7 = document.getElementById("rectangle7");
  var choice=4;
  if (rectangle7) {
    rectangle7.addEventListener("click", function (e) {
      sendDivName("rectangle7", 4);
      window.location.href = "./QUIZQuestion4.html";
    });
  }

  function sendDivName(divName, choice) {
    console.log(choice);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
      }
    };
    xmlhttp.open("POST", "insert_data.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("choice=" + choice);
    
  }
  </script>
  </body>
</html>
