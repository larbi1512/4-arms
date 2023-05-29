<?php
require_once('../db.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user_email_err = "";
  $user_password_err = "";
  $user_email = "";
  $user_password = "";

  if (empty(trim($_POST["user_email"]))) {
    $user_email_err = "Please enter your email.";
  } else {
    $user_email = trim($_POST["user_email"]);
  }


  if (empty(trim($_POST["user_password"]))) {
    $user_password_err = "Please enter your password.";
  } else {
    $user_password = trim($_POST["user_password"]);
  }


  if (!empty($user_email_err) || !empty($user_password_err)) {
    $_SESSION['error_message'] = 'Invalid email or password';
    header("location: login.php?error=invalid");
    exit();
  }

  if (empty($user_email_err) && empty($user_password_err)) {
    // Prepare a select statement
    $sql = "SELECT user_ID, user_email, user_password FROM `user_signup` WHERE user_email = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_user_email);
      // Set parameters
      $param_user_email = $user_email;
      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Store result
        mysqli_stmt_store_result($stmt);
        // Check if username exists, if yes then verify password
        if (mysqli_stmt_num_rows($stmt) == 1) {
          // Bind result variables
          mysqli_stmt_bind_result($stmt, $user_id, $user_email, $hashed_user_password);

          if (mysqli_stmt_fetch($stmt)) {
            if (password_verify($user_password, $hashed_user_password)) {
              // Password is correct, so start a new session
              session_start();
              // Store data in session variables
              $_SESSION["logged"] = true;
              $_SESSION["user_email"] = $user_email;
              $_SESSION["user_id"] = $user_id;
              // Redirect user to welcome page
              header("location: ../NewHome/newHome.php?login=success");
              exit();
            } else {
              // Display an error message if password is not valid
              $_SESSION['error_message'] = 'Invalid email or password';
              header("location: login.php?error=invalid");
              exit();
            }
          }
        } else {
          // Display an error message if username doesn't exist
          $_SESSION['error_message'] = 'Invalid email or password';
          header("location: login.php?error=invalid");
          exit();
        }
      } else {
        $_SESSION['error_message'] = 'Invalid email or password';
        header("location: login.php?error=invalid");
        exit();
      }
    }
    // Close statement
    mysqli_stmt_close($stmt);
  }
}
