      <!DOCTYPE html>
      <html>

      <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="initial-scale=1, width=device-width" />
        <link rel="stylesheet" href="global.css" />
        <link rel="stylesheet" href="login.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Google Sans:wght@400;500;700&display=swap,Roboto:wght@400;500&display=swap,Poppins:wght@500;600&display=swap,Open Sans:wght@400;600&display=swap,Inter:wght@700&display=swap" />
        <title>Log In</title>
      </head>

      <body>
        <div class="login-form">
          <?php
          session_start();
          if (isset($_SESSION['error_message'])) {
            echo '<p class="error">' . $_SESSION['error_message'] . '</p>';
            unset($_SESSION['error_message']); // unset the session variable after displaying the message
          }
          ?>
          <form method="POST" action="login.inc.php">
            <div class="call-to-action">
              <h3>Log in to your account</h3>
            </div>

            <div>
              <label for="email">Email:</label>
              <input class="form-input" type="email" name="user_email" placeholder="Enter Your Email" required />
              <br><br>
              <label for="Password">Password:</label>
              <input class="form-input" type="password" name="user_password" placeholder="Enter your password" required />
            </div>
            <div>
              <button class="login-button" type="submit">LOGIN</button>
            </div>
          </form>
          <h3 class="dont-have-an-account">
            Don't have an account ?<a href="signup.php"> SIGN UP !</a>
          </h3>
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