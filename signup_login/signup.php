<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="global.css" />
  <link rel="stylesheet" href="signup.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500;700&family=Roboto:wght@400;500&family=Poppins:wght@500;600&family=Open+Sans:wght@400;600&family=Inter:wght@700&display=swap" />
</head>

<body>
  <div class="signup-form">
    <?php
    session_start();
    if (isset($_SESSION['error_message'])) {
      echo '<p class="error">' . $_SESSION['error_message'] . '</p>';
      unset($_SESSION['error_message']); // unset the session variable after displaying the message
    }
    ?>
    <form method="POST" action="signup.inc.php">

      <p class="create-an-account1">Create an account</p>
      <div class="form-group">
        <div class="label">Name :</div>
        <input class="create-an-account-child" type="text" name="user_name" placeholder="Enter Your Username" required />
      </div>

      <div class="form-group">
        <div class="label">Email :</div>
        <input class="create-an-account-child" type="email" name="user_email" placeholder="Enter Your E-mail" required />
      </div>

      <div class="form-group">
        <div class="label">Password :</div>
        <input class="create-an-account-child" type="password" name="user_password" placeholder="Enter Your Password" required />
      </div>

      <div class="form-group">
        <div class="label">Height :</div>
        <input type="number" name="height" min="140" max="220" placeholder="Enter your Height">
      </div>

      <div class="form-group">
        <div class="label">Weight</div>
        <input type="number" name="weight" min="40" max="200" placeholder="Enter your Weight">
      </div>

      <button type="submit" class="create-account">Create account</button>
    </form>

    <div class="already-have-an-container">
      <span class="already-have-an">Already have an account ? </span><span class="log-in"><a href="login.php">Login</a></span>
    </div>

  </div>


  </div>
  <div class="frame-parent">
    <div class="logo">
      <img class="frame-icon" alt="" src="./public/frame.svg" />
      <h3 class="arms">4-ARMS</h3>
    </div>
    <div class="hello-welcome">Hello, Welcome !</div>
    <div class="let-begin-your">Let Begin your fitness journey!</div>
  </div>

</body>

</html>