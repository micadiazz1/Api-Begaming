<?php
require_once './libs/Router.php';
require_once './api/ProductosApiController.php';

// crea el router
$router = new Router();

// defina la tabla de ruteo



$router->addRoute('producto', 'GET', 'ProductoApiController', 'getProductos');
$router->addRoute('producto/:ID', 'GET', 'ProductoApiController', 'getProducto');
$router->addRoute('producto/:ID', 'DELETE', 'ProductoApiController', 'deleteProducto');
$router->addRoute('producto','POST', 'ProductoApiController', 'insertProducto');



// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
