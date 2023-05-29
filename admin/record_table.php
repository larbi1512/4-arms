<?php
require_once('../db.php');
$table = $_GET['table'];
$field_names = array();
$table_map = array(
    "gym" => array("gym_name", "gym_address", "city", "gym_number", "gym_img_link", "gym_link"),
    "diet" => array("diet_link", "diet_name", "diet_link_img", "carbs", "Calories", "Proteins"),
    "workout" => array("workout_name", "workout_img_link", "workout_plan_link", "description", "workout_summary", "goal", "duration", "length"),
    "product" => array("price", "product_name", "product_category", "png_link")
);
if (isset($table_map[$table])) {
    if ($table == 'workout') {
        $tableName = 'workout_plan';
    } else {
        $tableName = $table;
    }
    $fieldNames = $table_map[$table];
} else {
    die("Invalid table name");
}
try {
    $query = "SELECT * FROM $tableName ORDER BY " . $table . "_id DESC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="utf-8">
    <title> All <?php echo $table ?> </title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/notyf/notyf.min.css" />
    <script src="https://unpkg.com/notyf/notyf.min.js "></script>
    <script src="dashboard.js"></script>

</head>

<body>
    <header>
        <h2 class="welcome">Welcome to Dashboard !</h2>
        <nav>
            <ul>
                <li><a href="dashboard.php">GO BACK TO Dashboard</a></li>
                <li><a href="../index.html">Homepage</a></li>
                <li><a href="insert.php?table=<?php echo $table ?>">Add New one</a></li>
            </ul>
        </nav>
    </header>

    <div class='record'>
        <h2><?php echo $tableName ?></h2>
        <a href='insert.php?table=<?php echo $table ?>'><button class='btn'>Insert New <?php echo $table ?></button></a>
        <table class="styled-table" width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th>#</th>
                    <?php foreach ($fieldNames as $fieldName) { ?>
                        <th><?php echo $fieldName ?></th>
                    <?php } ?>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1;
                while ($row = $result->fetch_assoc()) { ?>
                    <tr id="<?php echo $tableName . "-" . $row[$tableName . "_id"] ?? $row['workout_id'] ?>">
                        <td><?php echo $count ?></td>
                        <?php foreach ($fieldNames as $fieldName) { ?>
                            <td><?php echo $row[$fieldName] ?></td>
                        <?php } ?>
                        <td><a class="btn-table" href='insert.php?table=<?php echo $table ?>&id=<?php echo $row[$tableName . "_id"] ?? $row['workout_id'] ?>'>Update</a></td>
                        <td><button class="btn-table" onclick="deleteRecord('<?php echo $tableName ?>', <?php echo $row[$tableName . "_id"] ?? $row["workout_id"] ?>)"><i class="ion-close"></i></button></td>
                    </tr>
                <?php $count++;
                } ?>
            </tbody>
        </table>
    </div>

</body>

</html>