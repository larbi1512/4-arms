  <?php
  session_start();
  $user_id = $_SESSION["user_id"] ?? 1;
  require_once "../db.php";
  ?>
  <!DOCTYPE html>
  <html>

  <head>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="global.css" />
    <link rel="stylesheet" href="workout.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nasalization:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Damion:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Habibi:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Google Sans:wght@400;500&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=font:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open Sans:wght@400;600&display=swap" />

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
    <div class="workout">
      <p style='margin-top:130px;margin-left:4%;font-size:50px;' id="act">My OverView</p>
      <p style='margin-top:53px;margin-left:7%'>Activity</p>
      <style>
        .activity {
          background-color: #3E3E3E;
          width: 600px;
          height: 282px;
        }
      </style>
      <div class="activity">
        <canvas id="myChart"></canvas>
      </div>
      <?php
      $query = $conn->query(
        "select sum(activity_time) as activity_time,month from activity where user_id=$user_id group by month"
      );
      foreach ($query as $data) {
        $month[] = $data['month'];
        $time[] = $data['activity_time'];
      }
      ?>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script>
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
          type: 'bar',

          data: {
            labels: <?php echo json_encode($month) ?>,
            datasets: [{
              label: 'Timing',
              data: <?php echo json_encode($time) ?>,
              borderWidth: 0.5,
              backgroundColor: '#8F8F8F',
              borderRadius: 30,
              hoverBackgroundColor: '#F93535',

            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>
      <style>
        .overview {
          right: 10%;
          border-radius: 10%;
        }
      </style>
      <div id="container" class="overview">
        <?php
        $sql = "SELECT calories, carbs, protien FROM progress WHERE user_id = $user_id";
        $result = $conn->query($sql);

        // Prepare data for pie chart
        $data = array();
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $data[] = array(
              'name' => 'Calories',
              'y' => intval($row['calories'])
            );
            $data[] = array(
              'name' => 'Carbs',
              'y' => intval($row['carbs'])
            );
            $data[] = array(
              'name' => 'Protein',
              'y' => intval($row['protien'])
            );
          }
        }
        ?>


        <script>
          // Render pie chart using Highcharts
          Highcharts.chart('container', {
            chart: {
              plotBackgroundColor: '#3E3E3E',
              backgroundColor: '#3E3E3E',
              plotBorderWidth: null,
              plotShadow: false,
              type: 'pie',
            },
            title: {
              text: 'OverVeiw',
              plotBackgroundColor: 'black',
            },
            tooltip: {
              pointFormat: '{series.name}: <b>{point.y}g</b>',
              plotBackgroundColor: 'black'
            },
            plotOptions: {
              pie: {
                plotBackgroundColor: 'black',
                allowPointSelect: true,
                cursor: 'pointer',
                showInLegend: true,
                dataLabels: {
                  enabled: false,
                }
              }
            },
            series: [{
              name: 'Nutrition',
              colorByPoint: true,
              plotBackgroundColor: 'black',
              data: <?php echo json_encode($data); ?>

            }]

          });
        </script>
      </div>
      <div class="recommended-activities" style="font-size:50px;" id="plan">Your WorkOut Plan</div>
      <div class="counter" style="margin-right:0;">
        <p style="margin: 0;font-size: 24px;font-weight: bold;">Time Counter</p>
        <style>
          .counter {
            margin-top: 35%;
            text-align: center;
          }

          #start-button,
          #stop-button {
            background-color: #FF182C;
            border: none;
            border-radius: 30px;
            color: white;
            padding: 10px 24px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;

          }

          #start-button:hover,
          #stop-button:hover {
            background-color: #999999;
          }

          #start-button:active,
          #stop-button:active {
            background-color: #999999;
          }
        </style>
        <!-- HTML code for the button and result display -->
        <button id="start-button" onclick="startTimer()">Start The Workout</button>
        <button id="stop-button" onclick="stopTimer()">End Of The Workoit</button>
        <p id="result"></p>

        <!-- JavaScript code to handle the timer and AJAX -->
        <script>
          var startTime, endTime, elapsedTime;

          function startTimer() {
            startTime = new Date().getTime();
          }

          function stopTimer() {
            endTime = new Date().getTime();
            elapsedTime = (endTime - startTime) / 1000; // Calculate elapsed time in seconds

            // Get the current month (1-12)
            var currentMonth = new Date().getMonth() + 1;

            // Send the elapsed time and month to a PHP script using AJAX
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                document.getElementById("result").innerHTML = this.responseText;
              }
            };
            xhr.open("POST", "insert_elapsed_time.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("elapsed_time=" + elapsedTime + "&month=" + currentMonth);
          }
        </script>
      </div>
      <div class="plan" style="margin-top:1% !important;">
        <?php
        $sql = "SELECT * FROM assigned WHERE user_id = $user_id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $workout_id = $row['workout_id'];
        $sql = "SELECT * FROM workout_plan WHERE workout_id = $workout_id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        ?>
        <div class="plan-img">
          <a href="<?php echo $row['workout_plan_link'] ?>">
            <img src="<?php echo $row['workout_img_link'] ?>" alt="" onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0.7">
          </a>
        </div>
        <div class="plan-description">
          <p style="font-size:36px"><?php echo $row['workout_name'] ?></p>
          <p>Goal : <?php echo $row['goal'] ?></p>
          <p>Duration : <?php echo $row['duration'] ?></p>
          <p>Description : <?php echo $row['description'] ?></p>
          <p><?php echo $row['workout_summary'] ?></p>

          <a href="<?php echo $row['workout_plan_link'] ?>">Learn More</a>
        </div>
      </div>
      <style>
        .gym-space {
          background-color: #2B2B2E;
          font-size: 24px;
          font-family: var(--font-nasalization);
          margin-top: 100px;
          border-radius: 30px;
          margin-left: 40px;
          margin-right: 40px;
        }
      </style>
      <div class="gym-space" id="gym">
        <?php
        // Fetch gyms from database
        $sql = "SELECT * FROM gym";
        $result = $conn->query($sql);
        $gyms = array();

        if ($result->num_rows > 0) {
          // Output data of each row
          while ($row = $result->fetch_assoc()) {
            $gyms[] = $row;
          }
        } else {
          echo "0 results";
        }

        $conn->close();
        ?>

        <title>List of Gyms</title>

        <style>
          select {
            border-radius: 30px;
            padding: 10px;
            font-size: 32px;
          }

          select option:hover {
            background-color: red;
          }

          button[type="submit"] {
            padding: 8px 16px;
            border-radius: 30px;
            border: none;
            background-color: #D9D9D9;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
          }

          button[type="submit"]:hover {
            background-color: #f00;
          }

          table {
            border-collapse: collapse;
            width: 100%;
            border-radius: 30px;
          }

          th {
            text-align: left;
            padding: 8px;
            background-color: red;
          }

          td {
            text-align: left;
            padding: 8px;
          }

          tr:nth-child(even) {
            background-color: #ddd;
          }

          tr:hover {
            background-color: #FBD5D5;
            opacity: 0.5;
          }

          img {
            width: 250px;
            height: 350px;
            height: auto;
            border-radius: 20px;
          }

          /* Added styles for filter selector */
          label {
            font-size: 18px;
            margin-right: 10px;
          }

          select {
            font-size: 16px;
            padding: 4px;
            border-radius: 4px;
          }

          .nav-bar {
            top: 0;
            position: fixed;
            left: 0;
            width: 100%;
            z-index: 999;
            background-color: #272523;
          }
        </style>

        <p style="font-size: 36px; color: #ffffff;font-family: var(--font-nasalization);">GYM Space</p>

        <form method="get" class="filter">
          <label for="city">Filter by city:</label>
          <select id="city" name="city">
            <option value="">All</option>
            <option value="Oran">Oran</option>
            <option value="Bejaia">Bejaia</option>
            <option value="Algiers">Algiers</option>
          </select>
          <button type="submit">Filter</button>
        </form>

        <br>

        <table>
          <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Address</th>
            <th>City</th>
            <th>Number</th>
            <th></th>


          </tr>

          <?php foreach ($gyms as $gym) : ?>
            <?php if (isset($_GET['city']) && $_GET['city'] != '' && $gym['city'] != $_GET['city']) continue; ?>

            <tr>
              <td><img src="<?php echo $gym['gym_img_link'] ?>"></td>
              <td><?php echo $gym['gym_name'] ?></td>
              <td><?php echo $gym['gym_address'] ?></td>
              <td><?php echo $gym['city'] ?></td>
              <td><?php echo $gym['gym_number'] ?></td>
              <td>
                <a href="<?php echo $gym['gym_link'] ?>" style="font-size:18px">Contact Gym
              </td>

            </tr>
          <?php endforeach; ?>
      </div>
      </table>
      <style>
        .nav-bar {
          top: 0;
          position: fixed;
          left: 0;
          width: 100%;
          z-index: 999;
          background-color: #272523;
          height: 13%;
        }
      </style>
      <style>
        .plan {
          display: flex;
          flex-direction: row;
          background-color: #2B2B2E;
          border-radius: 30px;
          padding: 20px;
          margin-top: 7%;
          margin-left: 40px;
          margin-right: 40px;
        }

        .plan-img {
          margin-right: 20px;
          top: 50%;
        }

        .plan-img img {
          width: 200px;
          height: 200px;
          object-fit: cover;
          border-radius: 10px;
          top: 50%;
        }

        .plan-description {
          display: flex;
          flex-direction: column;
          top: 50%;
        }

        .plan-description p {
          color: white;
          font-size: 18px;
          margin: 0 0 10px 0;
          top: 50%;
        }

        .plan-description a {
          color: #EEC643;
          font-size: 16px;
          text-decoration: none;
          margin-top: auto;

        }
      </style>

      <div class="nav-bar">
        <style>
          a {
            text-decoration: none;
            color: #ff182c !important;
          }
        </style>
        <div class="logo">
          <img class="frame-icon" alt="" src="./public/frame.svg" />
          <p class="arms">4-ARMS</p>
          <button class="login-button" id="go" style="margin-left:40%;background-color:#272523;">
            <div class="gogo">
              <img src="./dash.svg" style="height:30px;width:30px;">
            </div>
          </button>
        </div>
        <div class="home-parent">
          <div class="home"><a href="../index.html">Home</a></div>
          <button class="frame-item"></button>
          <div class="workout1"><a href="../workout/workout.html">Workout</a></div>
          <div class="diet"><a href="../diet/diet.html">Diet</a></div>
          <div class="supplement"><a href="../supplement/supplement.html">Supplement</a></div>
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
          <style>
            .profile-child {
              position: relative;
            }

            .profile-item {
              position: absolute;
              top: 0;
              left: 0;
              width: 10px;
              height: 50px;
            }
          </style>
          <div class="profile-child">
            <img class="profile-item" alt="" src="./public/ellipse-800.svg" />
            <img src="<?php echo $user_img ?>" style="height:30%;width:30%; border-radius:30%;margin-right:20%" />
          </div>
          <div class="larbi-saidchikh">
            <?php echo $user_name ?>
          </div>
          <div class="larbisckgmailcom"><?php echo $user_email ?></div>
          <div class="my-progress">
            <a href="./workout/workout.php" style="color:black">My progress</a>
          </div>
          <div class="my-diet">
            <a href="./diet/diet.html" style="color:black">My diet</a>
          </div>
          <div class="log-out">
            <a href="./index.html" style="color:black">Log out</a>
          </div>
          <div class="my-supplements">
            <a href="./supplement/supplement.html" style="color:black">My supplements</a>
          </div>
        </div>
      </div>
    </div>

    <script>
      var dietText = document.getElementById("dietText");
      if (dietText) {
        dietText.addEventListener("click", function(e) {
          window.location.href = "./diet1.html";
        });
      }

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
    <div id="goto" class="popup-overlay" style="display: none">
      <style>
        .profile-child {
          position: relative;
        }

        .profile-item {
          position: absolute;
          top: 0;
          left: 0;
          width: 10px;
          height: 50px;
        }
      </style>
      <div class="profile-child">
        <div class="my-progress">
          <a href="#act" style="color:black">My OverView</a>
        </div>
        <div class="my-diet">
          <a href="#plan" style="color:black">My WorkOut Plan</a>
        </div>
        <div class="my-supplements">
          <a href="#gym" style="color:black">The Gym Space</a>
        </div>
      </div>
    </div>
    </div>
    <script>
      var dietText = document.getElementById("dietText");
      if (dietText) {
        dietText.addEventListener("click", function(e) {
          window.location.href = "./diet1.html";
        });
      }

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