<?php
require_once './libs/Router.php';
require_once './app/controllers/ApiController.php';

// crea el router
$router = new Router();

// defina la tabla de ruteo
$router->addRoute('property', 'GET', 'ApiController', 'getProperties');
$router->addRoute('property/:ID', 'GET', 'ApiController', 'getProperty');
$router->addRoute('property/:ID', 'DELETE', 'ApiController', 'deleteProperty');
$router->addRoute('property', 'POST', 'ApiController', 'insertProperty'); 
$router->addRoute('property/:ID','PUT','ApiController','updateProperty');

$router->addRoute("auth/token", 'GET', 'AuthApiController', 'getToken');

// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
