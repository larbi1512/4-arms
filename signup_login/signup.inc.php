<?php
require_once('../db.php');

// Retrieve form values
$user_name = $_POST["user_name"];
$user_email = $_POST["user_email"];
$user_password = $_POST["user_password"];
$height = $_POST["height"];
$weight = $_POST["weight"];
global $conn;
if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
  $_SESSION['message'] = 'Please enter a valid email address.';
  header("Location: signup.php");
  exit();
}
if (strlen($_POST['user_password']) < 8) {
  $_SESSION['error_message'] = 'Password must be at least 8 characters long.';
  header("Location: signup.php");
  exit();
}
// Check if username already exists
$sql = "SELECT * FROM user_signup WHERE user_name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $user_name);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
if ($result->num_rows > 0) {
  $_SESSION['error_message'] = 'Username already used. Please try again.';
  header("Location: signup.php");
  exit();
}
// Check if email already exists
$sql = "SELECT * FROM user_signup WHERE user_email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $user_email);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
$user_password = password_hash($user_password, PASSWORD_DEFAULT);
if ($result->num_rows > 0) {
  $_SESSION['error_message'] = 'Email already used. Please try again.';
  header("Location: signup.php");
  exit();
}
// Check if height and weight are valid
if (!is_numeric($height) || !is_numeric($weight)) {
  $_SESSION['error_message'] = 'Height and weight must be numeric values.';
  header("Location: signup.php");
  exit();
}
// Insert new user into database
$sql = "INSERT INTO user_signup (user_name, user_email, user_password, height , weight)
VALUES (?, ?, ?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sssii', $user_name, $user_email,  $user_password, $height, $weight);
$stmt->execute();
$stmt->close();


echo "New record created successfully";
header("location: login.php");
exit();
// Close connection to database
$conn->close();
