<?php
session_start();
require_once('../db.php');

// Retrieve form values
$user_name = $_POST["user_name"];
$user_email = $_POST["user_email"];
$user_password = $_POST["user_password"];
$height = $_POST["height"];
$weight = $_POST["weight"];

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
if ($result->num_rows > 0) {
  $_SESSION['error_message'] = 'Email already used. Please try again.';
  header("Location: signup.php");
  exit();
}

if (strlen($_POST['user_password']) < 8) {
  $_SESSION['error_message'] = 'Password must be at least 8 characters long.';
  header("Location: signup.php");
  exit();
}


$user_password = password_hash($user_password, PASSWORD_DEFAULT);
// Insert new user into database
if (isset($_SESSION["gender"])) {
  $sql = "INSERT INTO user_signup (user_name, user_email, user_password, gender, height , weight)
  VALUES (?, ?, ?, ?,?,?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('ssssii', $user_name, $user_email,  $user_password, $_SESSION["gender"], $height, $weight);
} else {
  $sql = "INSERT INTO user_signup (user_name, user_email, user_password, height , weight)
VALUES (?, ?, ?,?,?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('sssii', $user_name, $user_email,  $user_password, $height, $weight);
}
$stmt->execute();

if (isset($_SESSION["choice"])) {
  $new_user = $stmt->insert_id;
  $choice = $_SESSION["choice"];
  $sql = "INSERT INTO assigned (user_id, workout_id, diet_id) VALUES (?,?,?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('iii', $new_user, $choice, $choice);
  $stmt->execute();
}


header("location: login.php?signup=success");
exit();
