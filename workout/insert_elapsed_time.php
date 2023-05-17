<?php
require_once "../db.php";
session_start();
$user_id = $_SESSION["user_id"] ?? 1;
// Get the elapsed time from the AJAX request
$elapsed_time = $_POST['elapsed_time'];
$month = $_POST['month'];
$elapsed_time = $elapsed_time / 3600;
$sql = "INSERT INTO activity VALUES ($user_id,$month,$elapsed_time)";

if (mysqli_query($conn, $sql)) {
    header("location: workout.php");
    exit();
} else {
    echo "Error inserting elapsed time: " . mysqli_error($conn);
}
mysqli_close($conn);
