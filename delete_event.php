<?php

require('includes/header.php');
require_once 'vendor/autoload.php';
require('utils/api.php');

use Google\Service\Calendar;

// If not logged in, ask them to
if (!isset($_SESSION['access_token'])) {
  header('Location: login.php');
  exit;
}

$client->setAccessToken($_SESSION['access_token']);

$calendarService = new Calendar($client);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if(isset($_POST["event_id"])) {
    $event_id = $_POST["event_id"];

    try {
      // Delete the event
      $calendarService->events->delete('primary', $event_id);
      echo '<div class="alert alert-success" role="alert">Event deleted successfully.</div>';
    } catch (Exception $e) {
      echo '<div class="alert alert-danger" role="alert">Error deleting event: ' . $e->getMessage() . '</div>';
    }
  } else {
      echo '<div class="alert alert-warning" role="alert">Event ID not provided.</div>';
  }
} else {
    echo '<div class="alert alert-danger" role="alert">Invalid request method.</div>';
}

echo '<p>Redirecting in 3 seconds... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></p>';

header("refresh:3;url=calendar.php");
?>

</main>
</body>
</html>