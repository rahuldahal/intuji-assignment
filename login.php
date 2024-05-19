<?php 

// --- BUSINESS LOGIC ---
  require("utils/api.php");

  // Google Client instance from the API
  $client = new Google_Client();

  $client->addScope($scope);
  $client->setClientId($client_id);
  $client->setRedirectUri($redirect_uri);
  $client->setClientSecret($client_secret);

  $authUrl = $client->createAuthUrl();
  header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));

?>