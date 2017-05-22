<?php
session_start();
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
define('ROOT', dirname(__FILE__));
define('LOCALPATH',"/l19");
require_once "classes/avtoload.php";
// require_once "classes/Db.php";
// require_once "classes/Router.php";
$router = new Router();
$router->run();
