<?php
    require_once "./view/LoginView.php";
    class AuthHelper{
        
        function checkLogin(){
            session_start();
           
            if(!isset($_SESSION['email'])){
                header("Location: " . BASE_URL . 'login');
                return false;
            }
            return true;
        }
        
       


    }