<?php
require_once './libs/Router.php';
require_once './Controller/ApiProductoController.php';

// crea el router
$router = new Router();

// defina la tabla de ruteo



$router->addRoute('producto', 'GET', 'ApiProductoController', 'getProductos');
$router->addRoute('producto/:ID', 'GET', 'ApiProductoController', 'getProducto');
$router->addRoute('producto/:ID', 'DELETE', 'ApiProductoController', 'deleteProducto');
$router->addRoute('producto','POST', 'ApiProductoController', 'insertProducto');

$router->addRoute('producto/:ID/resenia', 'GET', 'ApiProductoController', 'getResenia');


//sort=calificacion&order=asc

// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
