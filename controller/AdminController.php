<?php

    require_once "./view/AdminView.php";
    require_once "./model/ProductoModel.php";
    require_once "./model/CategoriaModel.php";
    require_once "./helpers/AuthHelper.php";
    
    class AdminController {

        private $ProductoModel;
        private $CategoriaModel;
        private $view;
        private $authHelper;
        function __construct(){
            $this->ProductoModel = new ProductoModel();
            $this->CategoriaModel = new CategoriaModel();
            $this->view = new AdminView();
            $this->authHelper = new AuthHelper();
        }
        function adminForm() {
            if ($this->authHelper->checkLogin()){
                $productos = $this->ProductoModel->getProductosAll();
                $categorias = $this->CategoriaModel->getCategorias();
                $this->view->formularioAdmin($productos, $categorias);
            }
        }
        
        


    }