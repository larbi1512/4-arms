<html>
    <?php
    session_start();
    require_once('../db.php');
    $user_id = $_SESSION["user_id"] ?? 1;
    $count = 0;
    ?>
    <head>
        <link rel="stylesheet" href="./bascket.css">
    </head>
    <body>
    <div class="nav-bar sticky-nav">
        <div class="nav-bar1">
            <a class="home" id="home" href="../NewHome/newHome.php">Home</a>
            <a class="workout" id="workout" href="../workout/workout.php">Workout</a>
            <a class="diet1" href="../diet/diet.php">Diet</a>
            <a class="supplement" href="./supplement.php">Supplement</a>
        </div>
    </div>
    <div class="record">
            <h2>My Basket</h2>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th><strong>Product</strong></th>
                        <th><strong>Picture</strong></th>
                        <th><strong>Price perunit</strong></th>
                        <th><strong>Quantity</strong></th>
                        <th><strong>Date Of The Order</strong></th>
                        <th><strong>Date Of Delivery</strong></th>
                        <th><strong>Delivery Status</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $date = date("Y-m-d");
                    $sel_query = "SELECT * FROM orders 
                    inner join product on product.product_id=orders.product_id
                    where user_id = $user_id";
                    $result = mysqli_query($conn, $sel_query);
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td align="center"><?php echo $row["product_name"]; ?></td>
                            <td align="center"><img src="<?php echo $row["png_link"]; ?>" alt=""></td>
                            <td align="center"><?php echo $row["price"]; ?></td>
                            <td align="center"><?php echo $row["quantity"]; ?></td>
                            <td align="center"><?php echo $row["date_order"]; ?></td>
                            <td align="center"><?php echo $row["date_delivery"]; ?></td>
                            <td align='center'>
                                <?php
                                if($row["deliverd"] == 0 && $row["date_delivery"]>=$date)
                                {
                                    echo "On The Way";
                                }
                                elseif ($row["deliverd"] == 0 && $row["date_delivery"]<$date) {
                                    echo "Late Delivery";
                                }
                                elseif ($row["deliverd"] == 1) {
                                    echo "Deliverd";
                                }
                                ?>
                            </td>
                        </tr>
                    <?php $count+=$row["price"]*$row["quantity"];
                    } ?>
                </tbody>
            </table>
            <div class="total-price-box">
                <p>Total Price:<?php echo $count?></p>
            </div>
        </div>
    </body>
</html>