<?php
  include("connection.php");
  date_default_timezone_set('Asia/Manila');

  ## sign_up
  if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = mysqli_query($db, "INSERT INTO users (`name`, `username`, `password`) VALUES ('$name', '$username', '$password')");
    if ($user) {
      header("Location: login.php");
    } else {
      echo "User creation failed successfully";
    }
  }

  ## sign_in
  if (isset($_GET['signin'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];
    $user = mysqli_query($db, "SELECT * FROM users WHERE username='".$username."' AND password='".$password."' limit 1");
    $result = mysqli_fetch_array($user);
    session_start();
    if (mysqli_num_rows($user) > 0) {
      $update_status = "UPDATE `users` SET `status`='1' WHERE id=".$result["id"];
      if (mysqli_query($db, $update_status)) {
        mysqli_refresh($db, MYSQLI_REFRESH_SLAVE);
        $_SESSION["id"] = $result["id"];
        $_SESSION["name"] = $result["name"];
        header("Location: index.php");
      }
    } else {
      // echo "wronging";
      header("Location: login.php");
    }
  }

  ## creating message
  if (!empty($_POST["content"])) {
    session_start();
    $user_id =  $_SESSION["id"];
    $content = htmlspecialchars($_POST['content'], ENT_QUOTES);
    $date = date('d-m-y h:i:s');
    $message = mysqli_query($db, "INSERT INTO messages(`user_id`, `content`, `date`) VALUES ('$user_id', '$content', '$date')");
    if ($message) {
      header("Location: index.php");
    } else {
      echo "Message creation failed successfully";
    }
  }
?>