<?php
session_start();
if (isset($_SESSION['logged'])) {
  header("location: NewHome/newHome.php");
  exit();
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./global.css" />
  <link rel="stylesheet" href="./index.css" />
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
  <div class="home-page">
    <img class="white-lines" alt="" src="./public/white-lines.svg" />
    <img class="skipping-rope-bro-1" alt="" src="./public/skipping-ropebro-1.svg" />
    <div class="logo">
      <img class="frame-icon" alt="" src="./public/frame.svg" />
      <div class="arms">4-ARMS</div>
    </div>
    <div class="nav-bar">
      <style>
        a {
          text-decoration: none;
          color: #ff182c !important;
        }
      </style>
      <div class="arms"><a href="index.html">Home</a></div>
      <div class="arms"><a href="./workout/workout.php">Workout</a></div>
      <div class="arms"><a href="./diet/diet.php">Diet</a></div>
      <div class="arms"><a href="./Shop/supplement.html">Supplement</a></div>
    </div>
    <div class="be-strong-be">Be strong Be fit</div>
    <div class="make-yourself-stronger-container">
      <p class="make-yourself-stronger">Make yourself stronger</p>
      <p class="make-yourself-stronger">than your excuses</p>
    </div>
    <div class="take-our-60-second">
      Take our 60-second quiz to find the most effective program for achieving
      your specific fitness goals.
    </div>
    <a href="Quiz/Quizindex.html">
      <div class="button-take-your-quiz">
        <div class="button">
          <img class="buttoniconsettings" alt="" /><b class="button1">
            Take your quiz -&gt;</b>
        </div>
      </div>
    </a>
    <a class="login-button" id="login" href="signup_login\login.php">
      <div class="arms">Login</div>
    </a>
    <a class="sign-up-button" id="sign up " href="signup_login\signup.php">
      <div class="arms">sign Up</div>
    </a>
    <div class="services">
      <div class="services-child"></div>
      <div class="services-item"></div>
      <img class="frame-icon1" alt="" src="./public/frame1.svg" />
      <div class="services-inner"></div>
      <img class="frame-icon2" alt="" src="./public/frame2.svg" />
      <img class="frame-icon3" alt="" src="./public/frame3.svg" />
      <img class="frame-icon4" alt="" src="./public/frame4.svg" />
      <div class="rectangle-div"></div>
      <div class="services-child1"></div>
      <div class="services-child2"></div>
      <img class="frame-icon5" alt="" src="./public/frame5.svg" />
      <div class="services-child3"></div>
      <div class="services-child4"></div>
      <div class="services-child5"></div>
      <b class="read-more">Read more</b><b class="read-more1">Read more</b><b class="read-more2">Read more</b>
      <div class="provide-a-marketplace-container">
        <ul class="a-meal-planner-that-suggests">
          <li class="a-meal-planner">Provide a marketplace where you</li>
        </ul>
        <p class="make-yourself-stronger">can purchase supplement that</p>
        <p class="make-yourself-stronger">are recommended by the system</p>
        <p class="make-yourself-stronger">or from trusted vendors.</p>
      </div>
      <div class="customized-workout-plans-container">
        <ul class="a-meal-planner-that-suggests">
          <li class="a-meal-planner">
            <span class="customized-workout-plans">Customized workout plans user
            </span>
          </li>
        </ul>
        <p class="make-yourself-stronger">
          <span class="span"> </span><span class="customized-workout-plans">goals and fitness levels.
          </span>
        </p>
      </div>
      <div class="progress-tracking-and-container">
        <ul class="a-meal-planner-that-suggests">
          <li class="a-meal-planner">Progress tracking and analysis</li>
        </ul>
        <p class="make-yourself-stronger">features that help users monitor</p>
        <p class="make-yourself-stronger">their performance</p>
      </div>
      <div class="progress-tracking-and-container2">
        <ul class="a-meal-planner-that-suggests">
          <li class="a-meal-planner">A meal planner that suggests</li>
        </ul>
        <p class="make-yourself-stronger">healthy meal options based on</p>
        <p class="make-yourself-stronger">your dietary preferences and</p>
        <p class="make-yourself-stronger">goals.</p>
      </div>
    </div>
    <div class="what-we-offer">WHAT WE OFFER</div>
    <div class="our-team">Our team</div>
    <div class="about-us">About us</div>
    <div class="our-team1">
      <img class="our-team-child" alt="" src="./public/ellipse-1@2x.png" /><img class="our-team-item" alt="" src="./public/ellipse-2@2x.png" /><img class="our-team-inner" alt="" src="./public/ellipse-3@2x.png" />
      <div class="our-team-child1"></div>
      <div class="our-team-child2"></div>
      <div class="our-team-child3"></div>
      <div class="dedicated-and-professional">
        Dedicated and professional staff ready to support
      </div>
      <div class="selma-bouaouina">Selma Bouaouina</div>
      <div class="gym-trainer">Gym Trainer</div>
      <div class="professional-nutritionist">Professional nutritionist</div>
      <div class="professional-psychologist">Professional psychologist</div>
      <div class="meriem-meziani">Meriem Meziani</div>
      <div class="ahmed-chellal">Ahmed Chellal</div>
      <img class="red-lines-icon" alt="" src="./public/red-lines.svg" /><img class="red-lines-icon1" alt="" src="./public/red-lines.svg" /><img class="red-lines-icon2" alt="" src="./public/red-lines1.svg" />
    </div>
    <div class="logo1">
      <img class="frame-icon6" alt="" src="./public/frame6.svg" />
      <div class="arms">4-ARMS</div>
    </div>
    <div class="sidi-abdellah-algiers">Sidi Abdellah, Algiers</div>
    <div class="armsgmailcom">4-arms@gmail.com</div>
    <div class="div">(+213)553988691</div>
    <div class="home-page-child"></div>
    <div class="give-us-your"><input type="text" />Give us your feedBack</div>
  </div>

  <script>
    var scrollAnimElements = document.querySelectorAll(
      "[data-animate-on-scroll]"
    );
    var observer = new IntersectionObserver(
      (entries) => {
        for (const entry of entries) {
          if (entry.isIntersecting || entry.intersectionRatio > 0) {
            const targetElement = entry.target;
            targetElement.classList.add("animate");
            observer.unobserve(targetElement);
          }
        }
      }, {
        threshold: 0.15,
      }
    );

    for (let i = 0; i < scrollAnimElements.length; i++) {
      observer.observe(scrollAnimElements[i]);
    }
  </script>
</body>

</html>