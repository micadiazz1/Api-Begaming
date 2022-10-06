<?php
    require_once "./libs/smarty-3.1.39/libs/Smarty.class.php";
    class AdminView {
        
        private $smarty;

        function __construct(){
          $this->smarty = new Smarty();
        }
        
        function formularioAdmin($productos, $categorias){
            $this->smarty->assign('productos', $productos);
            $this->smarty->assign('categorias', $categorias);
            $this->smarty->display('templates/admin.tpl');
           
            
        }
        
        function showAdminLocation(){
            header("Location: ".BASE_URL."admin");
        }

    }