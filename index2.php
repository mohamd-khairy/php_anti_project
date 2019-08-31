<?php

include_once("config1.php");
include_once("includes/functions.php");

//print_r($_GET);die;

if (isset($_REQUEST['code'])) {
    $gClient->authenticate();
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($redirectUrl, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
    $gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
    $userProfile = $google_oauthV2->userinfo->get();
    //DB Insert
    $gUser = new Users();
    $gUser->checkUser('google', $userProfile['id'], $userProfile['given_name'], $userProfile['family_name'], $userProfile['email'], $userProfile['gender'], $userProfile['locale'], $userProfile['link'], $userProfile['picture']);
    $_SESSION['google_data'] = $userProfile; // Storing Google User Data in Session

    header("location:index.php?rt=HomePage/google");
    
    $_SESSION['token'] = $gClient->getAccessToken();
} else {
    $authUrl = $gClient->createAuthUrl();
}

if (isset($authUrl)) {
    header('location: ' . $authUrl);
} else {
 //   header('location: logout.php?logout');
   echo '<a href="logout.php?logout">Logout</a>';
}
?>