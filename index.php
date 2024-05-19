<?php
  session_start();

  require("includes/header.php");

  if(!isset($_SESSION['access_token'])){
    echo '<form action="login.php" method="post">';
    echo '<input type="submit" class="btn btn-primary" name="login_trigger" value="Login via Google" />';
    echo '</form>';
    exit;
  }
?>

<h2>Actions</h2>

<a href="calendar.php" class="btn btn-success">List Events</a>
<a href="create_event.php" class="btn btn-info">Create Event</a>

<?php
  if(isset($_SESSION['access_token'])) {
    echo '<form method="post" action="disconnect.php" class="mt-5">';
    echo '<button type="submit" class="btn btn-danger" name="disconnect">Disconnect Plugin</button>';
    echo '</form>';
  }
?>

</main>
</body>
</html>