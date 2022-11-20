<?php
  session_start();
  if(isset($_SESSION["id"])) {
    header("Location: index.php");
  }
?>
<html>
  <head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="login-container">
      <form action="actions.php" method="POST">
        <h2>Sign Up</h2>
        <input type="text" name="name" placeholder="name" class="input-form" required>
        <input type="text" name="username" placeholder="username" class="input-form" required>
        <input type="password" name="password" placeholder="password" class="input-form" required>
        <input type="submit" name="signup" value="SIGN UP" class="input-form">
      </form>
      <a href="login.php">Login</a> instead
    </div>
  </body>
</html>