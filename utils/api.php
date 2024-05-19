<?php

// Need to start the session for data tracking
session_start();


// import Google's official API for PHP
require_once 'vendor/autoload.php';
require_once 'config.php';

// Google API credentials
$scope = 'https://www.googleapis.com/auth/calendar';

// Google Client instance from the API
$client = new Google_Client();

$client->addScope($scope);

// These variables come from config.php
$client->setClientId($client_id);
$client->setRedirectUri($redirect_uri);
$client->setClientSecret($client_secret);

?>