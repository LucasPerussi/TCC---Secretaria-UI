<?php
use Siler\Route;

use function Siler\GraphQL\publish;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "vendor/autoload.php";
require_once "autoload.php";

$GLOBALS['connections_created'] = 0;
$GLOBALS['queries'] = 0;
$GLOBALS['total_query_time'] = 0;

session_start();

$GLOBALS["app"] = new Api\Controller\App();
$app = $GLOBALS["app"];

$error_template = [
    "error" => false,
    "message" => "",
];


$routes = [];
$router = (new API\Router\View\Route())->getRoutes();
array_push($routes, ...$router);
$router = (new API\Router\Action\Route())->getRoutes();
array_push($routes, ...$router);



foreach($routes as $route) {
    Route\route(...$route);
}

if (!Route\did_match()) {
    $path = $_SERVER['REQUEST_URI'];
    $extension = pathinfo($path, PATHINFO_EXTENSION);

    // Verifica se a extensão é .js ou .css
    if ($extension === 'js' || $extension === 'css' || $extension === 'json') {
        // Se for um arquivo JS ou CSS, não redireciona
        return;
    }

    http_response_code(404);
    require_once("404.php");
    // echo 'Not found';
}

// if (!Route\did_match()) {
//     // http_response_code(404);
//     require_once("404.php");
//     // echo'Not found';
// }