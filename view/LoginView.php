<?php
    require_once "./libs/smarty-3.1.39/libs/Smarty.class.php";
    class LoginView {
        
        private $smarty;

        function __construct(){
          $this->smarty = new Smarty();
        }
        
        function showLogin($error = NULL){
            $this->smarty->assign('error', $error);
            $this->smarty->display('templates/login.tpl');
           
            
        }
        function showAdmin(){
            header("Location: ".BASE_URL."admin");
           
            
        }
        
        

}