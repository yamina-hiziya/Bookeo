<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('ROOT_PATH', __DIR__);
define('BASE_URL', '/Bookeo/');

spl_autoload_register();

use App\Controller\Controller;

$controller = new Controller();
$controller->route('page');
