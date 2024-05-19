<?php

function validateDateTime($dateTime) {
  $d = DateTime::createFromFormat('Y-m-d\TH:i', $dateTime);
  return $d && $d->format('Y-m-d\TH:i') === $dateTime ? $d->format(DateTime::ATOM) : false;
}

function toHumanReadable($iso8601Date) {
  $date = new DateTime($iso8601Date);
  return $date->format('Y-m-d H:i');
}
?>