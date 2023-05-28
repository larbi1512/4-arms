<?php
require('../db.php');




// Output the HTML form with the appropriate action URL and button label
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>
        <?php echo isset($id) ? 'Update' : 'Insert New'; ?>
        <?php echo ucfirst($table); ?>
    </title>
    <link rel="stylesheet" href="insert.css" />
</head>

<body>
    <div class="form">
        <p><a href="dashboard.php">Dashboard</a>
            | <a href="dashboard.php">View Records</a>
        <div>
            <h1>
                <?php echo isset($id) ? 'Update' : 'Insert New'; ?>
                <?php echo ucfirst($table); ?>
            </h1>
            <form name="form" method="post" action="">
                <?php foreach ($field_names as $key => $value) { ?>
                    <p><input type="text" name="<?php echo $value; ?>" placeholder="Enter <?php echo ucfirst($value); ?>"
                            value="<?php echo isset($_POST[$value]) ? htmlspecialchars($_POST[$value]) : ''; ?>" required />
                    </p>
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