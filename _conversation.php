<?php
  $message_sql = mysqli_query($db, "SELECT * FROM messages");
  while($message_row = mysqli_fetch_array($message_sql, MYSQLI_ASSOC)) {
    if ($message_row["user_id"] == $_SESSION["id"]) {
?>                
<div class="convo-wrapper">
  <div class="own-message">
    <?php echo $message_row["content"] ?>
  </div>
</div>
<?php
  } else {
?>
<div class="convo-wrapper">
  <div>
    <?php
      $previous_message = mysqli_query($db, "SELECT * FROM messages WHERE id < ".$message_row['id']." ORDER BY id DESC limit 1");
      if (mysqli_num_rows($previous_message) != 0) {
        while($previous_row = mysqli_fetch_array($previous_message, MYSQLI_ASSOC)) {
          if ($previous_row["user_id"] != $message_row['user_id']) {
    ?>
      <span class="convo-name">
        <?php 
          $user = mysqli_query($db, "SELECT * FROM users WHERE id = ".$message_row['user_id']." limit 1");
          echo mysqli_fetch_array($user, MYSQLI_ASSOC)["name"];
        ?>
      </span>
    <?php
          }
        }
      } else {
    ?>
      <span class="convo-name">
        <?php 
          $user = mysqli_query($db, "SELECT * FROM users WHERE id = ".$message_row['user_id']." limit 1");
          echo mysqli_fetch_array($user, MYSQLI_ASSOC)["name"];
        ?>
      </span>
    <?php  
      }
    ?>
    <div class="other-message">
      <?php echo $message_row["content"] ?>
    </div>
  </div>
</div>
<?php      
    }
  }
?>