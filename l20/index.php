<?php
session_start();
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
define('ROOT', dirname(__FILE__));
define('RESOURSES',"/artinovweb/resourses");
define('LOCALPATH',"/artinovweb/l20");
require_once "classes/avtoload.php";
$router = new Router();
$router->run();
