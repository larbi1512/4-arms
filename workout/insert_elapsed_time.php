<?php
// Get the elapsed time from the AJAX request
$elapsed_time = $_POST['elapsed_time'];
$month = $_POST['month'];
$elapsed_time = $elapsed_time/3600;
// Insert the elapsed time into a database table
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "4-arms";
$user_id=1;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO activity VALUES ($user_id,$month,$elapsed_time)";

if (mysqli_query($conn, $sql)) {
   //
} else {
    echo "Error inserting elapsed time: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
