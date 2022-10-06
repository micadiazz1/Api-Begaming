<?php

    require_once "./view/AdminView.php";
    require_once "./model/ProductoModel.php";
    require_once "./model/CategoriaModel.php";
    
    
    class AdminController {

        private $ProductoModel;
        private $CategoriaModel;
        private $view;
        function __construct(){
            $this->ProductoModel = new ProductoModel();
            $this->CategoriaModel = new CategoriaModel();
            
            $this->view = new AdminView();

        }
        function adminForm() {
            
                $productos = $this->ProductoModel->getProductosAll();
                $categorias = $this->CategoriaModel->getCategorias();
                $this->view->formularioAdmin($productos, $categorias);
   
        }
        
        


    }