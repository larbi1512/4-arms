<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="global.css" />
  <link rel="stylesheet" href="signup.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500;700&family=Roboto:wght@400;500&family=Poppins:wght@500;600&family=Open+Sans:wght@400;600&family=Inter:wght@700&display=swap" />
</head>

<body>

  <div class="frame-parent">
    <div class="logo">
      <img class="frame-icon" alt="" src="./public/frame.svg" />
      <h3 class="arms">4-ARMS</h3>
    </div>
    <div class="hello-welcome">Hello, Welcome !</div>
    <div class="let-begin-your">Let Begin your fitness journey!</div>
  </div>

  <!-- form -->
  <form method="POST" action="signup.inc.php" id="signup-form">
    <div class="form-group">
      <p class="create">Create an account</p>
      <?php
      session_start();
      if (isset($_SESSION['error_message'])) {
        echo '<p class="error">' . $_SESSION['error_message'] . '</p>';
        unset($_SESSION['error_message']); // unset the session variable after displaying the message
      }
      ?>
    </div>
    <div class="form-group">
      <label>Email :</label>
      <input class="form-control" type="email" name="user_email" placeholder="Enter Your E-mail" required />
    </div>
    <div class="form-group">
      <label>Name :</label>
      <input class="form-control" type="text" name="user_name" placeholder="Enter Your Username" required />
    </div>
    <div class="form-group">
      <label>Password :</label>
      <input class="form-control" type="password" name="user_password" placeholder="Enter Your Password" required />
    </div>
    <div class="form-group">
      <label>Height :</label>
      <input type="number" name="height" min="140" max="300" placeholder="Enter your Height">
    </div>
    <div class="form-group">
      <label>Weight</label>
      <input type="number" name="weight" min="40" max="200" placeholder="Enter your Weight">
    </div>
    <div class="form-group">
      <button type="submit" class="submit">Create account</button>
    </div>
    <div class="form-group">
      <span class="already-have-an">Already have an account ? </span><span class="log-in"><a href="login.php">Login</a></span>
    </div>
    </div>

  </form>


</body>

</html>