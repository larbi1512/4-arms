<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: newhome/newhome.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./index.css" />
    <link rel="stylesheet" href="footer.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open Sans:wght@400;600&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Google Sans:wght@400;500&display=swap" />


    <title>4-ARMS</title>
</head>

<body>
<div class="home-page">
    <img class="white-lines" alt="" src="./public/white-lines.svg"/>
    <img
            class="skipping-rope-bro-1"
            alt=""
            src="./public/skipping-ropebro-1.svg"
    />
        <div class="logo">
            <img class="frame-icon" alt="" src="./public/frame.svg"/>
            <div class="arms">4-ARMS</div>
        </div>
        <div class="nav-bar">
            <style>
                a {
                    text-decoration: none;
                    color: #ff182c !important;
                    display: flex;
                }
                    .arms {
                transition: transform 0.3s ease;
            }
            
            .arms:hover {
                transform: scale(1.1);
            }
            </style>
            <div class="arms"><a href="index.php">Home</a></div>
            <div class="arms"><a href="#what-we-offer">Services</a></div>
            <div class="arms"><a href="#our-team"> Team</a></div>   
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
    <a href="Quiz/QuizQuestion1.php">
        <div class="button-take-your-quiz">
            <div class="button">
                <img class="buttoniconsettings" alt="" src="public/quiz.png"/><b class="button1">
                    Take your quiz -&gt;</b
                >
            </div>
        </div>
        <div class="what-we-offer" id="what-we-offer">WHAT WE OFFER</div>
        <div class="our-team" id="our-team">Our team</div>
        <div class="our-team1">
            <img class="our-team-child" alt="" src="./public/trainer.png" />
            <img class="our-team-item" alt="" src="./public/nutritionist.png" />
            <img class="our-team-inner" alt="" src="./public/psychologist.png" />
            <div class="our-team-child1"></div>
            <div class="our-team-child2"></div>
            <div class="our-team-child3"></div>
            <div class="dedicated-and-professional">
                Dedicated and professional staff ready to support
            </div>
            <div class="selma-bouaouina">
                <a class="team" href="https://www.instagram.com/zakaria_oualhaci7/">Zakaria Oulhaci</a>
            </div>
            <div class="gym-trainer">Gym Trainer</div>
            <div class="professional-nutritionist">Professional nutritionist</div>
            <div class="professional-psychologist">Professional psychologist</div>
            <div class="meriem-meziani">
                <a class="team" href="https://www.instagram.com/walid.benazala/">Walid Benazala</a>
            </div>
            <div class="ahmed-chellal">
                <a class="team" href="https://www.instagram.com/cabinet_de_psychologie_/">Alaa Seghier</a>
            </div>
            <img class="red-lines-icon" alt="" src="./public/red-lines.svg" />
            <img class="red-lines-icon1" alt="" src="./public/red-lines.svg" />
            <img class="red-lines-icon2" alt="" src="./public/red-lines1.svg" />
        </div>
        <footer>
            <?php include("footer.php"); ?>
        </footer>
    </div>
</body>


<script>
    Var
    scrollAnimElements = document.querySelectorAll(
        "[data-animate-on-scroll]"
    );
    Var
    observer = new IntersectionObserver(
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const scrollLinks = document.querySelectorAll('.nav-bar a[href^="#"]');
        scrollLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = link.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    });
</script>


</html>