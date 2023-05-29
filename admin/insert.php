<?php
require('../db.php');
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    deleterecord($_GET['table']);
    exit();
}

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
        $table_name = 'workout_plan';
    } else {
        $table_name = $table;
    }
    $field_names = $table_map[$table];
} else {
    die("Invalid table name");
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

function updaterecord($table_name, $field_names)
{
    global $conn;

    // Construct the SQL query and execute it

    $id = mysqli_real_escape_string($conn, $_GET['id']);
    foreach ($field_names as $key => $value) {
        if (isset($_POST[$value])) {
            $field_values[] = $value . "='" . mysqli_real_escape_string($conn, $_POST[$value]) . "'";
        }
    }

    // Construct the SQL query and execute it
    if ($table_name == 'workout_plan') {
        $update_query = "UPDATE " . $table_name . " SET " . implode(", ", $field_values) . " WHERE workout_id=" . $id;
    } else {

        $update_query = "UPDATE " . $table_name . " SET " . implode(", ", $field_values) . " WHERE " . $table_name . "_id=" . $id;
    }
    mysqli_query($conn, $update_query) or die(mysqli_error($conn));
    return true;
}


function deleterecord($table_name)
{
    global $conn;
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    if ($table_name == 'workout') {
        $delete_query = "DELETE FROM workout_plan WHERE workout_id=" . $id;
    } else {
        $delete_query = "DELETE FROM " . $table_name . " WHERE " . $table_name . "_id=" . $id;
    }
    mysqli_query($conn, $delete_query) or die(mysqli_error($conn));
    header("Location: dashboard.php?success=Record deleted successfully");
    return true;
}


if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $get_query = "SELECT * FROM " . $table_name . " WHERE " . $table . "_id=$id";
    $result = mysqli_query($conn, $get_query) or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        foreach ($field_names as $key => $value) {
            $_POST[$value] = $row[$value];
        }
    }
}



// Output the HTML form with the appropriate action URL and button label
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?php echo isset($id) ? 'Update' : 'Insert New'; ?> <?php echo ucfirst($table); ?></title>
    <link rel="stylesheet" href="insert.css" />
</head>

<body>
    <div class="form">
        <p><a href="dashboard.php">Dashboard</a>
            | <a href="dashboard.php">View Records</a>
        <div>
            <h1><?php echo isset($id) ? 'Update' : 'Insert New'; ?> <?php echo ucfirst($table); ?></h1>
            <form name="form" method="post" action="">
                <?php foreach ($field_names as $key => $value) { ?>
                    <p><input type="text" name="<?php echo $value; ?>" placeholder="Enter <?php echo ucfirst($value); ?>" value="<?php echo isset($_POST[$value]) ? htmlspecialchars($_POST[$value]) : ''; ?>" required /></p>
                <?php } ?>
                <p><input name="submit" type="submit" value="<?php echo isset($id) ? 'Update' : 'Insert'; ?>" /></p>
            </form>
        </div>
    </div>
</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['submit'] == 'Insert') {
        if (insertrecord($table_name, $field_names)) {
            header("Location: dashboard.php?success=Record inserted successfully");
        }
    } else if ($_POST['submit'] == 'Update') {
        if (updaterecord($table_name, $field_names)) {
            header("Location: dashboard.php?success=Record updated successfully");
        }
    }
}
?>