<?php

require("includes/header.php");
require_once 'vendor/autoload.php';
require('utils/api.php');
require('utils/dateTime.php');

use Google\Service\Calendar;

// If not logged in, redirect to login page
if (!isset($_SESSION['access_token'])) {
  header('Location: login.php');
  exit;
}

$client->setAccessToken($_SESSION['access_token']);

$calendarService = new Calendar($client);

// Display calendar events
$calendarId = 'primary';
$events = $calendarService->events->listEvents($calendarId);

echo '<a href="create_event.php" class="btn btn-primary">Create Event</a>';
echo '<h1 class="mt-3 mb-5">Events</h1>';

if (count($events->getItems()) == 0) {
  echo '<p class="no_events">No upcoming events found.</p>';
  echo '<a href="create_event.php" class="btn btn-primary mb-3">Create Event</a>';
} else {
  echo '<ul class="list-group mb-3">';
  foreach ($events->getItems() as $event) {
    $start = $event->start->dateTime;
    $link = $event->htmlLink;

    if (empty($start)) {
      $start = $event->start->date;
    }

    // Display the title and date
    echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
    echo $event->getSummary() . ' (' . toHumanReadable($start) . ')';
    echo '<a href="' . $link . '" target="_blank" class="btn btn-secondary">See on Calendar</a>';

    // The Delete button alongside
    echo '<form method="post" action="delete_event.php">';
    echo '<input type="hidden" name="event_id" value="' . $event->id . '">';
    echo '<button type="submit" class="btn btn-danger">Delete</button>';
    echo '</form>';

    echo '</li>';
  }
  echo "</ul>";
}
?>

</main>
</body>
</html>