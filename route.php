<?php

require_once "./controller/HomeController.php";
require_once "./controller/ProductosController.php";
require_once "./controller/AdminController.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

$params = explode('/', $action);

$homeController = new HomeController();
$productosController = new productosController();
$adminController = new AdminController();

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home': 
        $homeController->showHome(); 
        break;
    case 'admin':
        $adminController->adminForm();
        break;
    case 'productos': 
        $productosController->showProductos(); 
        break;
    case 'producto':
        $productosController->detailProduct($params[1]);
        break;
    case 'categoria':
        $productosController->detailCategoria($params[1]);
        break;
    case 'createProducto':
        $productosController->createProducto();
        break;
    case 'createCategoria':
        $productosController->createCategoria();
        break;
    case 'deleteProducto':
        $productosController->deleteProducto($params[1]);
        break;
    case 'deleteCategoria':
        $productosController->deleteCategoria($params[1]);
        break;
    case 'formEditarProducto':
        $productosController->formEditarProducto($params[1]);
        break;
    case 'confirmacionUpdateProducto':
        $productosController->updateProducto($params[1]);
        break;
    case 'formEditarCategoria':
        $productosController->formEditarCategoria($params[1]);
        break; 
    case 'confirmacionUpdateCategoria':
        $productosController->updateCategoria($params[1]);
        break; 
    default: 
        echo('404 Page not found'); 
        break;
}


