<?php

session_start();
define("HOME_PAGE", 'HomePage');
require_once './config.php';
router::loadcontroller();
?>