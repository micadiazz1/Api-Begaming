<?php
   
    class UserModel {
        
        private $db;

        function __construct(){
           $this->db = new PDO('mysql:host=localhost;'.'dbname=db_begaming;charset=utf8', 'root', '');
        }
        
        function getUser($email){
            $sentencia = $this->db->prepare('SELECT * FROM user WHERE email = ?');
            $sentencia->execute([$email]);
            $users= $sentencia->fetch(PDO::FETCH_OBJ);
    
            return $users;
        }

        
        
   }