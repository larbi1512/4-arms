<?php
include_once("../db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>All Orders</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/notyf/notyf.min.css" />
    <script src="https://unpkg.com/notyf/notyf.min.js "></script>
    <script src="dashboard.js"></script>
</head>

<body>
    <header>
        <h2 class="welcome">Welcome to Dashboard!</h2>
        <nav>
            <ul>
                <li><a href="dashboard.php">GO BACK TO Dashboard</a></li>
                <li><a href="../index.php">Homepage</a></li>
            </ul>
        </nav>
    </header>


    <div class="record">
        <h2>Users</h2>
        <br> <br>
        <table class="styled-table" width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th><strong>S.NO</strong></th>
                    <th><strong>User ID</strong></th>
                    <th><strong>Name</strong></th>
                    <th><strong>Workout Plan</strong></th>
                    <th><strong>Diet Plan</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                $sel_query = "SELECT * FROM user_signup inner join assigned on user_signup.user_id = assigned.user_id inner join workout_plan on assigned.workout_id = workout_plan.workout_id inner join diet on assigned.diet_id = diet.diet_id order by user_signup.user_id asc limit 3;";
                $result = mysqli_query($conn, $sel_query);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td align="center"><?php echo $count; ?></td>
                        <td align="center"><?php echo $row["user_id"]; ?></td>
                        <td align="center"><?php echo $row["user_name"]; ?></td>
                        <td align="center"><?php echo $row["workout_name"]; ?></td>
                        <td align="center"><?php echo $row["diet_name"]; ?></td>
                    </tr>
                <?php $count++;
                } ?>
            </tbody>
        </table>
    </div>

</body>

</html>