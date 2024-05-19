<?php

// Google API credentials
$scopes = ['calendar'];
$client_secret = '';
$redirect_uri = 'http://localhost/intuji-assignment/callback.php';
$client_id = '';


// Need to start the session for data tracking
session_start();


// import Google's official API for PHP
require_once __DIR__ . '/../google-api-php-client/src/Client.php';
require_once __DIR__ . '/../google-api-php-client/src/Model.php';
// require_once __DIR__ . '/google-api-php-services/src/Oauth2/[]';
require_once __DIR__ . '/../google-api-php-client-services/src/Calendar/Calendar.php';

?>