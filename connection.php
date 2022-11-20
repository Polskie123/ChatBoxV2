<?php
  $db = mysqli_connect("localhost","root","","chatbox");
  if(!$db) { 
    die("Connection failed: " . mysqli_connect_error());	
  }
?>