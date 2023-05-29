<?php
include_once("../db.php");

// Fetch the count of undelivered orders
$count_query = "SELECT COUNT(*) AS count FROM orders WHERE deliverd = 0";
$result = mysqli_query($conn, $count_query);
$row = mysqli_fetch_assoc($result);
$orderCount = $row['count'];

// Fetch all orders with user and product details
$sel_query = "SELECT * FROM orders
              INNER JOIN user_signup ON orders.user_id = user_signup.user_id
              INNER JOIN product ON orders.product_id = product.product_id
              ORDER BY deliverd ASC, date_order DESC";
$result = mysqli_query($conn, $sel_query);
$orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
    <!--  a button to go back to dashboard-->


    <!-- Display the count of undelivered orders -->
    <div class="record">
        <h2>Orders</h2>
        <h2 id="count"><?php echo $orderCount; ?> Undelivered Orders!</h2>
        <a href="record_table.php?table=orders"><button class="btn">See All</button></a>
        <table class="styled-table" width="100%" border="1" style="border-collapse: collapse;">
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
                foreach ($orders as $order) { ?>
                    <tr id="order-<?php echo $order['orders_id']; ?>">
                        <td align="center"><?php echo $count; ?></td>
                        <td align="center"><?php echo $order['orders_id']; ?></td>
                        <td align="center"><?php echo $order['name']; ?></td>
                        <td align="center"><?php echo $order['phone_number']; ?></td>
                        <td align="center"><?php echo $order['user_address']; ?></td>
                        <td align="center"><?php echo $order['product_name']; ?></td>
                        <td align="center"><?php echo $order['quantity']; ?></td>
                        <td align="center"><?php echo $order['date_order']; ?></td>
                        <td align="center"><?php echo ($order['deliverd'] == 0) ? 'Pending' : 'Delivered'; ?></td>
                        <td align="center">
                            <?php if ($order['deliverd'] == 0) { ?>
                                <button class="btn-table" onclick="deliver(<?php echo $order['orders_id']; ?>)"><i class="ion-checkmark"></i></button>
                            <?php } else { ?>
                                <button class="btn-table" disabled><i class="ion-checkmark"></i></button>
                            <?php } ?>
                        </td>
                        <td align="center">
                            <?php if ($order['deliverd'] == 0) { ?>
                                <button class="btn-table" onclick="cancel(<?php echo $order['orders_id']; ?>)"><i class="ion-close"></i></button>
                            <?php } else { ?>
                                <button class="btn-table" disabled><i class="ion-close"></i></button>
                            <?php } ?>
                        </td>
                    </tr>
                <?php
                    $count++;
                } ?>
            </tbody>
        </table>
    </div>

</body>

</html>