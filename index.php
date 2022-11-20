<?php
  session_start();
  if(!isset($_SESSION["id"])) {
    header("Location: login.php");
  }
  include("connection.php");
?>
<html>
  <head>
    <title>ChatBox</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <!-- logout -->
    <div class="header-wrapper">
      <div class="current-user">
        <?php echo $_SESSION["name"] ?>
      </div>
      <div class="logout-wrapper">
        <a href="logout.php">Logout</a>
      </div>
    </div>
    <div class="chatbox-container">
      <!-- user lists -->
      <div class="user-container">
        <?php include("_online_users.php") ?>
      </div>
      <!-- conversation -->
      <div class="convo-container">
        <div class="convo-inner-container">
          <?php include("_conversation.php") ?>
        </div>
      </div>
      <!-- chat tool -->
      <form action="actions.php" method="POST">
        <div class="input-container">
          <textarea name="content" class="input-area" placeholder="Type..."></textarea>
          <button class="send-btn">send</button>
        </div>
      </form>
    </div>
  </body>
</html>