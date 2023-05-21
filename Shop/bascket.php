<html>
    <?php
    require_once('../db.php');
    $user_id = $_SESSION["user_id"] ?? 1;
    $count = 0;
    ?>
    <head>
        <link rel="stylesheet" href="./bascket.css">
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
                    </tr>
                </thead>
                <tbody>
                    <?php
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