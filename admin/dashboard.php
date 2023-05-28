<?php
require_once('../db.php');
$sql_userscount = "SELECT count(*) FROM user_signup";
$result_userscount = mysqli_query($conn, $sql_userscount);
$row_userscount = mysqli_fetch_array($result_userscount);
$userscount = $row_userscount[0];
?>
<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="utf-8">
    <title>Dashboard - Admin Page</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>
    <header>
        <h2 class="welcome">Welcome to Dashboard !</h2>
        <nav>
            <ul>
                <li><a href="../index.html">Go Back to Homepage</a></li>
            </ul>
        </nav>
    </header>

    <h1>Total number of users on 4-ARMS : <?php echo $userscount ?> ! Congratulation !</h1>
    <br>
    <section>
        <div class="record">
            <h2>GYMS</h2>
            <a href="record_table.php?table=gym"><button class="btn">See All</button></a>
            <a href="insert.php?table=gym"><button class="btn">Insert New Gym</button></a>
            <table class="styled-table" width="100%" border="1" style="border-collapse:collapse;">
                <thead>
                    <tr>
                        <th><strong>S.NO</strong></th>
                        <th><strong>Name</strong></th>
                        <th><strong>address</strong></th>
                        <th><strong>Number</strong></th>
                        <th><strong>Edit</strong></th>
                        <th><strong>Delete</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    $sel_query = "SELECT * FROM gym ORDER BY gym_id DESC LIMIT 3;";
                    $result = mysqli_query($conn, $sel_query);
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td align="center"><?php echo $count; ?></td>
                            <td align="center"><?php echo $row["gym_name"]; ?></td>
                            <td align="center"><?php echo $row["gym_address"]; ?></td>
                            <td align="center"><?php echo $row["gym_number"]; ?></td>

                            <td align="center">
                                <a href="insert.php?id=<?php echo $row["gym_id"]; ?>&table=gym">Edit</a>
                            </td>
                            <td align="center">
                                <a href="insert.php?id=<?php echo $row["gym_id"]; ?>&table=gym&action=delete">Delete</a>
                            </td>
                        </tr>
                    <?php $count++;
                    } ?>
                </tbody>
            </table>
        </div>



        <div class="record">
            <h2>DIETS</h2>
            <a href="record_table.php?table=diet"><button class="btn">See All</button></a>
            <a href="insert.php?table=diet"><button class="btn">Insert New Diet</button></a>
            <table class="styled-table" width="100%" border="1" style="border-collapse:collapse;">
                <thead>
                    <tr>
                        <th><strong>S.NO</strong></th>
                        <th><strong>Name</strong></th>
                        <th><strong>link</strong></th>
                        <th><strong>carbs</strong></th>
                        <th><strong>calories</strong></th>
                        <th><strong>proteins</strong></th>
                        <th><strong>Edit</strong></th>
                        <th><strong>Delete</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    $sel_query = "Select * from diet ORDER BY diet_id desc limit 3;";
                    $result = mysqli_query($conn, $sel_query);
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td align="center"><?php echo $count; ?></td>
                            <td align="center"><?php echo $row["diet_name"]; ?></td>
                            <td align="center"><?php echo $row["diet_link"]; ?></td>
                            <td align="center"><?php echo $row["carbs"]; ?></td>
                            <td align="center"><?php echo $row["Calories"]; ?></td>
                            <td align="center"><?php echo $row["Proteins"]; ?></td>
                            <td align="center">
                                <a href="insert.php?id=<?php echo $row["diet_id"]; ?>&table=diet">Edit</a>
                            </td>
                            <td align="center">
                                <a href="insert.php?id=<?php echo $row["diet_id"]; ?>&table=diet&action=delete">Delete</a>
                            </td>
                        </tr>
                    <?php $count++;
                    } ?>
                </tbody>
            </table>

        </div>
        <div class="record">
            <h2>WORKOUT PLANS</h2>
            <a href="record_table.php?table=workout"><button class="btn">See All</button></a>
            <a href="insert.php?table=workout"><button class="btn">Insert New workout</button></a>
            <table class="styled-table" width="100%" border="1" style="border-collapse:collapse;">
                <thead>
                    <tr>
                        <th><strong>S.NO</strong></th>
                        <th><strong>Name</strong></th>
                        <th><strong>Image Link</strong></th>
                        <th><strong>Plan Link</strong></th>
                        <th><strong>Edit</strong></th>
                        <th><strong>Delete</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    $sel_query = "SELECT * FROM workout_plan ORDER BY workout_id DESC LIMIT 3;";
                    $result = mysqli_query($conn, $sel_query);
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td align="center"><?php echo $count; ?></td>
                            <td align="center"><?php echo $row["workout_name"]; ?></td>
                            <td align="center"><?php echo $row["workout_img_link"]; ?></td>
                            <td align="center"><?php echo $row["workout_plan_link"]; ?></td>
                            <td align="center">
                                <a href="insert.php?id=<?php echo $row["workout_id"]; ?>&table=workout">Edit</a>
                            </td>
                            <td align="center">
                                <a href="insert.php?id=<?php echo $row["workout_id"]; ?>&table=workout&action=delete">Delete</a>
                            </td>
                        </tr>
                    <?php $count++;
                    } ?>
                </tbody>
            </table>

        </div>
        <div class="record">

            <h2>PRODUCTS</h2>
            <a href="record_table.php?table=product"><button class="btn">See All</button></a>
            <a href="insert.php?table=product"><button class="btn">Insert New product</button></a>
            <table class="styled-table" width="100%" border="1" style="border-collapse:collapse;">
                <thead>
                    <tr>
                        <th><strong>S.NO</strong></th>
                        <th><strong>Product Name</strong></th>
                        <th><strong>Product Category</strong></th>
                        <th><strong>Price</strong></th>
                        <th><strong>Image Link</strong></th>
                        <th><strong>Edit</strong></th>
                        <th><strong>Delete</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    $sel_query = "SELECT * FROM product ORDER BY product_ID DESC LIMIT 3;";
                    $result = mysqli_query($conn, $sel_query);
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td align="center"><?php echo $count; ?></td>
                            <td align="center"><?php echo $row["product_name"]; ?></td>
                            <td align="center"><?php echo $row["product_category"]; ?></td>
                            <td align="center"><?php echo $row["price"]; ?></td>
                            <td align="center"><?php echo $row["png_link"]; ?></td>
                            <td align="center">
                                <a href="insert.php?id=<?php echo $row["product_id"]; ?>&table=product">Edit</a>
                            </td>
                            <td align="center">
                                <a href="insert.php?id=<?php echo $row["product_id"]; ?>&table=product&action=delete">Delete</a>
                            </td>
                        </tr>
                    <?php $count++;
                    } ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>