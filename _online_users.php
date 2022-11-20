<?php  $users = mysqli_query($db, "SELECT * FROM users WHERE status='1' AND id!=".$_SESSION["id"].""); ?>
<div class="online-user-container">
  <span><b>Online Users</b></span>
  <?php
    while($user_row = mysqli_fetch_array($users, MYSQLI_ASSOC)) {
  ?>
  <div class="user-name">
    <?php echo $user_row["name"] ?>
  </div>
  <?php
    }
  ?>
</div>