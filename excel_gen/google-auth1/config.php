<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('827275232615-9j4dc5f1m69dfd2cird35cao2ivnskii.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/tpc-main/excel_gen/google-auth/index.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');
