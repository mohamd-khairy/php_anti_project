<?php
session_start();
include_once("src/Google_Client.php");
include_once("src/contrib/Google_Oauth2Service.php");
######### edit details ##########
$clientId = '595760426080-j95roh6mk6tn3mkoerk1plkvlqjfsbiq.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = 'ew9mvYNgtiH1Wrw8Inp8zdVd'; //Google CLIENT SECRET
$redirectUrl = 'http://localhost/anti/index2.php';  //return url (url to script)
$homeUrl = 'http://localhost/anti/index2.php';  //return to home

##################################

$gClient = new Google_Client();
$gClient->setApplicationName('Login');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>