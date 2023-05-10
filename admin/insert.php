<?php
require('../db.php');
$table = $_GET['table'];
$field_names = array();

switch ($table) {
    case "gym":
        $table_name = "gym";
        $field_names = array("gym_name", "gym_address", "gym_number");
        break;
    case "diet":
        $table_name = "diet";
        $field_names = array("diet_link", "diet_name", "carbs", "calories", "proteins");
        break;
    case "workout":
        $table_name = "workout_plan";
        $field_names = array("workout_name", "workout_img_link", "workout_plan_link");
        break;
    case "product":
        $table_name = "product";
        $field_names = array("price", "product_id", "product_name", "product_category", "png_link");
        break;
    default:
        return false;
}

function insertrecord($table_name, $field_names)
{
    global $conn;

    // Construct the SQL query and execute it

    foreach ($field_names as $key => $value) {
        if (isset($_POST[$value])) {
            $field_values[] = "'" . mysqli_real_escape_string($conn, $_POST[$value]) . "'";
        } else {
            $field_values[] = "NULL";
        }
    }

    // Construct the SQL query and execute it
    $ins_query = "INSERT INTO " . $table_name . " (" . implode(", ", $field_names) . ") VALUES (" . implode(", ", $field_values) . ")";
    mysqli_query($conn, $ins_query) or die(mysqli_error($conn));

    return true;
}




if (isset($_GET['table']) && ($_GET['table'] == 'gym' || $_GET['table'] == 'diet' || $_GET['table'] == 'workout' || $_GET['table'] == 'product')) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        insertrecord($_GET['table'], $field_names);
    }
} else {
    die("Invalid table name.");
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Insert New <?php echo ucfirst($_GET['table']); ?></title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="form">
        <p><a href="dashboard.php">Dashboard</a>
            | <a href="view.php">View Records</a>
            | <a href="logout.php">Logout</a></p>
        <div>
            <h1>Insert New <?php echo ucfirst($_GET['table']); ?></h1>
            <form name="form" method="post" action="">
                <input type="hidden" name="new" value="1" />
                <?php foreach ($field_names as $key => $value) { ?>
                    <p><input type="text" name="<?php echo $value; ?>" placeholder="Enter <?php echo ucfirst($key); ?>" required /></p>
                <?php } ?>
                <p><input name="submit" type="submit" value="Submit" /></p>
            </form>
        </div>
    </div>
</body>

</html>