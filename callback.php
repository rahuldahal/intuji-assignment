<?php

require("utils/api.php");

use Google\Service\Calendar;

if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  if (isset($token['error'])) {
      echo 'Oops!! Authorization failed: ' . $token['error'];
      exit;
  }

  $client->setAccessToken($token);
  $_SESSION['access_token'] = $token;

  $calendarService = new Calendar($client); // Here, Calendar = Google\Service\Calendar

  // get calendar list from API
  $calendarList = $calendarService->calendarList->listCalendarList();

  // store data in the "user_calendars" session
  $_SESSION['user_calendars'] = $calendarList->getItems();

  header('Location: calendar.php');
  exit;
} else {
  echo 'Oops!! Authorization failed.';
}
?>
