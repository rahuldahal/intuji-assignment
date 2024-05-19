<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Intuji Calendar</title>
</head>
<body>
  <h1>Intuji Calendar</h1>

  <?php
    if(!isset($_SESSION['access_token'])){
      echo '<form action="login.php" method="post">';
      echo '<input type="submit" name="login_trigger" value="Login via Google" />';
      echo '</form>';
      exit;
    }
  ?>



  <a href="calendar.php">List Events</a>
  <a href="create_event.php">Create Event</a>

  <?php
    if(isset($_SESSION['access_token'])) {
        echo '<form method="post" action="disconnect.php">';
        echo '<input type="submit" name="disconnect" value="Disconnect Plugin">';
        echo '</form>';
    }
?>

</body>
</html>