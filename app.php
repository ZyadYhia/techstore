<?php
// paths & urls
define("PATH", __DIR__ . "/");
define("URL","http://localhost/techstore/");
//DB credentials
define('DB_SERVERNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'techstore');
require_once(PATH . "vendor/autoload.php");
use TechStore\Classes\Request;
use TechStore\Classes\Session;

$request = new Request;
$session = new Session;