<?php

// Need to start the session for data tracking
session_start();


// import Google's official API for PHP
require_once 'vendor/autoload.php';
require_once 'config.php';

// Google API credentials
$scope = 'https://www.googleapis.com/auth/calendar';

?>