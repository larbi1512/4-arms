<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Dashboard - Admin Page</title>
</head>

<body>
    <p>Welcome to Dashboard.</p>
    <p><a href="../index.html">Home</a></p>
    <p><a href="insert.php?table=gym">Insert new gym record</a></p>
    <p><a href="insert.php?table=diet">Insert new diet record</a></p>
    <p><a href="insert.php?table=product">Insert new product record</a> </p>
    <p><a href="insert.php?table=workout">Insert new workout record</a></p>


    <h2>GYMS</h2>
    <table width="100%" border="1" style="border-collapse:collapse;">
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
             $conn = new mysqli('localhost', 'root', '', '4-arms');
             // Check connection
             if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
             }
            $count = 1;
            $sel_query = "Select * from gym ORDER BY gym_id desc;";
            $result = mysqli_query($conn, $sel_query);
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td align="center"><?php echo $count; ?></td>
                    <td align="center"><?php echo $row["gym_name"]; ?></td>
                    <td align="center"><?php echo $row["gym_address"]; ?></td>
                    <td align="center"><?php echo $row["gym_number"]; ?></td>
                    <td align="center">
                        <a href="edit.php?id=<?php echo $row["gym_id"]; ?>">Edit</a>
                    </td>
                    <td align="center">
                        <a href="delete.php?id=<?php echo $row["gym_id"]; ?>">Delete</a>
                    </td>
                </tr>
            <?php $count++;
            } ?>
        </tbody>
    </table>


    <h2>DIETS</h2>
    <table width="100%" border="1" style="border-collapse:collapse;">
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
            $sel_query = "Select * from diet ORDER BY diet_id desc;";
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
                        <a href="edit.php?id=<?php echo $row["diet_id"]; ?>">Edit</a>
                    </td>
                    <td align="center">
                        <a href="delete.php?id=<?php echo $row["diet_id"]; ?>">Delete</a>
                    </td>
                </tr>
            <?php $count++;
            } ?>
        </tbody>
    </table>




    <h2>workout plans</h2>
    <table width="100%" border="1" style="border-collapse:collapse;">
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
            $sel_query = "SELECT * FROM workout_plan ORDER BY workout_id DESC;";
            $result = mysqli_query($conn, $sel_query);
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td align="center"><?php echo $count; ?></td>
                    <td align="center"><?php echo $row["workout_name"]; ?></td>
                    <td align="center"><?php echo $row["workout_img_link"]; ?></td>
                    <td align="center"><?php echo $row["workout_plan_link"]; ?></td>
                    <td align="center">
                        <a href="edit.php?id=<?php echo $row["workout_id"]; ?>">Edit</a>
                    </td>
                    <td align="center">
                        <a href="delete.php?id=<?php echo $row["workout_id"]; ?>">Delete</a>
                    </td>
                </tr>
            <?php $count++;
            } ?>
        </tbody>
    </table>


    <h2>products</h2>
    <table width="100%" border="1" style="border-collapse:collapse;">
        <thead>
            <tr>
                <th><strong>S.NO</strong></th>
                <th><strong>Product Name</strong></th>
                <th><strong>Product Category</strong></th>
                <th><strong>Product ID</strong></th>
                <th><strong>Price</strong></th>
                <th><strong>Image Link</strong></th>
                <th><strong>Edit</strong></th>
                <th><strong>Delete</strong></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            $sel_query = "SELECT * FROM product ORDER BY product_id DESC;";
            $result = mysqli_query($conn, $sel_query);
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td align="center"><?php echo $count; ?></td>
                    <td align="center"><?php echo $row["product_name"]; ?></td>
                    <td align="center"><?php echo $row["product_category"]; ?></td>
                    <td align="center"><?php echo $row["product_id"]; ?></td>
                    <td align="center"><?php echo $row["price"]; ?></td>
                    <td align="center"><?php echo $row["png_link"]; ?></td>
                    <td align="center">
                        <a href="edit.php?id=<?php echo $row["product_id"]; ?>">Edit</a>
                    </td>
                    <td align="center">
                        <a href="delete.php?id=<?php echo $row["product_id"]; ?>">Delete</a>
                    </td>
                </tr>
            <?php $count++;
            } ?>
        </tbody>
    </table>

</body>

</html>
</body>

</html>