<?php

// Google API credentials
$scopes = ['calendar'];
$client_secret = '';
$redirect_uri = 'http://localhost/intuji-assignment/callback.php';
$client_id = '';


// Need to start the session for data tracking
session_start();


// import Google's official API for PHP
require_once 'vendor/autoload.php';

?>