<?php

use Framework\Router;
use Framework\Database;

require __DIR__ . '/../helpers.php';
require __DIR__ . '/../vendor/autoload.php';

// spl_autoload_register(function ($class) {
//     $path = basePath('Framework/' . $class . '.php');
//     if (file_exists($path)) {
//       require $path;
//     }
//   });


// require basePath('Framework/Database.php');
// require basePath('Framework/Router.php');


$config = require basePath('config/db.php');

$db = new Database($config);

$router = new Router;

$routes = require basePath('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->route($uri);
