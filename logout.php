<?php
  include("connection.php");
  session_start();
  $update_status = "UPDATE `users` SET `status`='0' WHERE id=".$_SESSION["id"];
  if (mysqli_query($db, $update_status)) {    
    session_destroy();
    header("Location: login.php");
  }
  exit;
?>