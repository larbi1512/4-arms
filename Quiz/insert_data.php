<?php
session_start();
$choice = $_GET["choice"];
$user_id=$_SESSION["user_id"];
// Replace the placeholders with actual values
$sql = "INSERT INTO assigned (user_id, workout_id, diet_id, gym_id) VALUES (1, '$choice', '$choice', NULL)";

// Connect to the database
$host = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "4-arms";
// Create database connection
$conn = new mysqli($host, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Execute the query
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("location: QUIZQuestion4.html");
  exit();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
