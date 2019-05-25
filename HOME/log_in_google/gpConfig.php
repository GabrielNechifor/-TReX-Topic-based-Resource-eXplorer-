<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '914786618424-hro24j387dqhuusddgg892iuvac5qqna.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'muHECTRbWe4PQyHJYaLBRkk9'; //Google client secret
$redirectURL = 'http://localhost/-TReX-Topic-based-Resource-eXplorer-/HOME/'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login with Google');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>