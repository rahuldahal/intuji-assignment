<?php 
  // require("utils/redirect.php");

  // checkPostVariable("login_trigger", "index.php");


  // --- BUSINESS LOGIC ---
  try{require("utils/api.php");

  // Google Client instance from the API
  $client = new Google\Client();

  $client->addScope($scopes);
  $client->setClientId($client_id);
  $client->setRedirectUri($redirect_uri);
  $client->setClientSecret($client_secret);

  $authUrl = $client->createAuthUrl();
  header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL)); }
  catch (Exception $e) {
    // Display the error message
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>