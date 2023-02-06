<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); //E_ALL

const ROOTDIR = __DIR__;
require_once(ROOTDIR."/vendor/autoload.php");
require_once(ROOTDIR."/src/.env");
require_once(ROOTDIR."/src/app/bootstrap.php");
?>
<link rel="shortcut icon" href="/skills/public/img/favicon.ico">