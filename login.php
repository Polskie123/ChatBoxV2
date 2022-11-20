<?php
  session_start();
  if(isset($_SESSION["id"])) {
    header("Location: index.php");
  }
?>
<html>
  <head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="login-container">
      <form action="actions.php" method="GET">
        <h2>LOGIN</h2>
        <input type="text" name="username" placeholder="username" class="input-form" required>
        <input type="password" name="password" placeholder="password" class="input-form" required>
        <input type="submit" name="signin" value="LOGIN" class="input-form">
      </form>
      No Account? <a href="signup.php">Sign up</a>
    </div>
  </body>
</html>