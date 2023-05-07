<?php
require_once('../db.php');
$choice = $_GET["choice"];
$user_id = $_SESSION["user_id"];
// Replace the placeholders with actual values
$sql = "INSERT INTO assigned (user_id, workout_id, diet_id, gym_id) VALUES (1, '$choice', '$choice', NULL)";


// Execute the query
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("location: QUIZQuestion4.html");
  exit();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
