<?php

require_once 'vendor/autoload.php';
require('utils/api.php');
require('utils/dateTime.php');

use Google\Service\Calendar;

// If not logged in, ask them to
if (!isset($_SESSION['access_token'])) {
    header('Location: login.php');
    exit;
}


$client->setAccessToken($_SESSION['access_token']);

$calendarService = new Calendar($client);

// Display calendar events
$calendarId = 'primary';
$events = $calendarService->events->listEvents($calendarId);

echo '<h1>Events</h1>';

if (count($events->getItems()) == 0) {

  echo '<p class="no_events">No upcoming events found.</p>';
  echo '<a href="create_event.php">Create Event</a>';

} else {
  echo '<ul>';

  foreach ($events->getItems() as $event) {
    $start = $event->start->dateTime;
    $link = $event->htmlLink;

    if (empty($start)) {
      $start = $event->start->date;
    }
  
    // Display the title and date
    echo '<li>' . $event->getSummary() . ' (' . toHumanReadable($start) . ') <a href="'. $link . '" target="_blank">See on Calendar</a>';

    // The Delete button alongside
    echo '<form method="post" action="delete_event.php">';
    echo '<input type="hidden" name="event_id" value="' . $event->id . '">';
    echo '<input type="submit" value="Delete">';
    echo '</form>';
  }

  echo "</ul>";
}

?>


<a href="create_event.php">Create Event</a>