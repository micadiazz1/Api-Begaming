<?php
 require_once "./view/LoginView.php";
 require_once "./model/UserModel.php";
 
    
    class LoginController {

        
        private $model;
        private $view;
        function __construct(){
            $this->model = new UserModel();
            $this->view = new LoginView();
            
        }
        function login(){
            session_start();
            if(!isset($_SESSION['email'])){
                $this->view->showLogin();
            }
            else{
                $this->view->showAdmin();
            }

        }
        function verifyLogin(){
            if(!empty($_POST['email']) && !empty($_POST['password'])){
                 // toma los datos del form
                 $email = $_POST['email'];
                 $password = $_POST['password'];
                 // busco el usuario por email
                 $user = $this->model->getUser($email);
                 // verifico que el usuario existe y que las contraseñas son iguales
                 if($user && password_verify($password, $user->password)){
                 // inicio una session para este usuario
                     session_start();
                     $_SESSION['email'] = $email;
  
                     $this->view->showAdmin();
                 }
                 else{
                     $this->view->showLogin("El usuario o la contraseña no existe.");
                 }
            }
        }
        
        function logout(){
            session_start();
            session_destroy();
            //$this->view->showLogin("Deslogueado");
            header("Location: ". BASE_URL . "login");
        }
    

    }