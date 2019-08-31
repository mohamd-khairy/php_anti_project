<?php

session_start();
//session_destroy();
define("HOME_PAGE", 'Home');
require_once '../config.php';
Router::loadController();
?>