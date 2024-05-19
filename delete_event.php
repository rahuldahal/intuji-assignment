<?php

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
      echo "Event deleted successfully.";
    } catch (Exception $e) {
      echo 'Error deleting event: ' . $e->getMessage();
    }
  } else {
      echo "Event ID not provided.";
  }
} else {
    echo "Invalid request method.";
}

// redirect after 3 seconds
echo '<p>Will redirect automatically in 3 seconds!</p>';
header("refresh:3;url=calendar.php");
?>
