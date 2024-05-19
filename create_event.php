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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $start = validateDateTime($_POST['start']);
  $end = validateDateTime($_POST['end']);

  try {
    $event = new Calendar\Event([
      'summary' => $_POST['title'], // In Google calendar, title == summary
      'location' => $_POST['location'],
      'description' => $_POST['description'],
      'start' => [
        'dateTime' => $start,
        'timeZone' => 'Asia/Kathmandu',
      ],
      'end' => [
        'dateTime' => $end,
        'timeZone' => 'Asia/Kathmandu',
      ],
    ]);

    $calendarId = 'primary';
    $createdEvent = $calendarService->events->insert($calendarId, $event);

    echo '<p class="creation_success">Event created: <a href="' . $createdEvent->htmlLink . '" target="_blank">View on Google</a></p>';

    echo '<p><a href="calendar.php">View Here</a></p>';
    } catch (Exception $e) {
        echo '<p class="creation_error">Error creating the event: ' . $e->getMessage() . '</p>';
    }
}
?>


<h2>Create Event</h2>
<form method="POST" action="create_event.php">
  <label for="title">Title:</label>
  <input type="text" name="title" id="title" required><br>
  
  <label for="description">Description:</label>
  <textarea name="description" id="description"></textarea><br>

  <label for="location">Location:</label>
  <input type="text" name="location" id="location"><br>

  <label for="start">Start:</label>
  <input type="datetime-local" name="start" id="start" required><br>

  <label for="end">End:</label>
  <input type="datetime-local" name="end" id="end" required><br>

  <input type="submit" name="create_event" value="Create Event" />
</form>
