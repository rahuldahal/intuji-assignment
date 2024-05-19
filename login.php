<?php 

// --- BUSINESS LOGIC ---
  require("utils/api.php");

  $authUrl = $client->createAuthUrl();
  header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));

?>