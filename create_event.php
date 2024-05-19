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

    echo '<div class="alert alert-success" role="alert">Event created: <a href="' . $createdEvent->htmlLink . '" target="_blank">View on Google</a></div>';
    echo '<p><a href="calendar.php">View Here</a></p>';
  } catch (Exception $e) {
      echo '<div class="alert alert-danger" role="alert">Error creating the event: ' . $e->getMessage() . '</div>';
  }
}
?>

<h2 class="mb-5">Create Event</h2>
<form method="POST" action="create_event.php">
  <div class="form-group mb-3">
    <label for="title">Title:</label>
    <input autofocus type="text" class="form-control" name="title" id="title" required>
  </div>
  <div class="form-group mb-3">
    <label for="description">Description:</label>
    <textarea class="form-control" name="description" id="description"></textarea>
  </div>
  <div class="form-group mb-3">
    <label for="location">Location:</label>
    <input type="text" class="form-control" name="location" id="location">
  </div>
  <div class="form-group mb-3">
    <label for="start">Start:</label>
    <input type="datetime-local" class="form-control" name="start" id="start" required>
  </div>
  <div class="form-group mb-3">
    <label for="end">End:</label>
    <input type="datetime-local" class="form-control" name="end" id="end" required>
  </div>

  <button type="submit" class="btn btn-primary mt-3" name="create_event">Create Event</button>
</form>

</main>
</body>
</html>
