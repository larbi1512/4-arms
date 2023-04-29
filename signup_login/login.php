<?php
// Start the session
session_start();

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Define and establish a database connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "4-arms";
  $link = mysqli_connect($servername, $username, $password, $dbname);

  // Check if connection is successful
  if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Check if the email and password fields are not empty
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

  // Validate email format
  if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
    $user_email_err = "Please enter a valid email format.";
  }

  // Validate password complexity
  $password_regex = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d\s:])([^\s]){8,}$/";
  if (!preg_match($password_regex, $user_password)) {
    $user_password_err = "Your password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
  }

  // If there are no errors, proceed to login
  if (empty($user_email_err) && empty($user_password_err)) {

    // Prepare a select statement
    $sql = "SELECT user_email, user_password FROM `user_signup` WHERE user_email = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_user_email);

      // Set parameters
      $param_user_email = $user_email;

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Store result
        mysqli_stmt_store_result($stmt);

        // Check if user_email exists, if yes then verify user_password
        if (mysqli_stmt_num_rows($stmt) == 1) {
          // Bind result variables
          mysqli_stmt_bind_result($stmt, $user_email, $hashed_user_password);
          if (mysqli_stmt_fetch($stmt)) {
                        if(password_verify($user_password, $hashed_user_password)){
                            // user_password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["user_email"] = $user_email;                            

                            // Redirect user to welcome page
                            header("location: ../../NewHome/newHome.html");
                            exit();

                        } 
                    }
                } 
            } 
            
            
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>
