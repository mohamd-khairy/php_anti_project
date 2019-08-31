<?php
include_once("inc/facebook.php"); //include facebook SDK
######### Facebook API Configuration ##########
$appId = '332429183816036'; //Facebook App ID
$appSecret = 'bae7b45268c85fbaac323cb185b4ff00'; // Facebook App Secret
$homeurl = 'http://localhost/anti/index3.php';  //return to home
$fbPermissions = 'email';  //Required facebook permissions
//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret

));
$fbuser = $facebook->getUser();
?>