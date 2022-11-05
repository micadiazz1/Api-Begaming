<?php
require_once './libs/Router.php';
require_once './Controller/ApiController.php';

// crea el router
$router = new Router();

// defina la tabla de ruteo



$router->addRoute('producto', 'GET', 'ApiController', 'getProductos');
$router->addRoute('producto/:ID', 'GET', 'ApiController', 'getProducto');
$router->addRoute('producto/:ID', 'DELETE', 'ApiController', 'deleteProducto');
$router->addRoute('producto','POST', 'ApiController', 'insertProducto');

$router->addRoute('producto?sort=calificacion&order=asc', 'GET', 'productoApiController', 'getResenia');


// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
