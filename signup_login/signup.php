<?php
// Connect to the database
$host = "sql209.epizy.com";
$dbuser = "epiz_34106685";
$dbpass = "f@7EbG#KFdr3tvH";
$dbname = "epiz_34106685_4ARMS";
// Create database connection
$conn = new mysqli($host, $dbuser, $dbpass, $dbname);

// Checking connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form values
$user_name = $_POST["user_name"];
$user_email = $_POST["user_email"];
$user_ID = $_POST["user_ID"];
$user_password = $_POST["user_password"];
$age = $_POST["age"];
$gender = $_POST["gender"];


// hashing the password
$user_password = password_hash($user_password, PASSWORD_DEFAULT);

// Insert form values into database
$sql = "INSERT INTO user_signup (user_name, user_email, user_ID, user_password, age, gender)
VALUES ('$user_name', '$user_email', '$user_ID', '$user_password', '$age', '$gender')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
header("location: login.html");
exit();
// Close database connection
mysqli_close($conn);
