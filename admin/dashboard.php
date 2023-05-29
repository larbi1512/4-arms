<?php
require_once('../db.php');
$sql_userscount = "SELECT count(*) FROM user_signup";
$result_userscount = mysqli_query($conn, $sql_userscount);
$row_userscount = mysqli_fetch_array($result_userscount);
$userscount = $row_userscount[0];
$count_query = "SELECT COUNT(*) AS count FROM orders WHERE deliverd = 0";
$result = mysqli_query($conn, $count_query);
$row = mysqli_fetch_assoc($result);
$orderCount = $row['count'];
?>
<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="utf-8">
    <title>Dashboard - Admin Page</title>
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/notyf/notyf.min.css" />
    <script src="https://unpkg.com/notyf/notyf.min.js "></script>
    <script src="dashboard.js"></script>
    <link rel="stylesheet" href="dashboard.css">


</head>

<body>
    <header>
        <h2 class="welcome">Welcome to Dashboard !</h2>
        <nav>
            <ul>
                <li><a href="../logout.php">Log Out</a></li>
            </ul>
        </nav>
    </header>

    <h1>Total number of users on 4-ARMS : <strong><?php echo $userscount ?> !</strong> Congratulation !</h1>
    <h2 id="count"><?php echo $orderCount; ?> Undelivered Orders !</h2>

    <br>

    <section>
        <div class="record">
            <h2>Orders</h2>
            <a href="orders.php"><button class="btn">See All</button></a>
            <table class="styled-table" width="100%" border="1" style="border-collapse:collapse;">
                <thead>
                    <tr>
                        <th><strong>S.NO</strong></th>
                        <th><strong>Order ID</strong></th>
                        <th><strong>Name</strong></th>
                        <th><strong>Phone Number</strong></th>
                        <th><strong>Address</strong></th>
                        <th><strong>Product</strong></th>
                        <th><strong>Quantity</strong></th>
                        <th><strong>Order Date</strong></th>
                        <th><strong>Order Status</strong></th>
                        <th><strong>Delivered</strong></th>
                        <th><strong>Cancel</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    $sel_query = "SELECT * FROM orders inner join user_signup on orders.user_id = user_signup.user_id inner join product on orders.product_id = product.product_id where deliverd = 0 ORDER BY orders_id DESC LIMIT 3;";
                    $result = mysqli_query($conn, $sel_query);
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr id="order-<?php echo $row['orders_id']; ?>">
                            <td align="center"><?php echo $count; ?></td>
                            <td align="center"><?php echo $row["orders_id"]; ?></td>
                            <td align="center"><?php echo $row["name"]; ?></td>
                            <td align="center"><?php echo $row["phone_number"]; ?></td>
                            <td align="center"><?php echo $row["user_address"]; ?></td>
                            <td align="center"><?php echo $row["product_name"]; ?></td>
                            <td align="center"><?php echo $row["quantity"]; ?></td>
                            <td align="center"><?php echo $row["date_order"]; ?></td>
                            <td align="center"><?php if ($row["deliverd"] == 0) echo "Pending";
                                                else echo "Delivered!" ?></td>
                            <td align="center">
                                <button class="btn-success mx-1" onclick="deliver(<?php echo $row['orders_id']; ?>)"><i class="ion-checkmark"></i></button>
                            </td>
                            <td align="center">
                                <button class="btn-danger mx-1" onclick="cancel(<?php echo $row['orders_id']; ?>)"><i class="ion-close"></i></button>
                            </td>
                        </tr>
                    <?php $count++;
                    } ?>
                </tbody>
            </table>
        </div>

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
                        <tr id="gym-<?php echo $row['gym_id']; ?>">
                            <td align="center"><?php echo $count; ?></td>
                            <td align="center"><?php echo $row["gym_name"]; ?></td>
                            <td align="center"><?php echo $row["gym_address"]; ?></td>
                            <td align="center"><?php echo $row["gym_number"]; ?></td>

                            <td align="center">
                                <button class="btn-table">
                                    <a href="insert.php?id=<?php echo $row["gym_id"]; ?>&table=gym"><i class="ion-edit"></i></a>
                                </button>
                            </td>
                            <td align="center">
                                <button class="btn-table" onclick="deleteRecord('gym', <?php echo $row['gym_id']; ?> )"> <i class="ion-close"></i></button>
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
                        <tr id="diet-<?php echo $row['diet_id']; ?>">
                            <td align="center"><?php echo $count; ?></td>
                            <td align="center"><?php echo $row["diet_name"]; ?></td>
                            <td align="center"><?php echo $row["diet_link"]; ?></td>
                            <td align="center"><?php echo $row["carbs"]; ?></td>
                            <td align="center"><?php echo $row["Calories"]; ?></td>
                            <td align="center"><?php echo $row["Proteins"]; ?></td>
                            <td align="center">
                                <a class="btn-table" href="insert.php?id=<?php echo $row["diet_id"]; ?>&table=diet">Edit</a>
                            </td>
                            <td align="center">
                                <button class="btn-table" onclick="deleteRecord('diet', <?php echo $row['diet_id']; ?> )"><i class="ion-close"></i></button>
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
                    <tr id="workout_plan-<?php echo $row['workout_id']; ?>">
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
                                <a class="btn-table" href="insert.php?id=<?php echo $row["workout_id"]; ?>&table=workout">Edit</a>
                            </td>
                            <td align="center">
                                <button class="btn-table" onclick="deleteRecord('workout_plan', <?php echo $row['workout_id']; ?> )"><i class="ion-close"></i></button>
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
                    <tr id="product-<?php echo $row['product_id']; ?>">
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
                                <a class="btn-table" href="insert.php?id=<?php echo $row["product_id"]; ?>&table=product">Edit</a>
                            </td>
                            <td align="center">
                                <button class="btn-table" onclick="deleteRecord('product', <?php echo $row['product_id']; ?> )"><i class="ion-close"></i></button>
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