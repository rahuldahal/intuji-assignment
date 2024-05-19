<?php

  // Well, need to first access the session in order to delete them.
  session_start();

  session_unset();
  session_destroy();

  header('Location: index.php');
  exit;
?>
