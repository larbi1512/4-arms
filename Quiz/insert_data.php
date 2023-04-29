<?php
session_start();
$choice = $_GET["choice"];
$user_id=$_SESSION["user_id"];
// Replace the placeholders with actual values
$sql = "INSERT INTO assigned (user_id, workout_id, diet_id, gym_id) VALUES (1, '$choice', '$choice', NULL)";

// Connect to the database
$servername = "localhost"; // Replace with your servername
$username = "root"; // Replace with your username
$password = ""; // Replace with your password
$dbname = "4-arms"; // Replace with your database name
$conn = new mysqli($servername, $username, $password, $dbname);

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
